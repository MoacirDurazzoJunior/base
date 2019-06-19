<?php

namespace App\Services\Sistema;

use App\Services\BaseService;
use App\Repositories\Sistema\AcaoRepository;
use Illuminate\Support\Facades\Route;

/**
 * Classe para operações da camada de Service em Usuários
 * 
 * @author Moka
 */
class AcaoService extends BaseService
{

    /**
     * Inicializa a referência ao Repository
     */
	public function __construct(AcaoRepository $repository)
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
            'submodulo' => $data['submodulo'],
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
            'submodulo' => $data['submodulo'],
            'result' => $data['result'],
            'route' => $this->prefix( Route::currentRouteName() ),
        ];
    }
    
}