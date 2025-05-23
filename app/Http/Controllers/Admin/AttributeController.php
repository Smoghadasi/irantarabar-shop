<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attributes = Attribute::withCount('attributeValues')->latest()->paginate(20);
        return view('pages.admin.attribute.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Attribute::create([
            'name' => $request->name,
            'type' => $request->type,
        ]);
        return redirect()->route('admin.attribute.index')->with('success', 'ویژگی مورد نظر ایجاد شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attribute $attribute)
    {
        $attributeValues = AttributeValue::where('attribute_id', $attribute->id)->get();
        return view('pages.admin.attribute.show', compact('attribute', 'attributeValues'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attribute $attribute)
    {
        return view('pages.admin.attribute.edit', compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attribute $attribute)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $attribute->update([
            'name' => $request->name,
            'type' => $request->type,
        ]);
        return redirect()->route('admin.attribute.index')->with('success', 'خصوصیت مورد نظر ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attribute $attribute)
    {
        $attribute->delete();
        return redirect()->route('admin.attribute.index')->with('danger', 'خصوصیت مورد نظر حذف شد');
    }
}
