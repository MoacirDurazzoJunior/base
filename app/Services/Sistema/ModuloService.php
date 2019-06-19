<?php

namespace App\Services\Sistema;

use App\Services\BaseService;
use App\Repositories\Sistema\ModuloRepository;
use Illuminate\Support\Facades\Route;

/**
 * Classe para operações da camada de Service em Usuários
 * 
 * @author Moka
 */
class ModuloService extends BaseService
{
    private $cores;
    private $temas;

    /**
     * Inicializa a referência ao Repository
     */
	public function __construct(ModuloRepository $repository)
	{
        $this->cores = [
            'blue'      => 'Azul',
            'indigo'    => 'Azul Anil',
            'blue-grey' => 'Cinza',
            'orange'    => 'Laranja',
            'purple'    => 'Magenta',
            'brown'     => 'Marrom',
            'cyan'      => 'Turquesa',
            'green'     => 'Verde',
            'teal'      => 'Verde Azulado',
            'red'       => 'Vermelho'
        ];
        $this->temas = [
            'blue'      => 'Azul',
            'indigo'    => 'Azul Anil',
            'blue-grey' => 'Cinza',
            'orange'    => 'Laranja',
            'purple'    => 'Magenta',
            'brown'     => 'Marrom',
            'cyan'      => 'Turquesa',
            'green'     => 'Verde',
            'teal'      => 'Verde Azulado',
            'red'       => 'Vermelho'
        ];
        parent::__construct( $repository );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return [
            'cores' => $this->cores,
            'route' => ( $this->prefix( Route::currentRouteName() ) ),
            'temas' => $this->temas
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
            'cores' => $this->cores,
            'result' => $this->repository->edit( $id ),
            'route' => ( $this->prefix( Route::currentRouteName() ) ),
            'temas' => $this->temas
        ];
    }
    
}