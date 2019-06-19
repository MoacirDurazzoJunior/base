<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\BaseController;
use App\Services\Sistema\PerfilService;
use App\Validators\Sistema\PerfilValidator;

use Illuminate\Http\Request;

/**
 * Classe para operações da camada de Controller em Usuários
 * 
 * @author Moka
 */
class PerfilController extends BaseController
{
    protected $validator;

    /**
     * Cria uma instância do controller e inicializa as referências necessárias
     * Inicializa todos os valores a serem compartilhados entre todas as controllers e views 
     *
     * @author Moka
     * @return void
     */
    public function __construct(PerfilService $service)
    {
        $this->validator = new PerfilValidator();
        parent::__construct( $service );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $view = 'pages.sistema.perfis.index')
    {
        return parent::index($request, $view);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($view = 'pages.sistema.perfis.create')
    {
        return parent::create($view);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $route = 'sistema.perfis.index')
    {
        $validData = $this->validator->store( $request );
        return parent::store($request, $route);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $view = 'pages.sistema.perfis.show')
    {
        return parent::show($id, $view);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $view = 'pages.sistema.perfis.edit')
    {
        return parent::edit($id, $view);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $route = 'sistema.perfis.index')
    {
        $validData = $this->validator->update( $request );
        return parent::update($request, $id, $route);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $route = 'sistema.perfis.index')
    {
        return parent::destroy($id, $route);
    }
}
