<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\H00Chat\Enums\UserRanksEnum;
use Modules\H00Chat\Models\Base\BaseChatMigration;

return new class extends BaseChatMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("{$this->base_dir}_rooms", function (Blueprint $table) {
            $this->defaultColumns($table);
            $table->string('title')->unique();
            $table->morphs('userable');
            $table->enum('user_rank', UserRanksEnum::getValues())->default(UserRanksEnum::Receiver->value);
            $table->boolean('is_private')->default(true);
            // $table->foreignId('creator_id')->nullable()->constrained('users')->nullOnDelete();
            // $table->foreignId('receiver_id')->nullable()->constrained('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("{$this->base_dir}_rooms");
    }
};
