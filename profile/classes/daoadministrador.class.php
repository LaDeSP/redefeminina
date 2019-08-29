<?php
    include_once 'autoload.php';
    protegeArquivo(basename(__FILE__));

    class DaoAdministrador {

        private static $instance;

        private function __construct() { }

        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new DaoAdministrador();
            }

            return self::$instance;
        }

        public function categoriaSite(int $id, string $categoria, string $conteudo) {

            try{
                $sql = "UPDATE categoria_site set categoria = ?, conteudo = ? WHERE id = ?";
                $conexao = Conexao::getInstance()->prepare($sql);
                $conexao->bindValue(1, $categoria, PDO::PARAM_STR);
                $conexao->bindValue(2, $conteudo, PDO::PARAM_STR);
                $conexao->bindValue(3, $id, PDO::PARAM_INT);
                $conexao->execute();
                echo '<div class="alert alert-success"> Atualizado com sucesso </div>';
                echo '<meta http-equiv="refresh" content="1;URL='. PATH . '/administrador">';
            }catch (PDOException $erro) {
                echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar atualizar no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
            }

        }

        public function listarPorID (int $id) {
            $sql = "SELECT * FROM categoria_site WHERE id = $id";
            $conexao = Conexao::getInstance()->query($sql);
            return $conexao->fetch(PDO::FETCH_OBJ);
        }

        public function depoimento(int $id, string $nome, string $conteudo) {
            try{
                $sql = "UPDATE depoimentos_site set nome = ?, conteudo = ? WHERE id = ?";
                $conexao = Conexao::getInstance()->prepare($sql);
                $conexao->bindValue(1, $nome, PDO::PARAM_STR);
                $conexao->bindValue(2, $conteudo, PDO::PARAM_STR);
                $conexao->bindValue(3, $id, PDO::PARAM_INT);
                $conexao->execute();
                echo '<div class="alert alert-success"> Atualizado com sucesso </div>';
                echo '<meta http-equiv="refresh" content="1;URL='. PATH . '/administrador">';
            }catch (PDOException $erro) {
                echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar atualizar no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
            }
        }

        public function depoimentoImage(int $id, string $imagem) {
            try{
                $sql = "UPDATE depoimentos_site set imagem = ? WHERE id = ?";
                $conexao = Conexao::getInstance()->prepare($sql);
                $conexao->bindValue(1, $imagem, PDO::PARAM_STR);
                $conexao->bindValue(2, $id, PDO::PARAM_INT);
                $conexao->execute();
                echo '<div class="alert alert-success"> Atualizado com sucesso </div>';
                echo '<meta http-equiv="refresh" content="1;URL='. PATH . '/administrador">';
            }catch (PDOException $erro) {
                echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar atualizar no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
            }
        }

        public function listarDepoimentos () {
            $sql = "SELECT * FROM depoimentos_site";
            $conexao = Conexao::getInstance()->query($sql);
            return $conexao->fetchAll(PDO::FETCH_OBJ);
        }

        public function listarDepoimentoPorID (int $id) {
            $sql = "SELECT * FROM depoimentos_site WHERE id = $id";
            $conexao = Conexao::getInstance()->query($sql);
            return $conexao->fetch(PDO::FETCH_OBJ);
        }

        public function addEvento (string $nome, string $data, string $informacao, string $hora, string $endereco) {
            try{
                $sql = "INSERT INTO eventos_site() values (null, ?, ?, ?, ?, ?)";
                $conexao = Conexao::getInstance()->prepare($sql);
                $conexao->bindValue(1, $nome, PDO::PARAM_STR);
                $conexao->bindValue(2, $data, PDO::PARAM_STR);
                $conexao->bindValue(3, $informacao, PDO::PARAM_STR);
                $conexao->bindValue(4, $hora, PDO::PARAM_STR);
                $conexao->bindValue(5, $endereco, PDO::PARAM_STR);
                $conexao->execute();
                if ($conexao->rowCount() == 1) {
                    echo '<div class="alert alert-success"> Inserido com sucesso </div>';
                    echo '<meta http-equiv="refresh" content="1;URL='. PATH . '/administrador">';
                } else {
                    echo '<div class="alert alert-warning"> Erro ao inserir </div>';
                }
            }catch (PDOException $erro) {
                echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar inserir no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
            }
        }

        public function listarEventos () {
            $sql = "SELECT * FROM eventos_site";
            $conexao = Conexao::getInstance()->query($sql);
            return $conexao->fetchAll(PDO::FETCH_OBJ);
        }

        public function listarEventoPorID (int $id) {
            $sql = "SELECT * FROM eventos_site WHERE id_evento = $id";
            $conexao = Conexao::getInstance()->query($sql);
            return $conexao->fetch(PDO::FETCH_OBJ);
        }

        public function alterarEvento (int $id, string $nome, string $data, string $informacao, string $hora, string $endereco) {
            try{
                $sql = "UPDATE eventos_site set nome_evento = ?, data_evento = ?, informacao_evento = ?, hora_evento = ?, endereco_evento = ?
                        WHERE id_evento = ?";
                $conexao = Conexao::getInstance()->prepare($sql);
                $conexao->bindValue(1, $nome, PDO::PARAM_STR);
                $conexao->bindValue(2, $data, PDO::PARAM_STR);
                $conexao->bindValue(3, $informacao, PDO::PARAM_STR);
                $conexao->bindValue(4, $hora, PDO::PARAM_STR);
                $conexao->bindValue(5, $endereco, PDO::PARAM_STR);
                $conexao->bindValue(6, $id, PDO::PARAM_INT);
                $conexao->execute();
                echo '<div class="alert alert-success"> Atualizado com sucesso </div>';
                echo '<meta http-equiv="refresh" content="1;URL='. PATH . '/administrador">';
            }catch (PDOException $erro) {
                echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar inserir no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
            }
        }

        public function deletarEvento (int $id) {
            try{
                $sql = "DELETE FROM eventos_site WHERE id_evento = ?";
                $conexao = Conexao::getInstance()->prepare($sql);
                $conexao->bindValue(1, $id, PDO::PARAM_INT);
                $conexao->execute();
                if ($conexao->rowCount() == 1) {
                    echo '<div class="alert alert-success"> Deletado com sucesso </div>';
                    echo '<meta http-equiv="refresh" content="1;URL='. PATH . '/administrador">';
                } else {
                    echo '<div class="alert alert-warning"> Erro ao deletar </div>';
                }
            }catch (PDOException $erro) {
                echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar deletar no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
            }
        }

        public function criarAlbum(string $nome, string $tag, string $imagem) {
            try{
                $sql = "INSERT INTO album_site() values (null, ?, ?, ?)";
                $conexao = Conexao::getInstance()->prepare($sql);
                $conexao->bindValue(1, $nome, PDO::PARAM_STR);
                $conexao->bindValue(2, $tag, PDO::PARAM_STR);
                $conexao->bindValue(3, $imagem, PDO::PARAM_STR);
                $conexao->execute();
            }catch (PDOException $erro) {
                echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar inserir no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
            }
        }

        public function deletarAlbum (int $id) {
            try{
                $sql = "DELETE FROM album_site WHERE id_album = ?";
                $conexao = Conexao::getInstance()->prepare($sql);
                $conexao->bindValue(1, $id, PDO::PARAM_INT);
                $conexao->execute();
                if ($conexao->rowCount() == 1) {
                    echo '<div class="alert alert-success"> Deletado com sucesso </div>';
                    echo '<meta http-equiv="refresh" content="1;URL='. PATH . '/administrador">';
                } else {
                    echo '<div class="alert alert-warning"> Erro ao deletar </div>';
                }
            }catch (PDOException $erro) {
                echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar deletar no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
            }
        }

        public function alterarAlbum (int $id, string $nome, string $tag) {
            try{
                $sql = "UPDATE album_site set nome_album = ?, tag_album = ? WHERE id_album = ?";
                $conexao = Conexao::getInstance()->prepare($sql);
                $conexao->bindValue(1, $nome, PDO::PARAM_STR);
                $conexao->bindValue(2, $tag, PDO::PARAM_STR);
                $conexao->bindValue(3, $id, PDO::PARAM_INT);
                $conexao->execute();
                echo '<div class="alert alert-success"> Atualizado com sucesso </div>';
                echo '<meta http-equiv="refresh" content="1;URL='. PATH . '/administrador">';
            }catch (PDOException $erro) {
                echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar inserir no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
            }
        }

        public function listarAlbumoPorID (int $id) {
            $sql = "SELECT * FROM album_site WHERE id_album = $id";
            $conexao = Conexao::getInstance()->query($sql);
            return $conexao->fetch(PDO::FETCH_OBJ);
        }

        public function listarAlbum () {
            $sql = "SELECT * FROM album_site ORDER BY id_album DESC";
            $conexao = Conexao::getInstance()->query($sql);
            return $conexao->fetchAll(PDO::FETCH_OBJ);
        }

    }