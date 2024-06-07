<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionsTable extends Migration
{
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->id('action_id');
            $table->unsignedBigInteger('strategy_id');
            $table->string('Action');
            $table->text('Who')->nullable();
            $table->text('Support')->nullable();
            $table->dateTime('When');
            $table->string('Status');
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('strategy_id')->references('Strategy_id')->on('strategies')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('actions');
    }
}
