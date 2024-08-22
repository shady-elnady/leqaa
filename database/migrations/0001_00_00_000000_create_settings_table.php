<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\AppThemesEnum;
use Core\Migrations\BaseMigration;

return new class extends BaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $this->defaultColumns($table);
            $table->foreignId('locale_id')->nullable()->constrained("locales")->nullOnDelete();
            $table->foreignId('currency_id')->nullable()->constrained("currencies")->nullOnDelete();
            $table->enum('theme', AppThemesEnum::getValues())->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
