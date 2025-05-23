<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(20);
        return view('pages.admin.user.index', compact('users'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        // $permissions = Permission::all();
        return view('pages.admin.user.edit', compact('user', 'roles'));
    }

    public function create()
    {
        //
    }

    public function update(Request $request, User $user)
    {
        try {
            DB::beginTransaction();

            $user->update([
                'name' => $request->name,
                'mobileNumber' => $request->mobileNumber,
            ]);

            $user->roles()->sync($request->roles);


            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            // alert()->error('مشکل در ویرایش نقش', $ex->getMessage())->persistent('حله');
            return $ex;
        }

        // alert()->success('کاربر مورد نظر ویرایش شد', 'باتشکر');
        return redirect()->route('admin.user.index');
    }
}
