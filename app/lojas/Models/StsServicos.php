<?php

namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

/**
 * Description of StsServicos
 *
 * @copyright (c) year, Igor Miquelin - IM
 */
class StsServicos {

    private $Resultado;

    public function listar() {
        $listar = new \Sts\Models\helper\StsRead();
        $listar->exeRead('sts_servicos', 'LIMIT :limit', 'limit=1');
        $this->Resultado = $listar->getResultado();
        return $this->Resultado;
    }

}
