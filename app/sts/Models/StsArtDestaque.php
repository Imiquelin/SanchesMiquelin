<?php


namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

/**
 * Description of StsArtDestaque
 *
 * @copyright (c) year, Igor Miquelin - IM
 */
class StsArtDestaque {
    private $Resultado;
    
    public function listarArtDestaque() {
        $listar = new \Sts\Models\helper\StsRead();
        $listar->fullRead('SELECT titulo, slug FROM sts_artigos
                            WHERE adms_sit_id = :adms_sit_id
                            ORDER BY qnt_acesso DESC
                            LIMIT :limit', "adms_sit_id=1&limit=7");
        $this->Resultado = $listar->getResultado();
        return $this->Resultado;
    }
    
}
