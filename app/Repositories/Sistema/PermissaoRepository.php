<?php

namespace App\Repositories\Sistema;

use App\Repositories\BaseRepository;
use App\Models\Sistema\Permission;

/**
 * Classe para operações da camada de Repository em Usuários
 * 
 * @author Moka
 */
class PermissaoRepository extends BaseRepository
{
    /**
     * Inicializa as referências ao Log e ao Model
     */
	public function __construct(Permission $model)
	{
        parent::__construct($model);
    }
    
}