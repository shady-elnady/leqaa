<?php

namespace Modules\A00Contact\Models\Base;

use Core\Migrations\BaseMigration;
use Core\Traits\ModuleTrait;

class BaseContactMigration extends BaseMigration
{
    use ModuleTrait;
    protected string $base_dir;

    public function __construct()
    {
        parent::__construct();
        $this->base_dir = strtolower($this->getModuleName());
    }
}
