<?php

namespace App\Validators\Sistema;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

/**
 * Classe para validar os dados de Request para o Controller Usuarios
 */
class SubModuloValidator
{

    // lista de regras de validação do validador
    private $rules = [
        'modulo_id' => 'required',
        'nome'      => 'required|string|max:255',
        'icone'     => 'required|string|max:255',
        'rota'      => 'nullable|string|max:255'
    ];

    // lista de mensagens de erro do validador
    private $messages = [
        'modulo_id.required'    => 'O campo modulo é obrigatório',
        'nome.required'         => 'O campo nome é obrigatório',
        'nome.string'           => 'O campo nome deve ser um texto',
        'nome.max'              => 'O campo nome deve ter até 255 caracteres',
        'icone.required'        => 'O campo icone é obrigatório',
        'icone.string'          => 'O campo icone deve ser um texto',
        'icone.max'             => 'O campo icone deve ter até 255 caracteres',
        'rota.string'           => 'O campo rota deve ser um texto',
        'rota.max'              => 'O campo rota deve ter até 255 caracteres',
    ];

    /**
     * Valida os dados de request para a função store
     *
     * @author Moka
     */
    public function store( Request $request )
    {
        return Validator::make( $request->all(), $this->rules, $this->messages )->validate();
    }

    /**
     * Valida os dados de request para a função store
     *
     * @author Moka
     */
    public function update( Request $request )
    {
        return Validator::make( $request->all(), $this->rules, $this->messages )->validate();
    }
}
