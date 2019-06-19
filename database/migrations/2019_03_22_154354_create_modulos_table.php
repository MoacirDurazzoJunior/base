<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('nome');
            $table->string('icone');
            $table->string('tema');
            $table->string('cor');
            $table->string('prefixo')->unique();
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
        Schema::dropIfExists('modulos');
    }
}
