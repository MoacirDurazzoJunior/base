<?php

namespace App\Log;

use App\Models\Sistema\LogAcesso;
use App\Models\Sistema\LogRegistro;

/**
 * Classe para criação de logs na base de dados
 * 
 * @author Moka
 */
class LogEngine
{
    protected $acesso;
    protected $registro;
    
    /**
     * Inicializa as referências necessárias ao Engine
     */
	public function __construct()
	{
        $this->acesso = new LogAcesso();
        $this->registro = new LogRegistro();
    }

    /**
     * Realiza um Log de Acesso do Sistema
     * 
     * @param Array $data
     * 
     * @author Moka
     */
    public function acesso( $data ){
        return $this->acesso->create( $data );
    }

    /**
     * Realiza um Log de Registro do Sistema
     * 
     * @param Array $data
     * 
     * @author Moka
     */
    public function registro( $data ){
        return $this->registro->create( $data );
    }

}