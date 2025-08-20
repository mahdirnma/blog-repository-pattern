<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
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
        $this->log('all','get All Posts');
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
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
