<?php

namespace Modules\B00User\Models;

use Core\Models\BaseUserModel;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\B00User\Database\Factories\AdminFactory;

class Admin extends BaseUserModel
{
    // use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "{$this->base_dir}_admins";
    }

    protected static function newFactory(): AdminFactory
    {
        return AdminFactory::new();
    }
}
