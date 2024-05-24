<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCtoAndRebateColumnsInContractsTable extends Migration
{
    public function up()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->decimal('cto_value', 5, 2)->change();
            $table->decimal('rebate', 5, 2)->change();
        });
    }

    public function down()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->decimal('cto_value', 15, 2)->change();
            $table->decimal('rebate', 15, 2)->change();
        });
    }
}
