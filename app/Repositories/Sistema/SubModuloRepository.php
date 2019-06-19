<?php

namespace App\Repositories\Sistema;

use App\Repositories\BaseRepository;
use App\Models\Sistema\Modulo;
use App\Models\Sistema\SubModulo;

/**
 * Classe para operações da camada de Repository em Usuários
 * 
 * @author Moka
 */
class SubModuloRepository extends BaseRepository
{
    /**
     * Inicializa as referências ao Log e ao Model
     */
	public function __construct(SubModulo $model)
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
            'modulo' => Modulo::all()->sortBy('nome')->pluck('nome', 'id'),
        ];
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
            'modulo' => Modulo::all()->sortBy('nome')->pluck('nome', 'id'),
            'result' => $this->model->where( 'id', $id )->first()
        ];
    }
    
}