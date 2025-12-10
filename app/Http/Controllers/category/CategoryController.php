<?php

namespace App\Http\Controllers\category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\All\Categories\CategoryInterface;
use App\Services\CategoryServices\CategoryService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function __construct(
        protected CategoryInterface $categoryInterface,
        protected CategoryService $categoryService
    ){}

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //$categories=Category::all();
        $this->categoryInterface->all(['*'],['products']);

        return Inertia::render("Categories/All/Index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $inp="ko";
        $arr=["one"=>"Hi","two"=>"Hello"];
        return Inertia::render("Categories/Create/Index",['inp' =>$arr]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

      // $categoryInterface = app()->make(CategoryInterface::class);
        $this->categoryService->storeCategories($request->all());
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

        $this->categoryInterface->findById($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

         $this->categoryInterface->update($id,$request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

         $this->categoryInterface->deleteById($id);
    }
}
