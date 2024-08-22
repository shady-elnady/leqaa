<?php

use Modules\H00Chat\Models\Base\BaseChatMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\H00Chat\Enums\DeleteMessagesTypesEnum;
use Modules\H00Chat\Enums\MessagesTypesEnum;

return new class extends BaseChatMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("{$this->base_dir}_messages", function (Blueprint $table) {
            $this->defaultColumns($table);
            $table->foreignId('sender_id')->constrained('users');
            $table->foreignId('receiver_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('room_id')->nullable()->constrained("{$this->base_dir}_rooms")->nullOnDelete();
            $table->enum('message_type', MessagesTypesEnum::getValues());
            $table->text('message');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->boolean('is_seen')->default(false);
            $table->enum('delete_message_type', DeleteMessagesTypesEnum::getValues());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("{$this->base_dir}_messages");
    }
};
