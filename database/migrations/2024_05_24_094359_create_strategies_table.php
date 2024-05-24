<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStrategiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('strategies', function (Blueprint $table) {
            $table->id('ID_Strategy');
            $table->string('Mastername');
            $table->text('Summary');
            $table->text('Today');
            $table->text('Tomorrow');
            $table->text('How');
            $table->text('Internal_alignment');
            $table->text('External_alignment');
            $table->json('Resource_needed'); // Assuming you store IDs of persons in a JSON array
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
        Schema::dropIfExists('strategies');
    }
}
