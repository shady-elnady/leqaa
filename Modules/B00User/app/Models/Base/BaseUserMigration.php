<?php

namespace Modules\B00User\Models\Base;

use Core\Migrations\BaseMigration;
use Core\Traits\ModuleTrait;

class BaseUserMigration extends BaseMigration
{
    use ModuleTrait;
    protected string $base_dir;

    public function __construct()
    {
        parent::__construct();
        $this->base_dir = strtolower($this->getModuleName());
    }
}
