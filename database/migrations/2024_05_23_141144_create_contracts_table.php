<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('area');
            $table->date('end_date');
            $table->string('payment_terms');
            $table->decimal('rebate', 5, 2);
            $table->string('rebate_period');
            $table->boolean('paper_review');
            $table->string('review_period');
            $table->string('review_base');
            $table->string('cto_type');
            $table->decimal('cto_value', 5, 2)->nullable();
            $table->boolean('sob');
            $table->decimal('sob_value', 15, 2)->nullable();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
