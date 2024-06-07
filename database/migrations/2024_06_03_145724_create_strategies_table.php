<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStrategiesTable extends Migration
{
    public function up()
    {
        Schema::create('strategies', function (Blueprint $table) {
            $table->id('strategy_id'); // Corrected to strategy_id
            $table->string('Mastername');
            $table->text('Summary')->nullable();
            $table->text('Today')->nullable();
            $table->text('Tomorrow')->nullable();
            $table->text('How')->nullable();
            $table->text('Internal_alignment')->nullable();
            $table->text('External_alignment')->nullable();
            $table->text('Resource_needed')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('strategies');
    }
}
