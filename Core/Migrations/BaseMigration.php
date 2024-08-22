<?php

namespace Core\Migrations;

use Core\Traits\ModuleTrait;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use App\Enums\GendersEnum;
use App\Enums\FilesTypesEnum;
use App\Enums\FilesSizeUnitsEnum;

class BaseMigration extends Migration
{
    use ModuleTrait;
    protected string $base_dir;

    public function __construct()
    {
        $this->base_dir = strtolower($this->getModuleName());
        $this->contact_module_dir = strtolower($this->contact_module_dir);
        $this->user_module_dir = strtolower($this->user_module_dir);
        $this->payment_module_dir = strtolower($this->payment_module_dir);
        $this->organization_module_dir = strtolower($this->organization_module_dir);
        $this->event_module_dir = strtolower($this->event_module_dir);
        $this->reservation_module_dir = strtolower($this->reservation_module_dir);
        $this->notification_module_dir = strtolower($this->notification_module_dir);
        $this->chat_module_dir = strtolower($this->chat_module_dir);
    }

    protected function leadingColumns(Blueprint $table): void
    {
        $table->id();
    }

    /**
     * not all tables should have it
     */
    protected function optionalColumns(Blueprint $table): void
    {
        $table->uuid()->unique();
    }

    protected function translationsColumn(Blueprint $table): void
    {
        $table->json('translations');
    }

    protected function usersColumns(Blueprint $table): void
    {
        $table->string('avatar')->nullable();
        $table->string('first_name')->nullable();
        $table->string('last_name')->nullable();
        $table->string('username')->nullable()->unique();
        $table->enum('gender', GendersEnum::getValues())->nullable();
        $table->string('email')->unique();
        $table->string('mobile')->unique();
        $table->string('password');
        $table->boolean('is_active')->default(false);
        $table->boolean('is_blocked')->default(false);
        $table->timestamp('email_verified_at')->nullable();
        $table->timestamp('mobile_verified_at')->nullable();
        $table->timestamp('last_login')->nullable();
        $table->json('contact_info')->nullable();
        $table->rememberToken();
    }

    /**
     * common columns
     */
    protected function timestampsColumns(Blueprint $table): void
    {
        $table->timestamps();
    }

    protected function imageColumn(Blueprint $table): void
    {
        $table->string('image')->nullable();
    }

    protected function defaultColumns(Blueprint $table): void
    {
        $table->id();
        $table->uuid()->unique();
        $table->timestamps();
    }

    protected function fileColumns(Blueprint $table): void
    {
        $table->enum('attachment_type', FilesTypesEnum::getValues());
        $table->string('file_path'); ///uploads/documents/2023/12.4.xxx.398494894.333.pdf
        $table->string('file_name'); //book.pdf
        $table->string('mime_type'); //document/pdf, document/plain
        $table->string('file_extension'); //txt
        $table->double('file_size');
        $table->enum('file_size_unit', FilesSizeUnitsEnum::getValues());
        $table->json('file_info');
    }

    protected function morphColumns(Blueprint $table): void
    {
        $table->string('entity_type');
        $table->string('entity_id');
    }
}
