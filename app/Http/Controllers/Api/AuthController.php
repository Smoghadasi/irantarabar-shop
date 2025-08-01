<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function check_user(Request $request)
    {
        $fields = $request->validate([
            'mobileNumber' => 'required|string',
            'name' => 'required|string',
            'lastName' => 'required|string',
            'driver_id' => 'required|integer',
        ]);
        $user = User::where('mobileNumber', $fields['mobileNumber'])->where('driver_id', $fields['driver_id'])->first();
        if (!$user) {
            $user = User::create([
                'name' => $request->name ?? 'کاربر',
                'lastName' => $request->lastName ?? 'سایت',
                'driver_id' => $request->driver_id,
                'mobileNumber' => $fields['mobileNumber'],
                'password' => bcrypt($fields['mobileNumber'])
            ]);
            $adminRole = Role::where('name', 'HUMAN')->first();
            if ($adminRole) {
                $user->roles()->sync([$adminRole->id]);
            }

            $token = $user->createToken('myapptoken')->plainTextToken;
        }
        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'mobileNumber' => $user->mobileNumber,
            'token' => $token
        ];

        return response()->json($response, 200);
    }
}
