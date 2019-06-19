<?php

namespace App\Repositories\Sistema;

use App\Repositories\BaseRepository;
use App\Models\Sistema\Role;
use App\Models\Sistema\Permission;
use Illuminate\Support\Facades\Auth;

/**
 * Classe para operações da camada de Repository em Usuários
 * 
 * @author Moka
 */
class PerfilRepository extends BaseRepository
{
    /**
     * Inicializa as referências ao Log e ao Model
     */
	public function __construct(Role $model)
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
            'permissao' => Permission::all()->sortBy('name')->pluck('detalhes', 'id')
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
        $registro->attachPermissions( $request['permission_id'] );
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
            'permissao' => Permission::all()->sortBy('name')->pluck('detalhes', 'id'),
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
        $registro = parent::update( $request, $id );
        $registro->perms()->sync([]);
        $registro->attachPermissions( $request['permission_id'] );
        return $registro;
    }
    
}