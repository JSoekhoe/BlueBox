<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateActionsTable extends Migration
{
    public function up()
    {
        Schema::table('actions', function (Blueprint $table) {
            $table->string('Who')->nullable()->change();
            $table->string('Support')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('actions', function (Blueprint $table) {
            $table->unsignedBigInteger('Who')->nullable(false)->change();
            $table->unsignedBigInteger('Support')->nullable(false)->change();
        });
    }
}
