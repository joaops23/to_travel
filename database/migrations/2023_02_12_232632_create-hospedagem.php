<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospedagem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospedagens', function(Blueprint $table){
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('userId');
            $table->string('titulo', 50)->nullable();
            $table->string('descricao', 255)->nullable();
            $table->integer('cep')->nullable();
            $table->string('endereco', 70)->nullable();
            $table->integer('nrEndereco')->nullable();
            $table->char('uf', 2);
            $table->enum('activ', ["S", "N"])->nullable()->default('S');


            // chave estrangeira
            $table->foreign('userId')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospedagens');
    }
}
