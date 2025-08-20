<?php

namespace App\Services;

use App\Models\Log;

class LogService
{
    public $action=null;
    public $model=null;
    public $description=null;
    public function __construct(string $action, string $model, string $description)
    {
        $this->action = $action;
        $this->model = $model;
        $this->description = $description;
    }

    public function create()
    {
        $log=Log::create([
            'action'=>$this->action,
            'model'=>$this->model,
            'description'=>$this->description,
        ]);
    }
}
