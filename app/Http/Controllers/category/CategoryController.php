<?php

namespace App\Http\Controllers\category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\All\Categories\CategoryInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$categories=Category::all();
        $categoryInterface = app()->make(CategoryInterface::class);
        //$categories = $categoryInterface->all(['*','id as value','name as lable']);
        $categories = $categoryInterface->all(['*'],['products']);
        dd($categories);
        return Inertia::render("Categories/All/Index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoryInterface = app()->make(CategoryInterface::class);

        $inp="ko";
        $arr=["one"=>"Hi","two"=>"Hello"];
        return Inertia::render("Categories/Create/Index",['inp' =>$arr]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $categoryInterface = app()->make(CategoryInterface::class);
        $categoryInterface->create($request->all());
        return redirect()->route('categories.index')->with('success');
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
        $categoryInterface = app()->make(CategoryInterface::class);
        $categoryInterface->findById($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $categoryInterface = app()->make(CategoryInterface::class);
         $categoryInterface->update($id,$request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
