<?php

namespace Modules\Article\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\View\FileViewFinder;
use Modules\Article\Entities\Category;
use Modules\Article\Entities\Content;

class HomeController extends Controller
{
    public function __construct()
    {
        $template=\HDModule::config('article.config.template');
        //$paths=[public_path('templates/'.$template)];
       //\View::setFinder(new FileViewFinder(\App::make('files'),$paths));
        $finder=app('view')->getFinder();
        $finder->prependLocation(public_path('templates/'.$template));

    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        return view('index');
    }

    public function lists(Category $category){
       $data=Content::where('category_id',$category['id'])->paginate(5);
       return view('lists',compact('data','category'));
    }
    public function content(Content $content){
        return view('content',compact('content'));
    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('article::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
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
    public function edit()
    {
        return view('article::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
