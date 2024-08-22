<?php

use Modules\A00Contact\Models\Base\BaseContactMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends BaseContactMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("{$this->base_dir}_localities", function (Blueprint $table) {
            $this->defaultColumns($table);
            $this->translationsColumn($table);
            $table->foreignId('state_id')->constrained("{$this->base_dir}_states");
            // geo_location GIOPolygonField
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("{$this->base_dir}_localities");
    }
};
