<?php

namespace App\Services\Dashboard;

use App\Services\BaseService;
use App\Repositories\Dashboard\DashboardRepository;
use Illuminate\Http\Request;

/**
 * Classe para operações da camada de Service em Usuários
 * 
 * @author Moka
 */
class DashboardService extends BaseService
{
    /**
     * Inicializa a referência ao Repository
     */
	public function __construct(DashboardRepository $repository)
	{
        parent::__construct( $repository );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( $request, $id )
    {
        return [
            'result' => $this->repository->update( $request, $id )
        ];
    }
    
}