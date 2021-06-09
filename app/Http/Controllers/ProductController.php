<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(){
        $product = Product::all();
        $category = Category::all();
        return view('product.list', compact('product', 'category'));
    }
    public function create(){
        $product = Product::all();
        $category = Category::all();
        return view('product.add', compact('product','category'));
    }
    public function store(Request $request){
        $product = new Product();
        $product->fill($request->all());

        if($request->hasFile('avatar')) {

            $image = $request->file('avatar');
            $path = $image->store('images', 'public');
            $product->avatar = $path;
        }

        $product->save();

        return redirect()->route('product.list');
    }
    public function edit($id) {

        $product = Product::findOrFail($id);
        $category = Category::all();

        return view('product.edit', compact('product', 'category'));
    }
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->fill($request->all());

        if($request->hasFile('avatar'))
        {
            $currentImg = $product->avatar;
            if($currentImg)
            {
                Storage::delete('/public/' . $currentImg);
            }

            $image = $request->file('avatar');
            $path = $image->store('images', 'public');
            $product->avatar = $path;
        }

        $product->save();
        Session::flash('success', 'cap nhap thanh cong');
        return redirect()->route('product.list');
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index');
    }
    public function search (Request $request)
    {
        $price1 = $request->price1;
        $price2 = $request->price2;
        $products = Product::where('price','>', $price1)->where('price','<', $price2)->get();
        return view('product.search', ['products' => $products]);
    }
}
