<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\C00Payment\Enums\PaymentStatusEnum;
use Modules\C00Payment\Models\Base\BasePaymentMigration;

return new class extends BasePaymentMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("{$this->base_dir}_payment_statuses", function (Blueprint $table) {
            $this->defaultColumns($table);
            $this->translationsColumn($table);
            $table->enum('payment_status', PaymentStatusEnum::getValues());
            // $table->enum('payment_status', ['Paid', 'Pay later', 'Partially paid']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("{$this->base_dir}_payment_statuses");
    }
};
