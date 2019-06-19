<?php

namespace App\Services;

use App\Repositories\BaseRepository;
use App\Traits\Route as Rota;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * Classe base para operações da camada de Service
 * 
 * @author Moka
 */
class BaseService
{
    use Rota;

    protected $repository; // objeto referência a camada de Repository

    /**
     * Inicializa a referência ao Repository
     */
	public function __construct(BaseRepository $repository)
	{
        $this->repository = $repository;
    }
    
    /**
     * Display a listing of the resource.
     * 
     * Cria condições de consulta baseado nos dados recebidos via request
     * Solicita resultados da consulta para o Repository
     * Formata resultados recebidos e devolve para o Controller
     * 
     * @param Array $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $request )
    {
        return [
            'result'        => $this->repository->index( $request ),
            'route'         => ( $this->prefix( Route::currentRouteName() ) )
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return [
            'route' => ( $this->prefix( Route::currentRouteName() ) )
        ];
    }

    /**
     * Store a newly created resource in storage.
     * 
     * Recebe dados a serem salvos como novo registro
     * Envia ao Repository para cadastro
     * Retorna resultado ao Controller
     *
     * @param Array $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store( $request )
    {
        return $this->repository->store( $request );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        return [
            'result'        => $this->repository->show( $id ),
            'route'         => ( $this->prefix( Route::currentRouteName() ) )
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
            'result'        => $this->repository->edit( $id ),
            'route'         => ( $this->prefix( Route::currentRouteName() ) )
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( $request, $id )
    {
        return $this->repository->update( $request, $id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        return $this->repository->destroy( $id );
    }
}