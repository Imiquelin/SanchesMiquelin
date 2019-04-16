<?php


namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

/**
 * Description of StsSobreAutor
 *
 * @copyright (c) year, Igor Miquelin - IM
 */
class StsSobreAutor {
    private $Resultado;
    
    public function sobreAutor() {
        $visSobreAutor = new \Sts\Models\helper\StsRead();
        $visSobreAutor->fullRead('SELECT id, titulo, descricao, imagem FROM sts_sobres
                WHERE adms_sit_id = :adms_sit_id
                AND id = :id
                LIMIT :limit', "adms_sit_id=1&id=1&limit=1");
        $this->Resultado = $visSobreAutor->getResultado();
        return $this->Resultado;
    }
}
