<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\G00Notification\Enums\NotificationStatusEnum;
use Modules\G00Notification\Models\Base\BaseNotificationMigration;

return new class extends BaseNotificationMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("{$this->base_dir}_notifications", function (Blueprint $table) {
            $this->defaultColumns($table);
            $table->string('device_token');
            $table->string('title');
            $table->text('body');
            $table->text('error_message')->nullable();
            $table->enum('notification_status', NotificationStatusEnum::getValues());
            $table->json('data')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("{$this->base_dir}_notifications");
    }
};
