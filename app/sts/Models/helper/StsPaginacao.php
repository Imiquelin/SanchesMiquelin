<?php

namespace Sts\Models\helper;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

/**
 * Description of StsPaginacao
 *
 * @copyright (c) year, Igor Miquelin - IM
 */
class StsPaginacao {

    private $Link;
    private $MaxLinks;
    private $Pagina;
    private $LimitResultado;
    private $Offset;
    private $Query;
    private $ParseString;
    private $ResultBd;
    private $Resultado;
    private $TotalPaginas;

    function getResultado() {
        return $this->Resultado;
    }

    function getOffset() {
        return $this->Offset;
    }

    function __construct($Link) {
        $this->Link = $Link;
        //echo "<br><br>{$this->Link}";
        $this->MaxLinks = 2;
    }

    public function condicao($Pagina, $LimitResultado) {
        $this->Pagina = (int) $Pagina ? $Pagina : 1;
        $this->LimitResultado = (int) $LimitResultado;
        $this->Offset = ($this->Pagina * $this->LimitResultado) - $this->LimitResultado;
    }

    public function paginacao($Query, $ParseString = null) {
        $this->Query = (string) $Query;
        $this->ParseString = (string) $ParseString;
        $contar = new \Sts\Models\helper\StsRead();
        $contar->fullRead($this->Query, $this->ParseString);
        $this->ResultBd = $contar->getResultado();
        //var_dump($this->ResultBd);
        if ($this->ResultBd[0]['COUNT(id)'] > $this->LimitResultado) {
            $this->instrucaoPaginacao();
        } else {
            $this->Resultado = null;
        }
    }

    private function instrucaoPaginacao() {
        $this->TotalPaginas = ceil($this->ResultBd[0]['COUNT(id)'] / $this->LimitResultado);
        if ($this->TotalPaginas >= $this->Pagina) {
        $this->layoutPaginacao();    
        }else {
            header("Location: {$this->Link}");    
        }
        
    }

    private function layoutPaginacao() {
        $this->Resultado = "<nav aria-label='paginacao'>";
        $this->Resultado .= "<ul class='pagination justify-content-center'>";
        $this->Resultado .= "<li class='page-item'>";
        $this->Resultado .= "<a class='page-link' href=\"{$this->Link}\" tabindex='-1'>Primeira</a>";
        $this->Resultado .= "</li>";
        for ($iPag = $this->Pagina - $this->MaxLinks; $iPag <= $this->Pagina - 1; $iPag ++) {
            if ($iPag >= 1) {
                $this->Resultado .= "<li class='page-item'><a class='page-link' href=\"{$this->Link}?pg={$iPag}\">$iPag</a></li>";
            }
        }
        $this->Resultado .= "<li class='page-item active'>";
        $this->Resultado .= "<a class='page-link' href='#'>{$this->Pagina}<span class='sr-only'>(current)</span></a>";
        $this->Resultado .= "</li>";
        for ($dPag = $this->Pagina + 1; $dPag <= $this->Pagina + $this->MaxLinks; $dPag ++) {
            if ($dPag <= $this->TotalPaginas) {
                $this->Resultado .= "<li class='page-item'><a class='page-link' href=\"{$this->Link}?pg={$dPag}\">$dPag</a></li>";
            }
        }
        $this->Resultado .= "<li class='page-item'>";
        $this->Resultado .= "<a class='page-link' href=\"{$this->Link}?pg={$this->TotalPaginas}\">Última</a>";
        $this->Resultado .= "</li>";
        $this->Resultado .= "</ul>";
        $this->Resultado .= "</nav>";
    }

}
