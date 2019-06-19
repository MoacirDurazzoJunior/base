<?php

namespace App\Validators\Sistema;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

/**
 * Classe para validar os dados de Request para o Controller Usuarios
 */
class PerfilValidator
{

    // lista de regras de validação do validador
    private $rules = [
        'name'              => 'required|string|max:255|unique:roles,name',
        'display_name'      => 'nullable|string|max:255',
        'description'       => 'nullable|string|max:255',
        'permission_id'     => 'required',
    ];

    // lista de mensagens de erro do validador
    private $messages = [
        'name.required'         => 'O campo nome é obrigatório',
        'name.string'           => 'O campo nome deve ser um texto',
        'name.max'              => 'O campo nome deve ter até 255 caracteres',
        'name.unique'           => 'O campo nome já está sendo utilizado',
        'display_name.string'   => 'O campo apelido deve ser um texto',
        'display_name.max'      => 'O campo apelido deve ter até 255 caracteres',
        'description.string'    => 'O campo descrição deve ser um texto',
        'description.max'       => 'O campo descrição deve ter até 255 caracteres',
        'permission_id.required'=> 'O campo permissões é obrigatório',
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
        $rules = [
            'name'              => [
                'required',
                'string',
                'max:255',
                Rule::unique('roles')->ignore( $request->input('id') ),
            ],
            'display_name'      => 'nullable|string|max:255',
            'description'       => 'nullable|string|max:255',
            'permission_id'     => 'required',
        ];
        return Validator::make( $request->all(), $rules, $this->messages )->validate();
    }
}
