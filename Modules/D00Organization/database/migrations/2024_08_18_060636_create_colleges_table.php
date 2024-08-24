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
        Schema::create("{$this->base_dir}_colleges", function (Blueprint $table) {
            $this->defaultColumns($table);
            $table->string('logo')->nullable();
            $table->foreignId('university_id')->constrained("{$this->base_dir}_universities");
            $this->translationsColumn($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("{$this->base_dir}_colleges");
    }
};
