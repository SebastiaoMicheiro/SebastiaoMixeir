<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salarios', function (Blueprint $table) {
            $table->id();
            $table->date('data_pagamento');
            $table->float('salario_base',9,2)->default (0);
            $table->float('subsidio')->default(0);
            $table->float('desconto')->default(0);
            $table->float('salario_liquido')->default(0);
            $table->foreignId('funcionario_id')->constrained('funcionarios');
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
        Schema::dropIfExists('salarios');
    }
};
