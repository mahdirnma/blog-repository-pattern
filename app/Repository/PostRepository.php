<?php

namespace App\Repository;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostRepository
{
    public function __construct(protected Post $post){}

    public function all(): Collection
    {
        return $this->post->where('is_active',1)->get();
    }

    public function create(array $data): Post
    {
        return $this->post->create($data);
    }

    public function update(array $data, $pt): ?Post
    {
        $status=$pt->update($data);
        return $status?$pt:null;
    }

    public function delete($pt): bool
    {
        $status=$pt->update([
            'is_active'=>0
        ]);
        return $status?true:false;
    }

}
