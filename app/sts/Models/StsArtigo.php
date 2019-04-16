<?php

namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

/**
 * Description of StsArtigo
 *
 * @copyright (c) year, Igor Miquelin - IM
 */
class StsArtigo {

    private $Resultado;
    private $Artigo;

    public function visualizarArtigo($Artigo = null) {
        $this->Artigo = (string) $Artigo;
        $visualizarArt = new \Sts\Models\helper\StsRead();
        $visualizarArt->fullRead('SELECT id, titulo, conteudo, slug, imagem FROM sts_artigos
                WHERE adms_sit_id = :adms_sit_id
                AND slug = :slug
                ORDER BY id DESC
                LIMIT :limit', "adms_sit_id=1&slug={$this->Artigo}&limit=1");
        $this->Resultado = $visualizarArt->getResultado();
        return $this->Resultado;
    }

}
