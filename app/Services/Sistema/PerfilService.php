<?php

namespace App\Services\Sistema;

use App\Services\BaseService;
use App\Repositories\Sistema\PerfilRepository;
use Illuminate\Support\Facades\Route;

/**
 * Classe para operações da camada de Service em Perfil
 * 
 * @author Moka
 */
class PerfilService extends BaseService
{

    /**
     * Inicializa a referência ao Repository
     */
	public function __construct(PerfilRepository $repository)
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
            'permissao' => $data['permissao'],
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
            'permissao' => $data['permissao'],
            'result' => $data['result'],
            'route' => $this->prefix( Route::currentRouteName() ),
        ];
    }
    
}