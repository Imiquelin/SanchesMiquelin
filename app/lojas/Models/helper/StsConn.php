<?php

namespace Sts\Models\helper;

use PDO;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

/**
 * Description of StsConn
 *
 * @copyright (c) year, Igor Miquelin - IM
 */
class StsConn {

    public static $Host = HOST;
    public static $User = USER;
    public static $Pass = PASS;
    public static $Dbname = DBNAME;
    private static $Connnect = null;

    private function conectar() {
        try {
            if (self::$Connnect == null) {
                self::$Connnect = new PDO('mysql:host=' . self::$Host . ';dbname=' . self::$Dbname, self::$User, self::$Pass);
            }
        } catch (Exception $exc) {
            echo 'Mensagem: ' . $exc->getMessage();
            die;
        }
        return self::$Connnect;
    }

    public function getConn() {
        return self::conectar();
    }

}
