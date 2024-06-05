<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionsTable extends Migration
{
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->id('ID_Action');
            $table->unsignedBigInteger('ID_Strategy');
            $table->string('Action');
            $table->unsignedBigInteger('Who');
            $table->unsignedBigInteger('Support');
            $table->date('When');
            $table->string('Status');
            $table->timestamps();


            
        });
    }

    public function down()
    {
        Schema::dropIfExists('actions');
    }
}
