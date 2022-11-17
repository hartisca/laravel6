<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('places', function (Blueprint $table) {
        
            $table->id();
            $table->string('description',255);
            $table->unsignedBigInteger ('file_id')->nullable();
            $table->foreign('file_id')->references ('id')->on ('files')->onDelete('set null');
            $table->float ('latitude',8,2);
            $table->float ('longitude',8,2);
            //$table->unsignedBigInteger ('category_id');
            //$table->unsignedBigInteger ('visibility_id');
            $table->unsignedBigInteger ('author_id')->nullable();
            $table->foreign('author_id')->references('id')->on ('users')->onDelete('set null');
            $table-> timestamps ();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
};
