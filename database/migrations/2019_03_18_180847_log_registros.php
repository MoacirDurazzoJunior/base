<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LogRegistros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_registros', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('tabela');
            $table->string('operacao');
            $table->text('dado_anterior');
            $table->text('dado_posterior');
            $table->string('chave');
            $table->string('usuario');
            $table->timestamp('datahora')->default( DB::raw('CURRENT_TIMESTAMP') );
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
        Schema::dropIfExists('log_registros');
    }
}
