<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\C00Payment\Models\Base\BasePaymentMigration;

return new class extends BasePaymentMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("{$this->base_dir}_student_transactions", function (Blueprint $table) {
            $this->defaultColumns($table);
            //
            $table->unsignedBigInteger("student_id");
            $table->foreign('student_id')->references('id')->on("{$this->user_module_dir}_students");
            //
            $table->unsignedBigInteger("reservation_id");
            $table->foreign('reservation_id')->references('id')->on("{$this->reservation_module_dir}_reservations");
            //
            $table->unsignedBigInteger("payment_status_id");
            $table->foreign('payment_status_id')->references('id')->on("{$this->base_dir}_payment_statuses");

            $table->double('amount');

            $table->double('total_required_amount');
            //
            $table->unsignedBigInteger("payment_method_id");
            $table->foreign('payment_method_id')->references('id')->on("{$this->base_dir}_payment_methods");

            $table->double('remaining_amount')->default(0); // المبلغ الباقى
            //
            $table->unsignedBigInteger('currency_id');
            $table->foreign('currency_id')->references('id')->on('currencies');
            //
            //        $table->date('account_period'); // فتره الحساب
            $table->date('due_date')->nullable(); // تاريخ الاستحقاق
            $table->integer('notified_days')->nullable(); // يخطر قبل ايام
            $table->string('reference_number')->nullable();
            $table->date('bank_deposit_date')->nullable(); //تاريخ الإيداع البنكي
            $table->string('bank_name')->nullable();
            $table->text('comments')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("{$this->base_dir}_student_transactions");
    }
};
