<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repository\CategoryRepository;
use App\Services\LogService;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    public function __construct(protected CategoryRepository $categoryRepository){}

    public function log(string $action,string $description)
    {
        return new LogService($action,'Category',$description);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->categoryRepository->all();
        $this->log('all','get All Categories')->create();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category=$this->categoryRepository->create($request->all());
        $this->log('create','create Category')->create();
        if($category){
            return redirect()->route('categories.index');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $status=$this->categoryRepository->update($request->all(),$category);
        $this->log('update','update Category')->create();
        if($status){
            return redirect()->route('categories.index');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
