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
    {   Schema::create('places', function (Blueprint $table) {
        $table->primary('id'); 
        $table->bigInteger('id', 20);
        $table-> string('name',255);
        $table-> string('description');
        $table-> bigInteger ('file_id', 20);
        $table->float ('latitude');
        $table-> float ('longitude');
        $table-> bigInteger ('category_id',20);
        $table->bigInteger ('visibility_id');
        $table->bigInteger ('author_id',20);
        $table-> timestamps ('created_at');
        $table-> timestamps ('uptated_at');
           
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
