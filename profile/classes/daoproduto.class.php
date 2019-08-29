<?php

date_default_timezone_set('America/Campo_Grande');
include_once 'autoload.php';
protegeArquivo(basename(__FILE__));

/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 20/06/2016
 * Time: 20:02
 */
class DaoProduto
{

    private static $instance;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new DaoProduto();
        }

        return self::$instance;
    }

    public function inserir(Produto $produto)
    {
        try {
            $sql = "INSERT INTO produto() VALUES (null, ?, ?, ?, ?)";
            $conexao = Conexao::getInstance()->prepare($sql);
            $conexao->bindValue(1, $produto->getId(), PDO::PARAM_INT);
            $conexao->bindValue(2, $produto->getDataVencimento(), PDO::PARAM_STR);
            $conexao->bindValue(3, $produto->getQuantidade(), PDO::PARAM_INT);
            $conexao->bindValue(4, $produto->getPeso(), PDO::PARAM_STR);
            $conexao->execute();
            if ($conexao->rowCount() == 1) {
                echo '<div class="alert alert-success"> Inserido com sucesso </div>';
            } else {
                echo '<div class="alert alert-warning"> Erro ao inserir </div>';
            }
        } catch (PDOException $erro) {
            echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar inserir no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
        }
    }

    public function inserirNome($nome)
    {
        try {
            $sql = "INSERT INTO nome_produto() VALUES (null, ?)";
            $conexao = Conexao::getInstance()->prepare($sql);
            $conexao->bindValue(1, $nome, PDO::PARAM_STR);
            $conexao->execute();
            if ($conexao->rowCount() == 1) {
                echo '<div class="alert alert-success"> Inserido com sucesso </div>';
            } else {
                echo '<div class="alert alert-warning"> Erro ao inserir </div>';
            }
        } catch (PDOException $erro) {
            echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar inserir no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
        }
    }

    public function deletar($id, $quantidade)
    {
        $sqlSearch = "SELECT * FROM produto WHERE id_produto = '$id'";
        $conexao = Conexao::getInstance()->query($sqlSearch);
        $quantidadeRow = $conexao->fetch(PDO::FETCH_OBJ);
        if ($quantidadeRow->quantidade > $quantidade) {
            try {
                $sql = "UPDATE produto set quantidade = ? WHERE id_produto = ?";
                $conexao = Conexao::getInstance()->prepare($sql);
                $conexao->bindValue(1, $quantidadeRow->quantidade - $quantidade, PDO::PARAM_INT);
                $conexao->bindValue(2, $id, PDO::PARAM_INT);
                $conexao->execute();
                echo '<div class="alert alert-success"> Removido com sucesso </div>';
                echo '<meta http-equiv="refresh" content="0;URL=' . PATH . '/produtos/listar">';
            } catch (PDOException $erro) {
                echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar atualizar no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
            }
        } elseif ($quantidadeRow->quantidade == $quantidade) {
            try {
                $sql = "DELETE FROM produto WHERE id_produto = ?";
                $conexao = Conexao::getInstance()->prepare($sql);
                $conexao->bindValue(1, $id, PDO::PARAM_INT);
                $conexao->execute();
                if ($conexao->rowCount() == 1) {
                    echo '<div class="alert alert-success"> Deletado com sucesso </div>';
                    echo '<meta http-equiv="refresh" content="0;URL=' . PATH . '/produtos/listar">';
                } else {
                    echo '<div class="alert alert-warning"> Erro ao deletar </div>';
                }
            } catch (PDOException $erro) {
                echo '<div class="alert alert-danger"> Erro, deve-se primeiro apagar o paciente em todas as áreas e suas respectivas consultas. </div>';
            }
        } else {
            echo '<div class="alert alert-danger"> Erro, Impossivel remover essa quantidade. </div>';
        }

    }

    public function deletarRelatorio($id, $quantidade)
    {
        $sqlSearch = "SELECT * FROM produto WHERE id_produto = '$id'";
        $conexao = Conexao::getInstance()->query($sqlSearch);
        $quantidadeRow = $conexao->fetch(PDO::FETCH_OBJ);
        if ($quantidadeRow->quantidade > $quantidade) {
            try {
                $sql = "UPDATE produto set quantidade = ? WHERE id_produto = ?";
                $conexao = Conexao::getInstance()->prepare($sql);
                $conexao->bindValue(1, $quantidadeRow->quantidade - $quantidade, PDO::PARAM_INT);
                $conexao->bindValue(2, $id, PDO::PARAM_INT);
                $conexao->execute();
            } catch (PDOException $erro) {
                echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar atualizar no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
            }
        } elseif ($quantidadeRow->quantidade == $quantidade) {
            try {
                $sql = "DELETE FROM produto WHERE id_produto = ?";
                $conexao = Conexao::getInstance()->prepare($sql);
                $conexao->bindValue(1, $id, PDO::PARAM_INT);
                $conexao->execute();
            } catch (PDOException $erro) {
                echo '<div class="alert alert-danger"> Erro, deve-se primeiro apagar o paciente em todas as áreas e suas respectivas consultas. </div>';
            }
        } else {
            echo '<div class="alert alert-danger"> Erro, Impossivel remover essa quantidade. </div>';
        }

    }

    public function deletarNome($id)
    {
        try {
            $sql = "DELETE FROM nome_produto WHERE id_nome_produto = ?";
            $conexao = Conexao::getInstance()->prepare($sql);
            $conexao->bindValue(1, $id, PDO::PARAM_INT);
            $conexao->execute();
            if ($conexao->rowCount() == 1) {
                echo '<div class="alert alert-success"> Deletado com sucesso </div>';
                echo '<meta http-equiv="refresh" content="0;URL=' . PATH . '/gerenciar/listarNome">';
            } else {
                echo '<div class="alert alert-warning"> Erro ao deletar </div>';
            }
        } catch (PDOException $erro) {
            echo '<div class="alert alert-danger"> Erro, deve-se primeiro apagar o produto em Gerenciar Cestas Básicas no modelo equivalente. </div>';
        }
    }

    public function editar($id, $validade, $quantidade)
    {
        try {
            $sql = "UPDATE produto set quantidade = ?, dataVencimento = ? WHERE id_produto = ?";
            $conexao = Conexao::getInstance()->prepare($sql);
            $conexao->bindValue(1, $quantidade, PDO::PARAM_INT);
            $conexao->bindValue(2, $validade, PDO::PARAM_STR);
            $conexao->bindValue(3, $id, PDO::PARAM_INT);
            $conexao->execute();
            echo '<div class="alert alert-success"> Removido com sucesso </div>';
            echo '<meta http-equiv="refresh" content="0;URL=' . PATH . '/produtos/listar">';
        } catch (PDOException $erro) {
            echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar atualizar no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
        }
    }

    public function listarPorId($id)
    {
        $sql = "SELECT * FROM nome_produto WHERE id_nome_produto = '$id'";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetch(PDO::FETCH_OBJ);
    }

    public function listarPorNomeProduto($id)
    {
        $sql = "SELECT * FROM produto WHERE id_nome_produto = '$id'";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetch(PDO::FETCH_OBJ);
    }

    public function listarTodosPorNomeProduto($id)
    {
        $sql = "SELECT * FROM produto WHERE id_nome_produto = '$id'";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function listarPorIdProduto($id)
    {
        $sql = "SELECT * FROM produto WHERE id_produto = '$id'";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetch(PDO::FETCH_OBJ);
    }

    public function listarTodos()
    {
        $sql = "SELECT * FROM produto ORDER BY str_to_date(dataVencimento, '%d/%m/%Y') DESC";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function listarTodosNomes()
    {
        $sql = "SELECT * FROM nome_produto ORDER BY nome ASC";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    /*
        public function gerarCesta($produtos, $quantidade){
            $arrayQuantidade = Array();
            foreach ($produtos as $produto){
                $sql = "SELECT SUM(quantidade) FROM produto WHERE id_nome_produto = '$produto'";
                $conexao = Conexao::getInstance()->query($sql)->fetch();
                if (empty($conexao[0])){
                    $sqlNome =  "SELECT nome FROM nome_produto WHERE id_nome_produto = '$produto'";
                    $resultado = Conexao::getInstance()->query($sqlNome)->fetch(PDO::FETCH_OBJ);
                    echo '<div class="alert alert-warning"> Produto '. $resultado->nome .' não está no estoque </div>';
                    return 0;
                }else{
                    array_push($arrayQuantidade, $conexao[0]);
                }
            }
             min($arrayQuantidade);
        }*/

    public function listarCestas()
    {
        $sql = "SELECT * FROM cestas ORDER BY nome DESC";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function adicionarCesta($nome)
    {
        try {
            $sql = "INSERT INTO cestas() VALUES (null, ?)";
            $conexao = Conexao::getInstance()->prepare($sql);
            $conexao->bindValue(1, $nome, PDO::PARAM_STR);
            $conexao->execute();
            if ($conexao->rowCount() == 1) {
                echo '<div class="alert alert-success"> Inserido com sucesso </div>';
            } else {
                echo '<div class="alert alert-warning"> Erro ao inserir </div>';
            }
        } catch (PDOException $erro) {
            echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar inserir no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
        }
    }

    public function listarProdutosCesta($id)
    {
        $sql = "SELECT * FROM modelo_cesta WHERE id_cestas = '$id'";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function listarModelos(){
        $sql = "SELECT * FROM cestas";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function listarProdutoCesta($id)
    {
        $sql = "SELECT * FROM modelo_cesta WHERE id = '$id'";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetch(PDO::FETCH_OBJ);
    }

    public function adicionarModelo($produto, $cesta, $peso)
    {
        try {
            $sql = "INSERT INTO modelo_cesta VALUES (null, ?, ?, ?)";
            $conexao = Conexao::getInstance()->prepare($sql);
            $conexao->bindValue(1, $produto, PDO::PARAM_INT);
            $conexao->bindValue(2, $cesta, PDO::PARAM_INT);
            $conexao->bindValue(3, $peso, PDO::PARAM_STR);
            $conexao->execute();
            if ($conexao->rowCount() == 1) {
                echo '<div class="alert alert-success"> Inserido com sucesso </div>';
            } else {
                echo '<div class="alert alert-warning"> Erro ao inserir </div>';
            }
        } catch (PDOException $erro) {
            echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar inserir no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
        }
    }

    public function apagarItemModelo($id)
    {
        try {
            $sql = "DELETE FROM modelo_cesta WHERE id = ?";
            $conexao = Conexao::getInstance()->prepare($sql);
            $conexao->bindValue(1, $id, PDO::PARAM_INT);
            $conexao->execute();
            if ($conexao->rowCount() == 1) {
                echo '<div class="alert alert-success"> Deletado com sucesso </div>';
                echo '<meta http-equiv="refresh" content="0;URL=' . PATH . '/gerenciar/gerenciarCestas">';
            } else {
                echo '<div class="alert alert-warning"> Erro ao deletar </div>';
            }
        } catch (PDOException $erro) {
            echo '<div class="alert alert-danger"> Erro, deve-se primeiro apagar o paciente em todas as áreas e suas respectivas consultas. </div>';
        }
    }

    public function listarModeloId($id)
    {
        $sql = "SELECT * FROM cestas WHERE id = '$id'";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetch(PDO::FETCH_OBJ);
    }

    public function apagarModelo($id)
    {
        try {
            $sql = "DELETE FROM cestas WHERE id = ?";
            $conexao = Conexao::getInstance()->prepare($sql);
            $conexao->bindValue(1, $id, PDO::PARAM_INT);
            $conexao->execute();
            if ($conexao->rowCount() == 1) {
                echo '<div class="alert alert-success"> Deletado com sucesso </div>';
                echo '<meta http-equiv="refresh" content="0;URL=' . PATH . '/gerenciar/gerenciarCestas">';
            } else {
                echo '<div class="alert alert-warning"> Erro ao deletar </div>';
            }
        } catch (PDOException $erro) {
            echo '<div class="alert alert-danger"> Erro, deve-se primeiro apagar todos os itens do Modelo. </div>';
        }
    }

    public function verificarQuantidadeBKP($id)
    {
        $sql = "SELECT * FROM modelo_cesta WHERE id_cestas = '$id' ORDER BY id_nome ASC";
        $conexao = Conexao::getInstance()->query($sql);
        $conteudos = $conexao->fetchAll(PDO::FETCH_OBJ);
        $produtos = Array();
        foreach ($conteudos as $conteudo) {
            $sqlProduto = "SELECT id_nome_produto, (SUM(quantidade * peso)) as Resultado FROM produto WHERE id_nome_produto = '$conteudo->id_nome' ORDER BY id_nome_produto ASC";
            $conexaoProduto = Conexao::getInstance()->query($sqlProduto);
            array_push($produtos, $conexaoProduto->fetchAll(PDO::FETCH_OBJ));
            //NAO ESTA PASSANDO O PRODUTO QUE ESTA NO MODELO MAS NAO ESTA NO PRODUTO
        }
        $min = 0;
        for ($i = 0; $i < count($produtos); $i++) {
            if (!isset($produtos[$i][0]->Resultado)) {
                print_r($produtos[$i][0]);
                $idProduto = $produtos[$i][0]->id_nome_produto;
                echo $idProduto;
                $sqlPadrao = "SELECT * FROM nome_produto WHERE id_nome_produto = '$idProduto'";
                $conexaoPadrao = Conexao::getInstance()->query($sqlPadrao);
                $resultado = $conexaoPadrao->fetch(PDO::FETCH_OBJ);
                echo '<div class="alert alert-warning"> Está Faltando Produto ' . $resultado->nome . ' </div>';

            } else {
                if ($i == 0) {
                    $min = $produtos[$i][0]->Resultado / $conteudos[$i]->peso;
                } else {
                    if ($min > ($produtos[$i][0]->Resultado / $conteudos[$i]->peso)) {
                        $min = $produtos[$i][0]->Resultado / $conteudos[$i]->peso;
                    }
                }
            }
        }
        return (int)$min;
    }

    public function retornaConteudoModelo($id)
    {
        $modelo = "SELECT * FROM modelo_cesta WHERE id_cestas = '$id'";
        $conexaoModelo = Conexao::getInstance()->query($modelo);
        return $conexaoModelo->fetchAll(PDO::FETCH_OBJ);
    }

    public function verificarQuantidade($id)
    {
        $timeZone = new DateTimeZone('UTC');
        $conteudoModelo = $this->retornaConteudoModelo($id);
        $quantidade = array();

        //PARA CADA ITEM DO MODELO FACA
        for ($i = 0; $i < count($conteudoModelo); $i++) {
            //SELECIONA OS PRODUTOS DO ITEM DE MODELO DA ITERACAO
            $conteudoItens = $this->retornaProdutos($conteudoModelo[$i]->id_nome);
            $repete = 0;
            //VARRE OS ITENS DO MODELO DA ITERACAO
            $quantidade[$i] = 0;
            foreach ($conteudoItens as $conteudo) {
                $hoje = DateTime::createFromFormat('d/m/Y', date('d/m/Y'), $timeZone);
                $produtoVencimento = DateTime::createFromFormat('d/m/Y', $conteudo->dataVencimento, $timeZone);
                //VERIFICACAO DE DATA
                if ($produtoVencimento >= $hoje) {
                    for ($j = 0; $j < $conteudo->quantidade; $j++) {
                        if ($conteudo->peso == $conteudoModelo[$i]->peso) {
                            $quantidade[$i]++;
                        } elseif ($conteudo->peso < $conteudoModelo[$i]->peso) {
                            $repete += $conteudo->peso;
                        }
                        if ($repete == $conteudoModelo[$i]->peso) {
                            $quantidade[$i]++;
                            $repete = 0;
                        }
                    }
                }
            }
        }
        if (empty($quantidade)) {
            return 0;
        } else {
            return min($quantidade);
        }
    }

    public function gerarCesta($qtd, $id)
    {
        //SELECIONA O MODELO ESCOLHIDO
        $modelo = "SELECT * FROM modelo_cesta WHERE id_cestas = '$id'";
        $conexaoModelo = Conexao::getInstance()->query($modelo);
        $conteudoModelo = $conexaoModelo->fetchAll(PDO::FETCH_OBJ);
        $objeto = array();
        $objetos = array();
        $carrinho = array();
        for ($i = 0; $i < $qtd; $i++) {
            for ($mod = 0; $mod < count($conteudoModelo); $mod++) {
                $itens = $this->retornaUmProduto($carrinho, $conteudoModelo[$mod]->peso, $conteudoModelo[$mod]->id_nome);
                foreach ($itens as $item) {
                    array_push($objeto, $item);
                    array_push($carrinho, $item);
                }
            }
            array_push($objetos, $objeto);
            $objeto = array();
        }
        // echo "</br></br>";
        //print_r($objetos);
        // echo "</br></br>";
        return $objetos;
    }

    public function atualizaCarrinho()
    {

    }

    public function getNome($id)
    {
        $sql = "SELECT * FROM nome_produto WHERE '$id' = id_nome_produto";
        $executa = Conexao::getInstance()->query($sql);
        return $executa->fetch(PDO::FETCH_OBJ);
    }

    public function retornaProdutos($id_nome)
    {
        $itens = "SELECT * FROM produto WHERE id_nome_produto = '$id_nome'";
        $conexaoItens = Conexao::getInstance()->query($itens);
        return $conexaoItens->fetchAll(PDO::FETCH_OBJ);
    }

    public function retornaUmProduto($carrinho, $peso, $nomeProduto)
    {
        $produtos = $this->retornaProdutos($nomeProduto);
        $itens = array();
        $aloca = array();
        foreach ($produtos as $produto) {
            $timeZone = new DateTimeZone('UTC');
            $hoje = DateTime::createFromFormat('d/m/Y', date('d/m/Y'), $timeZone);
            $produtoVencimento = DateTime::createFromFormat('d/m/Y', $produto->dataVencimento, $timeZone);
            //VERIFICACAO DE DATA
            if ($produtoVencimento >= $hoje and $this->verificaCarrinho($carrinho, $produto)) {
                //ECHO "ENTROU </br>";
                if ($produto->quantidade > 1) {
                    for ($i = 0; $i < $produto->quantidade; $i++) {
                        if ($produto->peso == $peso) {
                            $produto->quantidade = 1;
                            array_push($itens, $produto);
                            return $itens;
                        } elseif ($produto->peso < $peso) {
                            array_push($aloca, $produto);
                        }
                        if ($this->somaArray($aloca) == $peso) {
                            foreach ($aloca as $pass) {
                                $pass->quantidade = 1;
                                array_push($itens, $pass);
                            }
                            return $itens;
                        }
                    }
                } else if ($produto->quantidade == 1) {
                    if ($produto->peso == $peso) {
                        $produto->quantidade = 1;
                        array_push($itens, $produto);
                        return $itens;
                    } elseif ($produto->peso < $peso) {
                        array_push($aloca, $produto);
                    }
                    if ($this->somaArray($aloca) == $peso) {
                        foreach ($aloca as $pass) {
                            $pass->quantidade = 1;
                            array_push($itens, $pass);
                        }
                        return $itens;
                    }
                }
            }
        }
        return $itens;
    }

    public function somaArray($array)
    {
        $count = 0;
        foreach ($array as $ar) {
            $count += $ar->peso;
        }
        return $count;
    }

    public function verificaCarrinho($itens, $produto)
    {
        foreach ($itens as $item) {
            if ($item->id_produto == $produto) {
                if (array_sum($item->quantidade) > $produto->quantidade) {
                    return false;
                }
            }
        }
        return true;
    }

}

?>