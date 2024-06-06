<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('actions')) {
            Schema::create('actions', function (Blueprint $table) {
                $table->unsignedBigInteger('ID_Strategy');
                $table->string('Action');
                $table->text('Who')->nullable();
                $table->text('Support')->nullable();
                $table->dateTime('When');
                $table->string('Status');
                $table->timestamps();

                // Define foreign key constraints
            
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('actions');
    }
}
