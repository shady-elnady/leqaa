<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\A00Contact\Models\Base\BaseContactMigration;

return new class extends BaseContactMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("{$this->base_dir}_governorates", function (Blueprint $table) {
            $this->defaultColumns($table);
            $table->string('governorate_tel_code')->nullable();
            $table->foreignId('country_id')->constrained("{$this->base_dir}_countries");
            $this->translationsColumn($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("{$this->base_dir}_governorates");
    }
};
