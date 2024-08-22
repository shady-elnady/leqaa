<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\D00Organization\Models\Base\BaseOrganizationMigration;
use Modules\D00Organization\Enums\OrganizationTypesEnum;

return new class extends BaseOrganizationMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("{$this->base_dir}_organizations", function (Blueprint $table) {
            $this->defaultColumns($table);
            $table->string('name')->unique();
            $table->string('logo')->nullable();
            $table->enum('organization_type', OrganizationTypesEnum::getValues());
            $table->foreignId('affiliated_to')->nullable()->constrained("{$this->base_dir}_organizations")->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("{$this->base_dir}_organizations");
    }
};
