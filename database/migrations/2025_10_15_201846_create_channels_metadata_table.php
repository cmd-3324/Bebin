<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('channels_metadata', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('UserID');   
            $table->string("channelName");
            $table->float("ChannelViews");
            $table->integer("Subscription");
            $table->integer("Videos");
            $table->boolean('IsPaid')->nullable();
            $table->timestamps();
            $table->unique(['UserID']);
            $table->foreign('UserID')->references('UserID')->on('bebin_users')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('channels_metadata');
    }
};
