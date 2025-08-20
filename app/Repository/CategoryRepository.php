<?php

namespace App\Repository;

use App\Models\Category;
use App\Repository\Contracts\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function __construct(private Category $category){}

    public function all(): Collection
    {
        return $this->category->where('is_active',1)->paginate(2);
    }

    public function create(array $data): Category
    {
        return $this->category->create($data);
    }

    public function update(array $data, $id): ?Category
    {
        $category=$this->category->find($id);
        return $category?$category->update($data):null;
    }

    public function delete($id): bool
    {
        $category=$this->category->find($id);
        return $category?$category->update(['is_active',0]):false;
    }
}
