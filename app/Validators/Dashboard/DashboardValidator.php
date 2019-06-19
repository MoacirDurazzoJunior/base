<?php

namespace App\Validators\Dashboard;

use Illuminate\Http\Request;
use Validator;

/**
 * Classe para validar os dados de Request para o Controller Usuarios
 */
class DashboardValidator
{
    
    // lista de regras de validação
    private $rules = [
        'nome'      => 'required|string|max:255',
        'email'     => 'required|email|max:255',
        'password'  => 'nullable|string|max:255'
    ];

    // lista de mensagens de erro do validador
    private $messages = [
        'nome.required'         => 'O campo nome é obrigatório',
        'nome.string'           => 'O campo nome deve ser um texto',
        'nome.max'              => 'O campo nome deve ter até 255 caracteres',
        'email.required'        => 'O campo email é obrigatório',
        'email.email'           => 'O campo email deve ser um email válido',
        'email.max'             => 'O campo email deve ter até 255 caracteres',
        'password.required'     => 'O campo senha é obrigatório',
        'password.string'       => 'O campo senha deve ser um texto',
        'password.max'          => 'O campo senha deve ter até 255 caracteres'
    ];

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
