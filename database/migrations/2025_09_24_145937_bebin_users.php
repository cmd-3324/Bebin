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
    Schema::create("bebin_users", function(Blueprint $table){
        $table->bigIncrements("UserID");
        $table->string("UserName");
        $table->integer("SubscribersNum")->default(0);
        $table->integer('Age')->default(18);
        $table->integer("Video_num")->default(0);
        $table->integer("comments_num");
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
