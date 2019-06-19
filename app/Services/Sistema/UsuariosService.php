<?php

namespace App\Services\Sistema;

use App\Services\BaseService;
use App\Repositories\Sistema\UsuariosRepository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/**
 * Classe para operações da camada de Service em Usuários
 * 
 * @author Moka
 */
class UsuariosService extends BaseService
{
    /**
     * Inicializa a referência ao Repository
     */
	public function __construct(UsuariosRepository $repository)
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
            'perfil' => $data['perfil'],
            'route' => $this->prefix( Route::currentRouteName() ),
        ];
    }

    /**
     * Store a newly created resource in storage.
     * 
     * Recebe dados a serem salvos como novo registro
     * Altera os dados recebidos conforme necessário
     * Envia dados ao parent
     * Retorna resultado ao controller
     *
     * @param Array $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store( $request )
    {
        $request['password'] = Hash::make( $request['password'] );
        return parent::store( $request );
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
            'perfil' => $data['perfil'],
            'result' => $data['result'],
            'route' => $this->prefix( Route::currentRouteName() ),
        ];
    }
    
}