<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {


        $products=Product::with('category')->get();

        return Inertia::render('Products/All/Index',['products'=>$products]);
    }


    //find category
    private function findCategory($id)
    {

    }

    public function create()
    {

        $categories=Category::all();
        return Inertia::render('Products/Create/Create',[
            'categories'=>$categories
        ]);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        try{
            Product::create($request->all());
            return redirect()->route('products.index')->with('success','Product Stored Success fully.');
        }catch(\Exception $e){
            return redirect()->route('products.create')->withInput()->with('error','Error: '. $e->getMessage());
        }

    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request)
    {

    }

    public function destroy($id)
    {

    }
}
