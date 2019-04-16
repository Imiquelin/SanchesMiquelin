<?php

namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

/**
 * Description of StsBlog
 *
 * @copyright (c) year, Igor Miquelin - IM
 */
class StsBlog {

    private $Resultado;
    private $PageId;
    private $ResultadoPg;
    private $LimitResultado = 2;

    function getResultadoPg() {
        return $this->ResultadoPg;
    }

    public function listarArtigos($PageId = null) {

        $this->PageId = $PageId;
        $paginacao = new \Sts\Models\helper\StsPaginacao(URL . 'blog');
        $paginacao->condicao($this->PageId, $this->LimitResultado);
        $paginacao->paginacao('SELECT COUNT(id) FROM sts_artigos WHERE adms_sit_id = :adms_sit_id', 'adms_sit_id=1');
        $this->ResultadoPg = $paginacao->getResultado();

        $listar = new \Sts\Models\helper\StsRead();
        $listar->fullRead('SELECT id, titulo, descricao, imagem, slug
                FROM sts_artigos
                WHERE adms_sit_id = :adms_sit_id ORDER BY id DESC 
                LIMIT :limit OFFSET :offset', "adms_sit_id=1&limit={$this->LimitResultado}&offset={$paginacao->getOffset()}");
        $this->Resultado = $listar->getResultado();

        return $this->Resultado;
    }

}
