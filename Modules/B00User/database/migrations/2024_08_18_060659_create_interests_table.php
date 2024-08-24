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
        Schema::create("{$this->base_dir}_interests", function (Blueprint $table) {
            $this->defaultColumns($table);
            //
            $table->foreignId('student_id')->constrained("{$this->base_dir}_students");
            //
            $table->foreignId('category_id')->constrained('categories');
            //
            $table->unsignedSmallInteger('order')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("{$this->base_dir}_interests");
    }
};
