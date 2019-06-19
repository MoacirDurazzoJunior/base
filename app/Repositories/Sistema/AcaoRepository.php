<?php

namespace App\Repositories\Sistema;

use App\Repositories\BaseRepository;
use App\Models\Sistema\Acao;
use App\Models\Sistema\SubModulo;

/**
 * Classe para operações da camada de Repository em Usuários
 * 
 * @author Moka
 */
class AcaoRepository extends BaseRepository
{
    /**
     * Inicializa as referências ao Log e ao Model
     */
	public function __construct(Acao $model)
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
            'submodulo' => SubModulo::all()->sortBy('nome_pai')->pluck('nome_pai', 'id')
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
            'submodulo' => SubModulo::all()->sortBy('nome_pai')->pluck('nome_pai', 'id'),
            'result' => $this->model->where( 'id', $id )->first()
        ];
    }
    
}