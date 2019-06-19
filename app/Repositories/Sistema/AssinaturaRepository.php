<?php

namespace App\Repositories\Sistema;

use App\Repositories\BaseRepository;
use App\Models\Sistema\Assinatura;
use Illuminate\Support\Facades\Auth;

/**
 * Classe para operações da camada de Repository em Usuários
 * 
 * @author Moka
 */
class AssinaturaRepository extends BaseRepository
{
    /**
     * Inicializa as referências ao Log e ao Model
     */
	public function __construct(Assinatura $model)
	{
        parent::__construct($model);
    }
    public function store( $request )
    {
        $registro = $this->model->create( $request );
        $this->log->registro([
            'tabela'        => $this->model->getTable(),
            'operacao'      => 'create',
            'dado_anterior' => '',
            'dado_posterior'=> collect($request)->toJson(),
            'chave'         => $registro->id,
            'usuario'       => Auth::user()->id
        ]);
        return $registro;
    }

    public function find_registro($registro_id){
		return $this->model->where('registro_id', '=',$registro_id)->get();
	}
    
}