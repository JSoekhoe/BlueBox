<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBBPEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bbp_employers', function (Blueprint $table) {
            $table->id('ID_BBP');
            $table->string('Gender');
            $table->string('First_Name');
            $table->string('Last_Name');
            $table->string('BBP_Role');
            $table->string('Email')->unique();
            $table->string('Phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bbp_employers');
    }
}