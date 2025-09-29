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
     Schema::create('subscriptions', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->unsignedBigInteger('subscriber_id');   
    $table->unsignedBigInteger('subscribed_to_id'); 
    $table->timestamps();
    $table->foreign('subscriber_id')->references('UserID')->on('bebin_users')->onDelete('cascade');
    $table->foreign('subscribed_to_id')->references('UserID')->on('bebin_users')->onDelete('cascade');
    $table->unique(['subscriber_id', 'subscribed_to_id']);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
