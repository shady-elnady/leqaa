<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\H00Chat\Models\Base\BaseChatMigration;

return new class extends BaseChatMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("{$this->base_dir}_faqs", function (Blueprint $table) {
            $this->defaultColumns($table);
            $table->foreignId('questioner_id')->constrained("{$this->user_module_dir}_students");
            $table->foreignId('respondent_id')->nullable()->constrained("{$this->user_module_dir}_lecturers");
            $table->string('question');
            $table->text('answer')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("{$this->base_dir}_faqs");
    }
};
