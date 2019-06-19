<?php

namespace App\Validators\Sistema;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

/**
 * Classe para validar os dados de Request para o Controller Usuarios
 */
class ModuloValidator
{

    // lista de mensagens de erro do validador
    private $messages = [
        'nome.required'         => 'O campo nome é obrigatório',
        'nome.string'           => 'O campo nome deve ser um texto',
        'nome.max'              => 'O campo nome deve ter até 255 caracteres',
        'icone.required'        => 'O campo icone é obrigatório',
        'icone.string'          => 'O campo icone deve ser um texto',
        'icone.max'             => 'O campo icone deve ter até 255 caracteres',
        'tema.required'         => 'O campo tema é obrigatório',
        'cor.required'          => 'O campo cor é obrigatório',
        'prefixo.required'      => 'O campo prefixo é obrigatório',
        'prefixo.string'        => 'O campo prefixo deve ser um texto',
        'prefixo.max'           => 'O campo prefixo deve ter até 255 caracteres',
        'prefixo.unique'        => 'Este prefixo já está em uso, escolha um diferente',
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
            'icone'     => 'required|string|max:255',
            'tema'      => 'required',
            'cor'       => 'required',
            'prefixo'   => 'required|string|max:255|unique:modulos,prefixo'
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
            'icone'     => 'required|string|max:255',
            'tema'      => 'required',
            'cor'       => 'required',
            'prefixo'   => [
                'required',
                'string',
                'max:255',
                Rule::unique('modulos')->ignore( $request->input('id') ),
            ]
        ];
        return Validator::make( $request->all(), $rules, $this->messages )->validate();
    }
}
