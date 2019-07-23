<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::with('post', 'countComment', 'userComment', 'latestPost')
        ->withCount('post', 'countComment')
        // ->where('categorys.category_id')
        //->orderBy('comments.comment_id' ,'desc')
        ->get();

         $post = Post::with('category','user','comment')
        ->latest()
        ->paginate(10);

        // $postWith = Post::with('category', 'user', 'comment')
        // ->withCount('comment')
        // //->withCount('post')
        // ->groupBy('posts.category_id')
        // //->where('posts.post_id', )
        // //->groupBy('comments.post_id')
        // ->get();
        //dd($category->toArray());
        return view('welcome',[
            'category' => $category,
            'post' => $post
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category,User $user)
    {
      
        //dd($category->toArray(),$user->toArray());
        return view('post.create',['category' => $category,'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //dd($category->toArray());
        $post = new Post();
        $post->user_id = request('user_id');
        $post->category_id = request('category_id');
        $post->title = request('title');
        $post->detail = request('detail');
        $post->save();
        return redirect()->route('post.list',['category' => $post->category->category_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post,Category $category)
    {
         //dd($post->toArray());
        // $category = Category::all()
        // ->find($category);
        $postWith = Post::with('category','user','comment')
        //->withCount('comment')
        ->where('posts.post_id', $post->post_id)
        //->where('comments.user_id', 'users.user_id')
        ->get();

        $comment = Comment::with('post','user')
        //->withCount('user')
        ->where('comments.post_id', $post->post_id)
       
        ->get();

       //dd($comment->toArray());
        return view(
            'post.show',[
                'category' => $category,
                'post' => $post,
                'postWith' => $postWith,
                'comment' => $comment
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function list(Category $category,User $user){

        // $comment = Comment::with('post')
        // ->where('comments.post_id', 'posts.post_id')
        // ->get();
        // dd($comment->toArray());       
        //dd($category->toArray());
        $category = Category::all()
        ->find($category);
        $post = Post::with('category', 'user', 'comment','dateComment')
        ->where('posts.category_id', $category->category_id)
        ->orderBy('posts.post_id', 'desc')
        //->where('posts.post_id', )
        //->groupBy('comments.post_id')
        ->paginate(10);

       //dd($post->toArray());
        return view(
            'category.show',[
                'category' => $category,
                'post' => $post
            ]);
    }
   
}
