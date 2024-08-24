<?php

use Modules\E00Event\Models\Base\BaseEventMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\E00Event\Enums\EventPaidStatusEnum;
use Modules\E00Event\Enums\EventStatusEnum;
use Modules\E00Event\Enums\LecturerFinancialSystemEnum;

return new class extends BaseEventMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("{$this->base_dir}_events", function (Blueprint $table) {
            $this->defaultColumns($table);
            $this->imageColumn($table);
            $table->string('title');
            $table->string('hall');
            $table->enum('event_paid_status', EventPaidStatusEnum::getValues());
            //
            $table->foreignId('university_id')->constrained("{$this->organization_module_dir}_universities");
            //
            $table->foreignId('college_id')->nullable()->constrained("{$this->organization_module_dir}_colleges")->nullOnDelete();
            //
            $table->foreignId('organizer_id')->nullable()->constrained("{$this->organization_module_dir}_organizations")->nullOnDelete();
            //
            $table->text('description');
            //
            $table->unsignedBigInteger('lecturer_id')->nullable();
            $table->foreign('lecturer_id')->references('id')->on("{$this->user_module_dir}_lecturers");
            //
            $table->double('lecturer_Financial_dues')->nullable();
            $table->enum('lecturer_financial_system', LecturerFinancialSystemEnum::getValues());
            $table->foreignId('event_type_id')->constrained("{$this->base_dir}_event_types");
            //
            $table->foreignId('category_id')->constrained('categories');
            //
            $table->enum('event_status', EventStatusEnum::getValues());
            $table->timestamp('start_date_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("{$this->base_dir}_events");
    }
};
