<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_modulos', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('modulo_id');
            $table->string('nome');
            $table->string('icone');
            $table->string('rota')->nullable();
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
        Schema::dropIfExists('sub_modulos');
    }
}
