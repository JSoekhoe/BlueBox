<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->string('Mastername');
            $table->string('Category')->nullable();
            $table->date('Contract_expiration')->nullable();
            $table->string('Contract_type')->nullable();
            $table->string('European_SM_short')->nullable();
            $table->string('European_SM_long')->nullable();
            $table->string('Partner')->nullable();
            $table->boolean('Focus')->default(false);
            $table->unsignedBigInteger('contract_id');
            $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};
