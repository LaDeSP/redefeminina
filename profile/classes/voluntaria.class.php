<?php

    include_once 'autoload.php';
    protegeArquivo(basename(__FILE__));

    class Voluntaria {

        private $id;
        private $nome;
        private $rua;
        private $numero;
        private $dataNascimento;
        private $telefone;
        private $celular;
        private $sexo;
        private $cpf;
        private $rg;
        private $profissao;
        private $habilidades;
        private $diaSemanaDisponivel;
        private $horaSemanaDisponivel;
        private $userName;
        private $password;
        private $status;
        private $nivelAcesso;

        public function __construct($nome, $rua, $numero, $dataNascimento, $telefone, $celular, $sexo, $cpf, $rg, $profissao, $habilidades, $diaSemanaDisponivel, $horaSemanaDisponivel, $userName, $password, $status, $nivelAcesso)
        {
            $this->nome = $nome;
            $this->rua = $rua;
            $this->numero = $numero;
            $this->dataNascimento = $dataNascimento;
            $this->telefone = $telefone;
            $this->celular = $celular;
            $this->sexo = $sexo;
            $this->cpf = $cpf;
            $this->rg = $rg;
            $this->profissao = $profissao;
            $this->habilidades = $habilidades;
            $this->diaSemanaDisponivel = $diaSemanaDisponivel;
            $this->horaSemanaDisponivel = $horaSemanaDisponivel;
            $this->userName = $userName;
            $this->password = $password;
            $this->status = $status;
            $this->nivelAcesso = $nivelAcesso;
        }

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function getNome()
        {
            return $this->nome;
        }

        public function getRua()
        {
            return $this->rua;
        }

        public function getNumero()
        {
            return $this->numero;
        }

        public function getTelefone()
        {
            return $this->telefone;
        }

        public function getCelular()
        {
            return $this->celular;
        }

        public function getSexo()
        {
            return $this->sexo;
        }

        public function getCpf()
        {
            return $this->cpf;
        }

        public function getRg()
        {
            return $this->rg;
        }

        public function getDiaSemanaDisponivel()
        {
            return $this->diaSemanaDisponivel;
        }

        public function getHoraSemanaDisponivel()
        {
            return $this->horaSemanaDisponivel;
        }

        public function getDataNascimento()
        {
            return $this->dataNascimento;
        }

        public function getHabilidades()
        {
            return $this->habilidades;
        }

        public function getProfissao()
        {
            return $this->profissao;
        }

        public function getUserName()
        {
            return $this->userName;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function getStatus()
        {
            return $this->status;
        }

        public function getNivelAcesso()
        {
            return $this->nivelAcesso;
        }

    }