<?php

    include_once dirname(__DIR__) . "/config.php";
    include_once dirname(__DIR__) . '/functions.php';

    protegeArquivo(basename(__FILE__));

    function __autoload($class) {

         $class = trim($class);
         $class = strtolower($class);
        
         $file = dirname(__DIR__) . '/classes/'.$class.'.class.php';

         if (!file_exists($file)) {
             echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar importar a classe </div>';
         } else {
             require_once $file;
         }
    }
