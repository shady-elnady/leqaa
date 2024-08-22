<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\C00Payment\Models\Base\BasePaymentMigration;
use Modules\C00Payment\Enums\PaymentMethodsEnum;

return new class extends BasePaymentMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("{$this->base_dir}_payment_methods", function (Blueprint $table) {
            $this->defaultColumns($table);
            $this->translationsColumn($table);
            $table->enum('payment_method', PaymentMethodsEnum::getValues());
            // $table->enum('payment_method', ['Monetary', 'Credit Card', 'Bank Transfer', 'Check', 'Money Transfer']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("{$this->base_dir}_payment_methods");
    }
};
