<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()
            // ->where('parent_id', 0)
            ->paginate(20);

        return view('pages.admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parentCategories = Category::where('parent_id', 0)->get();
        $attributes = Attribute::all();
        return view('pages.admin.category.create', compact('parentCategories', 'attributes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug',
            'parent_id' => 'required',
            'attribute_ids' => 'required',
            'attribute_ids.*' => 'exists:attributes,id',
            'attribute_is_filter_ids' => 'required',
            'attribute_is_filter_ids.*' => 'exists:attributes,id',
            'variation_id' => 'required|exists:attributes,id',
        ]);

        try {
            DB::beginTransaction();

            $category = Category::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'parent_id' => $request->parent_id,
                'description' => $request->description,
            ]);

            foreach ($request->attribute_ids as $attributeId) {
                $attribute = Attribute::findOrFail($attributeId);
                $attribute->categories()->attach($category->id, [
                    'is_filter' => in_array($attributeId, $request->attribute_is_filter_ids) ? 1 : 0,
                    'is_variation' => $request->variation_id == $attributeId ? 1 : 0
                ]);
            }

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back();
        }

        return redirect()->route('admin.category.index');


        return redirect()->route('admin.category.index')->with('success', 'دسته بندی مورد نظر ایجاد شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $categories = Category::latest()
            ->where('parent_id', $category->id)
            ->paginate(20);

        return view('pages.admin.category.show', compact('categories', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $category = Category::with('attributes')
            ->where('id', $id)
            ->first();
        $parentCategories = Category::where('parent_id', 0)->get();
        $attributes = Attribute::all();
        return view('pages.admin.category.edit', compact('category', 'parentCategories', 'attributes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,' . $category->id,
            'is_active' => 'required',
            'parent_id' => 'required',
            'attribute_ids' => 'required',
            'attribute_ids.*' => 'exists:attributes,id',
            'attribute_is_filter_ids' => 'required',
            'attribute_is_filter_ids.*' => 'exists:attributes,id',
            'variation_id' => 'required|exists:attributes,id',
        ]);

        try {

            DB::beginTransaction();

            $category->update([
                'name' => $request->name,
                'slug' =>  $request->slug,
                'is_active' =>  $request->is_active,
                'parent_id' =>  $request->parent_id,
                'description' => $request->description,
            ]);

            if ($file = $request->file('icon')) {
                $name = time() . preg_replace('/\s+/', '', $file->getClientOriginalName());
                $file->move('uploads', $name);
                $category->icon = 'uploads/' . $name;
                $category->save();
            }

            $category->attributes()->detach();
            if (!empty($request->attribute_ids)) {
                foreach ($request->attribute_ids as $attributeId) {

                    $attribute = Attribute::findOrFail($attributeId);
                    $attribute->categories()->attach($category->id, [
                        'is_filter' => in_array($attributeId, $request->attribute_is_filter_ids) ? 1 : 0,
                        'is_variation' => $request->variation_id == $attributeId ? 1 : 0
                    ]);
                }
            }

            DB::commit();
        } catch (\Exception $ex) {
            return $ex;
            DB::rollBack();

            return redirect()->back();
        }

        return redirect()->route('admin.category.index')->with('success', 'دسته بندی مورد نظر ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getCategoryAttributes(Category $category)
    {
        $attributes = $category->attributes()->wherePivot('is_variation', 0)->get();
        $variation = $category->attributes()->wherePivot('is_variation', 1)->first();
        return ['attributes' => $attributes, 'variation' => $variation];
    }
}
