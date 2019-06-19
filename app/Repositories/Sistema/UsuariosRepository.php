<?php

namespace App\Repositories\Sistema;

use App\Repositories\BaseRepository;
use App\Models\Sistema\Role;
use App\Models\Sistema\User;
use Illuminate\Support\Facades\Hash;

/**
 * Classe para operações da camada de Repository em Usuários
 * 
 * @author Moka
 */
class UsuariosRepository extends BaseRepository
{
    /**
     * Inicializa as referências ao Log e ao Model
     */
	public function __construct(User $model)
	{
        parent::__construct($model);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return [
            'perfil' => Role::all()->sortBy('name')->pluck('detalhes', 'id')
        ];
    }

    /**
     * Store a newly created resource in storage.
     * 
     * Recebe dados a serem salvos do Service
     * Realiza o registro no BD
     * Realiza um log do registro criado
     * Retorna resultado ao Service
     *
     * @param Array $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store( $request )
    {
        $registro = parent::store( $request );
        $registro->roles()->sync( $request['role_id'] );
        return $registro;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        return [
            'perfil' => Role::all()->sortBy('name')->pluck('detalhes', 'id'),
            'result' => $this->model->where( 'id', $id )->first()
        ];
    }

    /**
     * Update the specified resource in storage.
     * 
     * Recebe dados a serem atualizados do service
     * Realiza o update no BD
     * Realiza o Log de Registro
     * Retorna resultado ao Service
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( $request, $id )
    {
        if( !empty( $request['password'] ) ){
            $request['password'] = Hash::make( $request['password'] );
        }else{
            $model = $this->model->find( $id );
            $request['password'] = $model->password;
        }
        $registro = parent::update( $request, $id );
        $registro->roles()->sync([]);
        $registro->roles()->sync( $request['role_id'] );
        return $registro;
    }
    
}