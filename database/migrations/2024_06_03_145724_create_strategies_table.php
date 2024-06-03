<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStrategiesTable extends Migration
{
    public function up()
    {
        Schema::create('strategies', function (Blueprint $table) {
            $table->id('ID_Strategy');
            $table->string('Mastername');
            $table->text('Summary')->nullable();
            $table->text('Today')->nullable();
            $table->text('Tomorrow')->nullable();
            $table->text('How')->nullable();
            $table->text('Internal_alignment')->nullable();
            $table->text('External_alignment')->nullable();
            $table->text('Resource_needed')->nullable(); // Change JSON to text
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('strategies');
    }
}
