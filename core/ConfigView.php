<?php

namespace Core;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

/**
 * Description of ConfigView
 *
 * @copyright (c) year, Igor Miquelin - IM
 */
class ConfigView {

    private $Nome;
    private $Dados;

    public function __construct($Nome, array $Dados = null) {
        $this->Nome = (string) $Nome;
        $this->Dados = $Dados;
    }

    public function renderizar() {
        if (file_exists('app/' . $this->Nome . '.php')) {
            include 'app/sts/Views/include/cabecalho.php';
            include 'app/sts/Views/include/menu.php';
            include 'app/' . $this->Nome . '.php';
            include 'app/sts/Views/include/rodape.php';
        } else {
            echo "Erro ao Carregar a Página: {$this->Nome}";
        }
    }

}
