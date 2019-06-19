<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

/**
 * Classe para preencher os campos cadastrado_por e editado_por em todos os models, antes da realização da ação
 * Define os relacionamentos com os usuários que cadastraram e editaram o registro
 * 
 * @author Moka
 */
trait Trackable
{

    /**
     * Preenche os valores dos campos cadastrado_por e editado_por no momento da criação e edição de registros
     */
    public static function bootTrackable()
    {
        static::creating(function ($model) {
            $model->cadastrado_por = Auth::user()->id;
        });
        static::updating(function ($model) {
            $model->editado_por = Auth::user()->id;
        });
    }

    /**
     * Faz o relacionamento com o usuário que cadastrou o registro
     */
    public function usuarioCadastro()
    {
        return $this->belongsTo('App\Models\User', 'cadastrado_por');
    }

    /**
     * Faz o relacionamento com o usuário que editou o registro
     */
    public function usuarioUpdate()
    {
        return $this->belongsTo('App\Models\User', 'editado_por');
    }

}