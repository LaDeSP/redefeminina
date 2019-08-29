<?php

    include_once 'autoload.php';
    protegeArquivo(basename(__FILE__));

    class DaoVoluntaria {

       private static $instance;

       private function __construct() { }

       public static function getInstance() {
           if (!isset(self::$instance)) {
               self::$instance = new DaoVoluntaria();
           }

           return self::$instance;
       }

       public function inserir (Voluntaria $voluntaria) {
           try{
               $sql = "INSERT INTO voluntaria() VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
               $conexao = Conexao::getInstance()->prepare($sql);
               $conexao->bindValue(1, $voluntaria->getNome(), PDO::PARAM_STR);
               $conexao->bindValue(2, $voluntaria->getDataNascimento(), PDO::PARAM_STR);
               $conexao->bindValue(3, $voluntaria->getSexo(), PDO::PARAM_STR);
               $conexao->bindValue(4, $voluntaria->getTelefone(), PDO::PARAM_STR);
               $conexao->bindValue(5, $voluntaria->getCelular(), PDO::PARAM_STR);
               $conexao->bindValue(6, $voluntaria->getRua(), PDO::PARAM_STR);
               $conexao->bindValue(7, $voluntaria->getNumero(), PDO::PARAM_STR);
               $conexao->bindValue(8, $voluntaria->getRg(), PDO::PARAM_STR);
               $conexao->bindValue(9, $voluntaria->getCpf(), PDO::PARAM_STR);
               $conexao->bindValue(10, $voluntaria->getProfissao(), PDO::PARAM_STR);
               $conexao->bindValue(11, $voluntaria->getDiaSemanaDisponivel(), PDO::PARAM_STR);
               $conexao->bindValue(12, $voluntaria->getHoraSemanaDisponivel(), PDO::PARAM_STR);
               $conexao->bindValue(13, $voluntaria->getHabilidades(), PDO::PARAM_STR);
               $conexao->bindValue(14, $voluntaria->getUserName(), PDO::PARAM_STR);
               $conexao->bindValue(15, $voluntaria->getPassword(), PDO::PARAM_STR);
               $conexao->bindValue(16, $voluntaria->getNivelAcesso(), PDO::PARAM_STR);
               $conexao->bindValue(17, $voluntaria->getStatus(), PDO::PARAM_STR);
               $conexao->execute();
               if ($conexao->rowCount() == 1) {
                   echo '<div class="alert alert-success"> Inserido com sucesso </div>';
               } else {
                   echo '<div class="alert alert-warning"> Erro ao inserir </div>';
               }
           }catch (PDOException $erro) {
               echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar inserir no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
           }
       }

       public function editar (Voluntaria $voluntaria) {
           try{
               $sql = "UPDATE voluntaria SET nome_voluntaria = ?, data_nascimento = ?, sexo = ?, telefone = ?, celular = ?, rua = ?, numero = ?, rg = ?,
                                    cpf = ?, profissao = ?, dia_semana_disponivel = ?, horario_disponivel = ?, habilidades = ?, usuario = ?,
                                    nivel_acesso = ?, status = ? WHERE id_voluntaria = ?";
               $conexao = Conexao::getInstance()->prepare($sql);
               $conexao->bindValue(1, $voluntaria->getNome(), PDO::PARAM_STR);
               $conexao->bindValue(2, $voluntaria->getDataNascimento(), PDO::PARAM_STR);
               $conexao->bindValue(3, $voluntaria->getSexo(), PDO::PARAM_STR);
               $conexao->bindValue(4, $voluntaria->getTelefone(), PDO::PARAM_STR);
               $conexao->bindValue(5, $voluntaria->getCelular(), PDO::PARAM_STR);
               $conexao->bindValue(6, $voluntaria->getRua(), PDO::PARAM_STR);
               $conexao->bindValue(7, $voluntaria->getNumero(), PDO::PARAM_STR);
               $conexao->bindValue(8, $voluntaria->getRg(), PDO::PARAM_STR);
               $conexao->bindValue(9, $voluntaria->getCpf(), PDO::PARAM_STR);
               $conexao->bindValue(10, $voluntaria->getProfissao(), PDO::PARAM_STR);
               $conexao->bindValue(11, $voluntaria->getDiaSemanaDisponivel(), PDO::PARAM_STR);
               $conexao->bindValue(12, $voluntaria->getHoraSemanaDisponivel(), PDO::PARAM_STR);
               $conexao->bindValue(13, $voluntaria->getHabilidades(), PDO::PARAM_STR);
               $conexao->bindValue(14, $voluntaria->getUserName(), PDO::PARAM_STR);
               $conexao->bindValue(15, $voluntaria->getNivelAcesso(), PDO::PARAM_STR);
               $conexao->bindValue(16, $voluntaria->getStatus(), PDO::PARAM_STR);
               $conexao->bindValue(17, $voluntaria->getId(), PDO::PARAM_INT);
               $conexao->execute();
               echo '<div class="alert alert-success"> Atualizado com sucesso </div>';
               echo '<meta http-equiv="refresh" content="1;URL='. PATH . '/voluntaria/list">';
           }catch (PDOException $erro) {
               echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar atualizar no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
           }

       }

       public function editarSenha (int $id, string $senha) {
           try{
               $sql = "UPDATE voluntaria set senha = ? WHERE id_voluntaria = ?";
               $conexao = Conexao::getInstance()->prepare($sql);
               $conexao->bindValue(1, $senha, PDO::PARAM_STR);
               $conexao->bindValue(2, $id, PDO::PARAM_INT);
               $conexao->execute();
               echo '<div class="alert alert-success"> Atualizado com sucesso </div>';
               echo '<meta http-equiv="refresh" content="1;URL='. PATH . '/voluntaria/list">';
           }catch (PDOException $erro) {
               echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar atualizar no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
           }

       }

       public function deletar (int $id) {
           try{
               $sql = "DELETE FROM voluntaria WHERE id_voluntaria = ?";
               $conexao = Conexao::getInstance()->prepare($sql);
               $conexao->bindValue(1, $id, PDO::PARAM_INT);
               $conexao->execute();
               if ($conexao->rowCount() == 1) {
                   echo '<div class="alert alert-success"> Deletado com sucesso </div>';
                   echo '<meta http-equiv="refresh" content="1;URL='. PATH . '/voluntaria/list">';
               } else {
                   echo '<div class="alert alert-warning"> Erro ao deletar </div>';
               }
           }catch (PDOException $erro) {
               echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar deletar no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
           }

       }

        public function listarTodos () {
            $sql = "SELECT * FROM voluntaria";
            $conexao = Conexao::getInstance()->query($sql);
            return $conexao->fetchAll(PDO::FETCH_OBJ);
        }

       public function listarPorID (int $id) {
           $sql = "SELECT * FROM voluntaria WHERE id_voluntaria = $id";
           $conexao = Conexao::getInstance()->query($sql);
           return $conexao->fetch(PDO::FETCH_OBJ);
       }

       public function validarLogin(string $user, string $pass) {
           try {
               $sql = "SELECT id_voluntaria, nome_voluntaria, usuario, senha FROM voluntaria WHERE usuario COLLATE utf8_bin = ? AND status = 'Ativo' AND nivel_acesso != 'Sem acesso'";
               $conexao = Conexao::getInstance()->prepare($sql);
               $conexao->bindValue(1, $user, PDO::PARAM_STR);
               $conexao->execute();
               $row = $conexao->fetch(PDO::FETCH_OBJ);
               if ($conexao->rowCount() == 1) {
                   if (password_verify($pass, $row->senha)) {
                       session_start();
                       $_SESSION['id_user'] = $row->id_voluntaria;
                       $_SESSION['user'] = $row->nome_voluntaria;
                       $_SESSION['username'] = $row->usuario;
                       $_SESSION['ip_user'] = $_SERVER['REMOTE_ADDR'];
                       $_SESSION['time_sessao'] = time();
                       header("Location: home");
                   } else {
                       echo '<div class="alert alert-danger"> Usuário ou Senha Incorreta! </div>';
                   }
               } else {
                   echo '<div class="alert alert-danger"> Usuário ou Senha Incorreta! </div>';
               }
           } catch (PDOException $erro) {
               echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar validar no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
           }

       }

   }