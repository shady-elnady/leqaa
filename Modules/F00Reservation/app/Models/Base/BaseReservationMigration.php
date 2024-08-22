<?php

namespace Modules\F00Reservation\Models\Base;

use Core\Migrations\BaseMigration;
use Core\Traits\ModuleTrait;

class BaseReservationMigration extends BaseMigration
{
    use ModuleTrait;
    protected string $base_dir;

    public function __construct()
    {
        parent::__construct();
        $this->base_dir = strtolower($this->getModuleName());
    }
}
