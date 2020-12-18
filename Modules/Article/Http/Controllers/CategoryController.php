<?php

namespace Modules\Article\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Article\Entities\Category;
use Modules\Article\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Category $category)
    {
        $categories=$category->getAll();
        return view('article::category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Category $category)
    {
        $categories=$category->getAll();

        return view('article::category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CategoryRequest $request,Category $category)
    {
        $category->fill($request->all());
        $category->save();
        return redirect('article/category')->with('success','栏目添加成功');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('article::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Category $category)
    {
        $categories=$category->getAll($category);
        return view('article::category.edit',compact('category','categories'));

    }

     /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(CategoryRequest $request,Category $category )
    {
        $category->update($request->all());
        return redirect('/article/category')->with('success','栏目成修改成功');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Category $category)
    {
       if( $category->hasChileCategory()){
           return redirect('/article/category')->with('danger','请先删除子栏目');
       }
       $category->delete();
        return redirect('/article/category')->with('success','删除栏目成功');
    }
}
