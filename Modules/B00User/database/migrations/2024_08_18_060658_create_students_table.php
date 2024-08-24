<?php

use Modules\B00User\Models\Base\BaseUserMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends BaseUserMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("{$this->base_dir}_students", function (Blueprint $table) {
            $this->defaultColumns($table);
            $this->usersColumns($table);
            //
            $table->foreignId('university_id')->nullable()->constrained("{$this->organization_module_dir}_universities")->nullOnDelete();
            //
            $table->foreignId('college_id')->nullable()->constrained("{$this->organization_module_dir}_colleges")->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("{$this->base_dir}_students");
    }
};
