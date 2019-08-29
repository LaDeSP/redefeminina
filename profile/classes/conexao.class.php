<?php
    include_once 'autoload.php';
    protegeArquivo(basename(__FILE__));

    class Conexao {

        private static $instance;

        private function __construct() {}

        private function __clone() { }

        public static function getInstance() {

            try {

                if (!isset(self::$instance)) {
                    self::$instance = new PDO('mysql:host='.HOSTNAME.';dbname='.DBNAME.';charset=utf8mb4', ''.DBUSER.'', ''.DBPASS.'');
                    self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }

                return self::$instance;

            } catch (PDOException $erro) {
                echo "<div class='alert alert-danger'> Erro ao realizar a conexão com o banco de dados! " . $erro->getMessage() . "</div>";
            }

        }

    }