<?php

namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

/**
 * Description of StsSobEmp
 *
 * @copyright (c) year, Igor Miquelin - IM
 */
class StsSobEmp {

    private $Resultado;

    public function listarSobEmp() {
        $listar = new \Sts\Models\helper\StsRead();
        $listar->fullRead('SELECT id, titulo, descricao, imagem FROM sts_sobs_emps
                WHERE adms_sit_id = :adms_sit_id ORDER BY ordem ASC', 'adms_sit_id=1');
        $this->Resultado = $listar->getResultado();
        return $this->Resultado;
    }

}
