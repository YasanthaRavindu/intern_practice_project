<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {

        return Inertia::render('Products/All/Index');
    }


    public function create()
    {

        return view('product.create');
    }

    public function store(Request $request)
    {

        Product::create($request->all())->with('success','Product Stored Success fully.');
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
