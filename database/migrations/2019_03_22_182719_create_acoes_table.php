<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acoes', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('sub_modulo_id');
            $table->string('nome');
            $table->string('rota');
            $table->string('icone');
            $table->text('descricao')->nullable();
            $table->uuid('cadastrado_por')->nullable();
            $table->uuid('editado_por')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acoes');
    }
}
