<?php

use Modules\H00Chat\Models\Base\BaseChatMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends BaseChatMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("{$this->base_dir}_message_files", function (Blueprint $table) {
            $this->defaultColumns($table);
            $this->fileColumns($table);
            $table->foreignId('message_id')->constrained("{$this->base_dir}_messages");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("{$this->base_dir}_message_files");
    }
};
