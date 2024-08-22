<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\B00User\Models\Base\BaseUserMigration;

return new class extends BaseUserMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("{$this->base_dir}_admins", function (Blueprint $table) {
            $this->defaultColumns($table);
            $this->usersColumns($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("{$this->base_dir}_admins");
    }
};
