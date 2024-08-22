<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\A00Contact\Enums\ContinentsEnum;
use Modules\A00Contact\Models\Base\BaseContactMigration;

return new class extends BaseContactMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("{$this->base_dir}_countries", function (Blueprint $table) {
            $this->defaultColumns($table);
            $table->enum('continent', ContinentsEnum::getValues());
            $table->string('flag_emoji')->nullable()->unique();
            $table->string('country_code')->nullable()->unique();
            $table->string('tel_code')->nullable()->unique();
            $table->string('timezone')->default('UTC');
            $table->foreignId('currency_id')->nullable()->constrained("currencies")->nullOnDelete();
            $table->foreignId('language_id')->nullable()->constrained("languages")->nullOnDelete();
            $this->translationsColumn($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("{$this->base_dir}_countries");
    }
};
