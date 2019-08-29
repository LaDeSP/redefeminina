<?php

    include_once 'autoload.php';
    protegeArquivo(basename(__FILE__));

    class Projeto {

        private $id;
        private $idVoluntaria;
        private $titulo;
        private $descricao;

        public function __construct($titulo, $descricao)
        {
            $this->titulo = $titulo;
            $this->descricao = $descricao;
        }

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function setIdVoluntaria($idVoluntaria)
        {
            $this->idVoluntaria = $idVoluntaria;
        }

        public function getIdVoluntaria()
        {
            return $this->idVoluntaria;
        }

        public function getTitulo()
        {
            return $this->titulo;
        }

        public function getDescricao()
        {
            return $this->descricao;
        }

    }