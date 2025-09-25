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
     Schema::create('categories', function (Blueprint $table): void{
        $table->bigIncrements("CatID");
        $table->integer("videos_num");
        $table->string('cat_name');

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
