<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Dashboard\DashboardService;
use App\Validators\Dashboard\DashboardValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class DashboardController extends Controller
{
    protected $service;
    protected $validator;

    public function __construct(DashboardService $service)
    {
        $this->service = $service;
        $this->validator = new DashboardValidator();
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.dashboard.index');
    }

    /**
     * Exibe formulário para atualização de perfil
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perfil()
    {
        return view('pages.dashboard.perfil', ['result' => Auth::user()]);
    }

    /**
     * Atualiza o perfil
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $route = 'dashboard.index')
    {
        $validData = $this->validator->update( $request );
        if( Route::has( $route ) ){
            $data = $this->service->update( $request->all(), $id );
            return redirect()->route( $route )->with('success','Seu perfil foi atualizado.');
        }else{
            abort(404);
        }
        return parent::update($request, $id, $route);
    }
}
