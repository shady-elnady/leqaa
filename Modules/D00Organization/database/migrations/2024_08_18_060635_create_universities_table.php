<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\D00Organization\Models\Base\BaseOrganizationMigration;

return new class extends BaseOrganizationMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("{$this->base_dir}_universities", function (Blueprint $table) {
            $this->defaultColumns($table);
            $table->string('logo')->nullable();
            $table->email('email')->nullable();
            $this->translationsColumn($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("{$this->base_dir}_universities");
    }
};
