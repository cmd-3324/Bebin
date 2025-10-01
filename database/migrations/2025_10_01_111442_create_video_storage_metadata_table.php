<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('video_storage_metadata', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('UserID');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('videoPath');
            $table->string('OriginalFilename')->nullable();
            $table->timestamps();

            $table->foreign('UserID')->references('UserID')->on('bebin_users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('video_storage_metadata');
    }
};
