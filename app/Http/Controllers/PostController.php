<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Tag;
use App\Repository\PostRepository;
use App\Services\LogService;
use Illuminate\Routing\Controller;

class PostController extends Controller
{
    public function __construct(protected PostRepository $postRepository){}

    public function log(string $action,string $description)
    {
        return new LogService($action,'Post',$description);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->postRepository->all();
        $this->log('all','get All Posts')->create();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('is_active',1)->get();
        $tags=Tag::where('is_active',1)->get();
        return view('admin.posts.create',compact('tags','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post= $this->postRepository->create($request->except('tags'));
        $post->tags()->attach($request->tags);
        $this->log('create','Post created')->create();
        if($post){
            return redirect()->route('posts.index');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
