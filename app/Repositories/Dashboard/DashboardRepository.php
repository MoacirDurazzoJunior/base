<?php

namespace App\Repositories\Dashboard;

use App\Repositories\BaseRepository;
use App\Models\Sistema\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Classe para operações da camada de Repository em Usuários
 * 
 * @author Moka
 */
class DashboardRepository extends BaseRepository
{
    /**
     * Inicializa as referências ao Log e ao Model
     */
	public function __construct(User $model)
	{
        parent::__construct($model);
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
        $registro = $this->model->find( $id );

        if( !empty( $request['password'] ) ){
            $request['password'] = Hash::make( $request['password'] );
        }else{
            $request['password'] = $registro->password;
        }
        
        $dados_anterior = $registro->toJson();
        $registro->update( $request );
        $dados_posterior = $registro->toJson();
        $this->log->registro([
            'tabela'        => $this->model->getTable(),
            'operacao'      => 'update',
            'dado_anterior' => $dados_anterior,
            'dado_posterior'=> $dados_posterior,
            'chave'         => $registro->id,
            'usuario'       => Auth::user()->id
        ]);

        return $registro;
    }
    
}