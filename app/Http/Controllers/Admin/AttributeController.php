<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attributes = Attribute::latest()->paginate(5);
        return view('admin.attributes.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.attributes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $saved = Attribute::create([
            'name' => $validatedData['name']
        ]);

        if ($saved) {
            // Attribute was saved successfully
            //Alert::success($saved->name, 'با موفقیت ایجاد شد');
            Alert::toast('ویژگی مورد نظر ایجاد شد', 'success');
            return redirect()->route('admin.attributes.index')->with('success', 'Attribute saved successfully!');
        } else {
            // Attribute save failed
            return back()->with('error', 'Failed to save attribute. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Attribute $attribute)
    {
        return view('admin.attributes.show', compact('attribute'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attribute $attribute)
    {
        return view('admin.attributes.edit', compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attribute $attribute)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $saved = $attribute->update([
            'name' => $validatedData['name']
        ]);

        if ($saved) {
            // Attribute was saved successfully
            //Alert::success($attribute->name, 'با موفقیت بروزرسانی شد');
            Alert::toast('ویژگی مورد نظر بروزرسانی شد', 'success');
            return redirect()->route('admin.attributes.index')->with('success', 'Attribute saved successfully!');
        } else {
            // Brand save failed
            return back()->with('error', 'Failed to save brand. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd('destroy');
    }
}
