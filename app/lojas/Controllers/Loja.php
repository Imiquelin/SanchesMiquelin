<?php

namespace App\lojas\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

/**
 * Description of Blog
 *
 * @copyright (c) year, Igor Miquelin - IM
 */
class Loja {

    private $Dados;
    private $PageId;

    public function index() {
        
        $this->PageId = filter_input(INPUT_GET, 'pg', FILTER_SANITIZE_NUMBER_INT);
        $this->PageId = $this->PageId ? $this->PageId : 1;
        //echo "<br><br><br> {$this->PageId}";
        $listar_art = new \Sts\Models\StsBlog();
        $this->Dados['artigos'] = $listar_art->listarArtigos($this->PageId);
        $this->Dados['paginacao'] = $listar_art->getResultadoPg();
        
        $listarArtRecente = new \Sts\Models\StsArtRecente();
        $this->Dados['artRecente']= $listarArtRecente->listarArtRecente();
        
        $listarArtDestaque = new \Sts\Models\StsArtDestaque();
        $this->Dados['artDestaque'] = $listarArtDestaque->listarArtDestaque();
        
        $visSobreAutor = new \Sts\Models\StsSobreAutor();
        $this->Dados['sobreAutor'] = $visSobreAutor->sobreAutor();
        
        $carregarView = new \Core\ConfigView('lojas/Views/loja/vitrine', $this->Dados);
        $carregarView->renderizar();
    }

}
