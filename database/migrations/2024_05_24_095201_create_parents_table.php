<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->id('ID_Master');
            $table->string('Mastername');
            $table->string('Category'); // CHAMPIONS, UEFA, MAINTAIN, PROSPECT, 1-PARTNER
            $table->date('Contract_expiration');
            $table->enum('Contract_type', ['Local', 'Central']);
            $table->text('European_SM_short')->nullable();
            $table->text('European_SM_long')->nullable();
            $table->unsignedBigInteger('ID_Partner')->nullable();
            $table->string('Partner'); // You can use a JSON or pivot table for multiple selections
            $table->boolean('Focus');
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
        Schema::dropIfExists('parents');
    }
}
