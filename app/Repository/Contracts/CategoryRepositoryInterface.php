<?php

namespace App\Repository\Contracts;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

interface CategoryRepositoryInterface
{
    public function all(): Collection;

    public function create(array $data): Category;
    public function update(array $data,$id): ?Category;
    public function delete($id): bool;
}
