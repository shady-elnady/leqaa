<?php

use Modules\E00Event\Models\Base\BaseEventMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends BaseEventMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("{$this->base_dir}_event_photos", function (Blueprint $table) {
            $this->defaultColumns($table);
            $table->foreignId('event_id')->constrained("{$this->base_dir}_events");
            $this->imageColumn($table);
            $table->unsignedSmallInteger('order')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("{$this->base_dir}_event_photos");
    }
};
