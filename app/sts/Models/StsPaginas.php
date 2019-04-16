<?php

namespace Sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

/**
 * Description of StsPaginas
 *
 * @copyright (c) year, Igor Miquelin - IM
 */
class StsPaginas {

    private $Resultado;
    private $UrlController;

    public function listarPaginas($UrlController = null) {
        $this->UrlController = $UrlController;
        $listar = new \Sts\Models\helper\StsRead();
        $listar->fullRead('SELECT pg.id,
                            tpg.tipo tipo_tpg
                            FROM sts_paginas pg
                            INNER JOIN sts_tps_pgs tpg ON tpg.id = pg.sts_tps_pg_id
                            WHERE pg.sts_situacaos_pg_id = :sts_situacaos_pg_id
                            AND pg.controller = :controller
                            LIMIT :limit', "sts_situacaos_pg_id=1&controller={$this->UrlController}&limit=1");

        $this->Resultado = $listar->getResultado();
        return $this->Resultado;
    }

}
