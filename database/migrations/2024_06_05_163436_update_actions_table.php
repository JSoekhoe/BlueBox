<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateActionsTable extends Migration
{
    public function up()
    {
        Schema::table('actions', function (Blueprint $table) {
            // Change the columns 'Who' and 'Support' to text type
            $table->text('Who')->nullable()->change();
            $table->text('Support')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('actions', function (Blueprint $table) {
            // Revert the columns 'Who' and 'Support' back to their original types
            $table->text('Who')->nullable(false)->change();
            $table->text('Support')->nullable(false)->change();
        });
    }
}
