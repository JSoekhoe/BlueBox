<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBbpRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bbp_roles', function (Blueprint $table) {
            $table->id('ID_BBP_roles');
            $table->string('BBP_Roles');
            $table->timestamps();

            // Add any additional fields you need here
            // Example:
            // $table->string('description')->nullable();
            // $table->json('additional_data')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bbp_roles');
    }
}
