<?php

namespace App\Validators\Sistema;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

/**
 * Classe para validar os dados de Request para o Controller Usuarios
 */
class UserValidator
{
    
    // lista de mensagens de erro do validador
    private $messages = [
        'nome.required'         => 'O campo nome é obrigatório',
        'nome.string'           => 'O campo nome deve ser um texto',
        'nome.max'              => 'O campo nome deve ter até 255 caracteres',
        'login.required'        => 'O campo login é obrigatório',
        'login.string'          => 'O campo login deve ser um texto',
        'login.max'             => 'O campo login deve ter até 255 caracteres',
        'login.unique'          => 'Este login já está em uso, escolha um diferente',
        'email.required'        => 'O campo email é obrigatório',
        'email.email'           => 'O campo email deve ser um email válido',
        'email.max'             => 'O campo email deve ter até 255 caracteres',
        'password.required'     => 'O campo senha é obrigatório',
        'password.string'       => 'O campo senha deve ser um texto',
        'password.max'          => 'O campo senha deve ter até 255 caracteres',
        'role_id.required'      => 'O campo perfis é obrigatório',
    ];

    /**
     * Valida os dados de request para a função store
     *
     * @author Moka
     */
    public function store( Request $request )
    {
        $rules = [
            'nome'      => 'required|string|max:255',
            'login'     => 'required|string|max:255|unique:users,login',
            'email'     => 'required|email|max:255',
            'password'  => 'required|string|max:255',
            'role_id'   => 'required'
        ];
        
        return Validator::make( $request->all(), $rules, $this->messages )->validate();
    }

    /**
     * Valida os dados de request para a função store
     *
     * @author Moka
     */
    public function update( Request $request )
    {
        $rules = [
            'nome'      => 'required|string|max:255',
            'login'     => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore( $request->input('id') ),
            ],
            'email'     => 'required|email|max:255',
            'password'  => 'nullable|string|max:255',
            'role_id'   => 'required'
        ];
        return Validator::make( $request->all(), $rules, $this->messages )->validate();
    }
}
