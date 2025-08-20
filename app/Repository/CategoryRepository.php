<?php

namespace App\Repository;

use App\Models\Category;
use App\Repository\Contracts\CategoryRepositoryInterface;
use App\Services\LogService;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function __construct(protected Category $category){}

    public function all(): Collection
    {
        return $this->category->where('is_active',1)->get();
    }

    public function create(array $data): Category
    {
        return $this->category->create($data);
    }

    public function update(array $data, $cat): ?Category
    {
        $status=$cat->update($data);
        return $status?$cat:null;
    }

    public function delete($cat): bool
    {
        $status=$cat->update([
            'is_active'=>0
        ]);
        return $status?true:false;
    }
}
