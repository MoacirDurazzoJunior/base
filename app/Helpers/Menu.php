<?php

namespace App\Helpers;

use App\Models\Sistema\Modulo;
use App\Models\Sistema\SubModulo;
use Illuminate\Support\Facades\Route;

/**
 * Classe Helper para criação de Menus e Sub Menus
 */
class Menu
{
    /**
     * Retorna todos os módulos do sistema
     */
    public static function getAllModulos()
    {
        return Modulo::all()->sortBy('nome');
    }

    /**
     * Retorna o modulo do prefixo indicado
     */
    public static function getModulo( $prefixo )
    {
        return Modulo::where('prefixo', $prefixo)->first();
    }

    /**
     * Verifica se a dada rota pertence a ação atual
     */
    public static function acaoAtual( $rota )
    {
        $rota_atual = explode( '.', Route::currentRouteName() );
        array_pop($rota_atual);
        $rota = explode( '.', $rota );
        array_pop($rota);
        return ( implode('.', $rota_atual) == implode('.', $rota) );
    }

    /**
     * Verifica se a dada lista de rotas possui a rota a tual
     */
    public static function submoduloAtual( $rotas )
    {
        $rota_atual = explode( '.', Route::currentRouteName() );
        array_pop($rota_atual);
        $rota_atual = implode('.', $rota_atual);

        foreach( $rotas as $rota ){
            $rota = explode( '.', $rota );
            array_pop($rota);
            if( implode('.', $rota) == $rota_atual ){
                return true;
            }
        }

        return false;
    }
}