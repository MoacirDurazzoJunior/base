<?php

namespace App\Http\Controllers;

use App\Services\BaseService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

/**
 * Classe base para operações da camada de Controller
 * 
 * @author Moka
 */
class BaseController extends Controller
{
    protected $service;     // referencia a camada de service
    protected $user;        // referencia ao usuario logado

    /**
     * Cria uma instância do controller e inicializa as referências necessárias
     * Inicializa todos os valores a serem compartilhados entre todas as controllers e views 
     *
     * @return void
     * @author Moka
     */
    public function __construct(BaseService $service)
    {
        $this->service = $service;
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user(); 
            View::share('logged_user', $this->user);
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     * 
     * @param \Illuminate\Http\Request  $request
     * @param String view = View que deve ser renderizada
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $view)
    {
        if( view()->exists( $view ) ){
            $data = $this->service->index( $request->all() );
            return view( $view, $data );
        }else{
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @param String view = View que deve ser renderizada
     *
     * @return \Illuminate\Http\Response
     */
    public function create($view)
    {
        if( view()->exists( $view ) ){
            $data = $this->service->create();
            return view( $view, $data );
        }else{
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request  $request
     * @param String route = Rota que deve ser chamada após executar a ação
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $route)
    {
        if( Route::has( $route ) ){
            $data = $this->service->store( $request->all() );
            return redirect()->route( $route )->with('success', 'O Registro foi cadastrado com sucesso.');
        }else{
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param String view = View que deve ser renderizada
     * 
     * @return \Illuminate\Http\Response
     */
    public function show($id, $view)
    {
        if( view()->exists( $view ) ){
            $data = $this->service->show( $id );
            return view( $view, $data );
        }else{
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int  $id
     * @param String view = View que deve ser renderizada
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $view)
    {
        if( view()->exists( $view ) ){
            $data = $this->service->edit( $id );
            return view( $view, $data );
        }else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request  $request
     * @param int  $id
     * @param String route = Rota que deve ser chamada após executar a ação     * 
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $route)
    {
        if( Route::has( $route ) ){
            $data = $this->service->update( $request->all(), $id );
            return redirect()->route( $route )->with('success','O Registro foi atualizado com sucesso.');
        }else{
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int  $id
     * @param String route = Rota que deve ser chamada após executar a ação
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $route)
    {
        if( Route::has( $route ) ){
            $data = $this->service->destroy( $id );
            return redirect()->route( $route )->with('success','O Registro foi excluído com sucesso.');
        }else{
            abort(404);
        }
    }
}
