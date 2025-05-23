<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttributeValue;
use Illuminate\Http\Request;

class AttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $attributeValue = new AttributeValue();
        $attributeValue->title = $request->title;
        $attributeValue->attribute_id = $request->attribute_id;
        $attributeValue->save();
        return back()->with('success', 'ویژگی مورد نظر ایجاد شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AttributeValue $attributeValue)
    {
        $attributeValue->title = $request->title;
        $attributeValue->save();
        return back()->with('success', 'ویژگی مورد نظر ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AttributeValue $attributeValue)
    {
        $attributeValue->delete();
        return back()->with('danger', 'ویژگی مورد نظر حذف شد');
    }
}
