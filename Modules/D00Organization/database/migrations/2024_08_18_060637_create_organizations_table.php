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
        Schema::create("{$this->base_dir}_organizations", function (Blueprint $table) {
            $this->defaultColumns($table);
            $table->string('logo')->nullable();
            $table->foreignId('organization_type_id')->nullable()->constrained("{$this->base_dir}_organizations_types")->nullOnDelete();
            $table->foreignId('university_id')->nullable()->constrained("{$this->base_dir}_universities")->nullOnDelete();
            $table->foreignId('affiliated_to')->nullable()->constrained("{$this->base_dir}_organizations")->nullOnDelete();
            $this->translationsColumn($table);
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
