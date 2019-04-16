<?php

session_start();
ob_start();

define('URL', 'http://localhost/SanchesMiquelin/');
define('URLADM', 'http://localhost/SanchesMiquelin/adm/');

define('CSS', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/');

define('CONTROLER', 'Home');
define('METODO', 'index');

//Credenciais de acesso ao BD
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'imiquelin');