<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\E00Event\Models\Base\BaseEventMigration;

return new class extends BaseEventMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("{$this->base_dir}_event_types", function (Blueprint $table) {
            $this->defaultColumns($table);
            $this->translationsColumn($table);
            $this->imageColumn($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("{$this->base_dir}_event_types");
    }
};
