<?php

use Modules\A00Contact\Models\Base\BaseContactMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\A00Contact\Enums\StateTypesEnum;

return new class extends BaseContactMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("{$this->base_dir}_states", function (Blueprint $table) {
            $this->defaultColumns($table);
            $this->translationsColumn($table);
            $table->string('postal_code')->nullable();
            $table->enum('state_type', StateTypesEnum::getValues());
            $table->foreignId('city_id')->constrained("{$this->base_dir}_cities");
            // geo_location GIOPolygonField
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("{$this->base_dir}_states");
    }
};
