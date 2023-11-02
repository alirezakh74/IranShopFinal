<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::paginate(5);
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required|string|max:255',
            'is_active' => 'required|numeric'
        ]);

        // dd($validatedData);

        $brand = new Brand();
        $brand->name = $validatedData['brand_name'];
        $brand->slug = str_replace(' ', '-', $validatedData['brand_name']);
        $brand->is_active = $validatedData['is_active'];

        $saved = $brand->save();

        if ($saved) {
            // Brand was saved successfully
            return redirect()->route('admin.brands.index')->with('success', 'Brand saved successfully! 😃');
        } else {
            // Brand save failed
            return back()->with('error', 'Failed to save brand. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::find($id);
        return view('admin.brands.update', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::find($id);
        dd($brand);
        return view('admin.brands.update');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required|string|max:255',
            'is_active' => 'required|numeric'
        ]);

        $brand = Brand::findOrFail($id);

        $brand->name = $validatedData['brand_name'];
        $brand->is_active = $validatedData['is_active'];

        $brand->save();

        return redirect()->route('admin.brands.index')->with('success', 'Brand updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Brand::destroy($id);
        return redirect()->route('admin.brands.index')->with('success', 'Brand deleted successfully!');
    }
}