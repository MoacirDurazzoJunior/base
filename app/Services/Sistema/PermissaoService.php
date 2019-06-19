<?php

namespace App\Services\Sistema;

use App\Services\BaseService;
use App\Repositories\Sistema\PermissaoRepository;
use Illuminate\Support\Facades\Route;

/**
 * Classe para operações da camada de Service em Permissao
 * 
 * @author Moka
 */
class PermissaoService extends BaseService
{

    /**
     * Inicializa a referência ao Repository
     */
	public function __construct(PermissaoRepository $repository)
	{
        parent::__construct( $repository );
    }
    
}