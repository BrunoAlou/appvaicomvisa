<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('attachments', function (Blueprint $table): void {
            $table->id();
            $table->text('token');
            $table->string('type');
            $table->integer('attachable_id')->nullable();
            $table->string('attachable_type')->nullable();
            $table->string('original_file_name');
            $table->double('original_file_size');
            $table->string('original_file_mimetype');
            $table->string('file_name');
            $table->double('file_size');
            $table->string('file_path');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('attachments');
    }
};
