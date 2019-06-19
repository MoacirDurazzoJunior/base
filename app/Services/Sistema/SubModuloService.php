<?php

namespace App\Services\Sistema;

use App\Services\BaseService;
use App\Repositories\Sistema\SubModuloRepository;
use Illuminate\Support\Facades\Route;

/**
 * Classe para operações da camada de Service em Usuários
 * 
 * @author Moka
 */
class SubModuloService extends BaseService
{

    /**
     * Inicializa a referência ao Repository
     */
	public function __construct(SubModuloRepository $repository)
	{
        parent::__construct( $repository );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->repository->create();
        return [
            'modulo' => $data['modulo'],
            'route' => $this->prefix( Route::currentRouteName() ),
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
        $data = $this->repository->edit( $id );
        return [
            'modulo' => $data['modulo'],
            'result' => $data['result'],
            'route' => $this->prefix( Route::currentRouteName() ),
        ];
    }
    
}