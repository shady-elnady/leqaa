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
        Schema::create("{$this->base_dir}_addresses", function (Blueprint $table) {
            $this->defaultColumns($table);
            $this->translationsColumn($table);
            $table->foreignId('street_id')->constrained("{$this->base_dir}_streets");
            $table->foreignId('locality_id')->constrained("{$this->base_dir}_localities");
            $table->json('details')->nullable();
            // geo_location GIOPoint
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("{$this->base_dir}_addresses");
    }
};
