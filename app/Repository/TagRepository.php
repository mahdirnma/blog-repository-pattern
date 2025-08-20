<?php

namespace App\Repository;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;

class TagRepository
{
    public function __construct(protected Tag $tag){}

    public function all(): Collection
    {
        return $this->tag->where('is_active',1)->get();
    }

    public function create(array $data): Tag
    {
        return $this->tag->create($data);
    }

    public function update(array $data, $tg): ?Tag
    {
        $status=$tg->update($data);
        return $status?$tg:null;
    }

    public function delete($tg): bool
    {
        $status=$tg->update([
            'is_active'=>0
        ]);
        return $status?true:false;
    }

}
