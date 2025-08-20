<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Repository\TagRepository;
use App\Services\LogService;
use Illuminate\Routing\Controller;

class TagController extends Controller
{
    public function __construct(protected TagRepository $repository){}

    public function log(string $action,string $description)
    {
        return new LogService($action,'Tag',$description);
    }
    public function index()
    {
        $tags = $this->repository->all();
        $this->log('all','get All Tags')->create();
        return view('admin.tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        $tag = $this->repository->create($request->validated());
        $this->log('create','create Tag')->create();
        if($tag){
            return redirect()->route('tags.index');
        }
        return redirect()->route('tags.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $status = $this->repository->update($request->all(),$tag);
        $this->log('update','update Tag')->create();
        if($status){
            return redirect()->route('tags.index');
        }
        return redirect()->route('tags.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
