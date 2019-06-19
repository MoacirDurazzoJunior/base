<?php

namespace App\Http\Controllers\Sistema;

use App\Models\Sistema\Assinatura;
use App\Services\Sistema\AssinaturaService;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

/**
 * Classe Assinatura para operações da camada de Controller
 * 
 * @author Moka
 */
class AssinaturaController extends BaseController
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
    public function __construct(AssinaturaService $service)
    {
        $this->service = $service;
    }

    public function assinar(Request $request){
        return $this->service->assinar($request);
    }
}
