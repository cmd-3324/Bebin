<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bebin_user_video_storage_metadata', function (Blueprint $table) {
            $table->unsignedBigInteger('UserID');
            $table->unsignedBigInteger('video_storage_id');

            $table->foreign('UserID')
                  ->references('UserID')
                  ->on('bebin_users')
                  ->onDelete('cascade');

            $table->foreign('video_storage_id')
                  ->references('id')
                  ->on('video_storage_metadata')
                  ->onDelete('cascade');

            $table->primary(['UserID', 'video_storage_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bebin_user_video_storage_metadata');
    }
};
