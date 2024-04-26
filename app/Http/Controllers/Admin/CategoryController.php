<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Attribute;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(5);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parentCategories = Category::where('parent_id', 0)->get();
        $attributes = Attribute::all();

        return view('admin.categories.create', compact('parentCategories', 'attributes'));
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
            'attributes_id' => 'required',
            'filterable_attributes_id' => 'required',
            'variation_id' => 'required',
        ]);

        $saved = Category::create([
            'parent_id' => $request->parent_id,
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->comment,
            'icon' => $request->icon,
            'is_active' => $request->is_active
        ]);

        if ($saved) {
            // Categroy was saved successfully
            //Alert::success($saved->name, 'با موفقیت ایجاد شد');
            Alert::toast('دسته بندی مورد نظر ایجاد شد', 'success');
            return redirect()->route('admin.categories.index')->with('success', 'Category saved successfully!');
        } else {
            // Category save failed
            return back()->with('error', 'Failed to save category. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.categories.show', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.categories.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
