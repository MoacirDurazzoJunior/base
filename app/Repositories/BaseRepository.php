<?php

namespace App\Repositories;

use App\Log\LogEngine;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Classe base para operações da camada de Repository
 * 
 * @author Moka
 */
class BaseRepository
{
    protected $log; // objeto referência a camada de Log
    protected $model; // objeto referência a camada de Model

    /**
     * Inicializa as referências ao Log e ao Model
     */
	public function __construct(Model $model)
	{
        $this->log = new LogEngine();
        $this->model = $model;
    }
    
    /**
     * Display a listing of the resource.
     * 
     * Realiza uma consulta a camada Model e retorna os resultados a camada Service
     * 
     * @param Array $conditions = lista de condições de pesquisa
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $conditions )
    {
        if( !empty( $conditions ) ){
            return $this->model->where( $conditions );
        }else{
            return $this->model->all();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        return $this->model->where( 'id', $id )->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        return $this->model->where( 'id', $id )->first();
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

    /**
     * Remove the specified resource from storage.
     * 
     * Recebe o id a ser excluido do Service
     * Realiza o delete no BD
     * Realiza o Log de Registro
     * Retorna resultado ao Service
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id, $permanent = false )
    {
        $registro = $this->model->withTrashed()->find($id);
        $dados_anterior = $registro->toJson();
        $this->log->registro([
            'tabela'        => $this->model->getTable(),
            'operacao'      => 'delete',
            'dado_anterior' => $dados_anterior,
            'dado_posterior'=> '',
            'chave'         => $registro->id,
            'usuario'       => Auth::user()->id
        ]);
        return ($permanent) ? $registro->forceDelete() : $registro->delete() ;
    }
}