<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\F00Reservation\Enums\ReservationStatusEnum;
use Modules\F00Reservation\Models\Base\BaseReservationMigration;

return new class extends BaseReservationMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("{$this->base_dir}_reservations", function (Blueprint $table) {
            $this->defaultColumns($table);

            $table->foreignId('event_id')->constrained("{$this->event_module_dir}_events");
            $table->foreignId('student_id')->constrained("{$this->user_module_dir}_students");
            $table->enum('reservation_status', ReservationStatusEnum::getValues());
            $table->text('canceled_reason')->nullable();
            $table->double('rating')->default(0.0);
            $table->text('comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("{$this->base_dir}_reservations");
    }
};
