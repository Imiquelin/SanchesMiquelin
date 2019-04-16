<?php

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

/**
 * Description of SobreEmpresa
 *
 * @copyright (c) year, Igor Miquelin - IM
 */
class SobreEmpresa {

    private $Dados;

    public function index() {

        $listarMenu = new \Sts\Models\StsMenu();
        $this->Dados['menu'] = $listarMenu->listarMenu();
        
        $listarSeo = new \Sts\Models\StsSeo();
        $this->Dados['seo'] = $listarSeo->listarSeo();

        $listarSobEmp = new \Sts\Models\StsSobEmp();
        $this->Dados['sts_sobs_emps'] = $listarSobEmp->listarSobEmp();

        $carregarView = new \Core\ConfigView('sts/Views/sobEmp/sobEmp', $this->Dados);
        $carregarView->renderizar();
    }

}
