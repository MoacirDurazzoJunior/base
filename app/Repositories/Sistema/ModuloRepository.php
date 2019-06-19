<?php

namespace App\Repositories\Sistema;

use App\Models\Sistema\Modulo;
use App\Repositories\BaseRepository;
/**
 * Classe para operações da camada de Repository em Usuários
 * 
 * @author Moka
 */
class ModuloRepository extends BaseRepository
{
    /**
     * Inicializa as referências ao Log e ao Model
     */
	public function __construct(Modulo $model)
	{
        parent::__construct($model);
    }
    
}