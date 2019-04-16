<?php

namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

/**
 * Description of StsArtHome
 *
 * @copyright (c) year, Igor Miquelin - IM
 */
class StsArtHome {

    private $Resultado;

    public function listarArtHome() {
        $listar = new \Sts\Models\helper\StsRead();
        $listar->fullRead('SELECT id, titulo, descricao, imagem, slug
                            FROM sts_artigos                
                            WHERE ADMS_SIT_ID =:adms_sit_id
                            ORDER BY id DESC
                            LIMIT :limit', 'adms_sit_id=1&limit=3');
        $this->Resultado = $listar->getResultado();
        return $this->Resultado;
    }

}
