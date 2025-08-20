<?php

namespace App\Repository\Contracts;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;

interface TagRepositoryInterface
{
    public function all(): Collection;

    public function create(array $data): Tag;
    public function update(array $data,$cat): ?Tag;
    public function delete($cat): bool;

}
