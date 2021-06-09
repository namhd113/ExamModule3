<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('category.list', compact('category'));
    }

    public function create()
    {
        return view('category.add');
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->fill($request->all());
        $category->save();

        return redirect()->route('category.list');

    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->fill($request->all());
        $category->save();

        return redirect()->route('category.list');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.list');
    }

    public function checkCreate(Request $request)
    {
        $success = "them du lieu thanh cong";
        return view('category.create', compact('success'));
    }
}
