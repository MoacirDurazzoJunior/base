<?php

namespace App\Services\Sistema;

use App\Repositories\Sistema\AssinaturaRepository;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Traits\Text;
use App\Models\Sistema\User;
use Illuminate\Support\Facades\Hash;
/**
 * Classe base para operações da camada de Service
 * 
 * @author Moka
 */
class AssinaturaService extends BaseService
{
    // use Rota;

    protected $repository; // objeto referência a camada de Repository

    /**
     * Inicializa a referência ao Repository
     */
	public function __construct(AssinaturaRepository $repository)
	{
        $this->repository = $repository;
    }

    public function assinar(Request $request){
        // dd($request);
        $route = $request['route_return'];
        $registro_id = $request['registro_id'];
        $user = User::find($request['user_id']);
        if( Hash::check($request['password'], $user->password) ){
            $assinatura = $this->repository->find_registro($registro_id);
            // dd($assinatura);
            if(count($assinatura)>0){
                return redirect()->route( $route, $registro_id )->with('info', 'Registro já foi assinado');
            }else{
                // dd($request);
                $this->repository->store($request->all());
                return redirect()->route( $route, $registro_id )->with('success', 'Registro Assinado com Sucesso');
            }
        }else{
            return redirect()->route( $route, $registro_id )->with('danger', 'Senha Inválida');
        }
        // dd($request);

    }
}