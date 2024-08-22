<?php

use Core\Migrations\BaseMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends BaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('languages', function (Blueprint $table) {
            $this->defaultColumns($table);
            $this->translationsColumn($table);
            $table->string("native_name")->unique();
            $table->string("language_iso_code")->unique();
            $table->boolean("is_bidirectional")->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};
