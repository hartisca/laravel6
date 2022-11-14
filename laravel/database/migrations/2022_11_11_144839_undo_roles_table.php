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
    public function up(){
        //Schema::dropIfExists('roles');  (eliminar?)

        Schema::table('users', function (Blueprint $table){
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');

        });
        Schema::drop('roles');
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
