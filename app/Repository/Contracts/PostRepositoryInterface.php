<?php

namespace App\Repository\Contracts;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

interface PostRepositoryInterface
{
    public function all(): Collection;

    public function create(array $data): Post;
    public function update(array $data,$pt): ?Post;
    public function delete($pt): bool;

}
