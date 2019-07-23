<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
//use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('category.index',['category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        dd('store');
        $category = new Category();
        $category->name = request('name');
        $category->explanation = request('explanation');
        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

        //dd($category->category_id);
        // $categoryJoin = Category::join('posts', 'categorys.category_id', '=', 'posts.category_id')
        // ->join('users', 'posts.user_id', '=', 'users.id')
        // ->select(DB::raw('posts.title, DATE_FORMAT(posts.created_at,("%d-%m-%Y %h:%i:%s")) AS date, users.name'))
        // ->where('categorys.category_id', $category->category_id )
        // ->groupBy('posts.post_id')
        // ->orderBy('posts.post_id' ,'DESC')
        // ->get();

        // $categoryWith = Category::with('post')
        // ->with('App\Models\User')
        // ->find($category);

        $category = Category::all()
        ->find($category);

        // dump($category);
        // die();
        return view('category.show',['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //dd($category->toArray());
        return view('category.edit',['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->name = request('name');
        $category->explanation = request('explanation');
        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }
}
