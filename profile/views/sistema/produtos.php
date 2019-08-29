<?php
date_default_timezone_set('America/Campo_Grande');
$timeZone = new DateTimeZone('UTC');
?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Produtos
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="glyphicon glyphicon-th"></i> <a href="<?php echo PATH ?>/"> Inicío </a>
                    </li>
                    <li class="active">
                        <i class="gglyphicon glyphicon-shopping-cart"></i> Produtos
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <a href="<?php echo PATH ?>/produtos/listar" class="btn btn-info"> Produtos </a>
                <a href="<?php echo PATH ?>/produtos/selecionarModelo/" class="btn btn-default"> Gerar Cestas
                    Básicas </a>
            </div>
        </div>

        <br>

        <?php
        switch ($action) {
        case 'removerCesta':
        if (isset($_POST['apagar'])) {
            $id = antiInject($_POST['id']);
            if (!isset($id)) {
                echo '<div class="alert alert-info"> Os campos marcados com * são obrigatórios </div>';
            } else {
                $conexao = DaoProduto::getInstance();
                $conexao->apagarItemModelo($id);
            }
        }
        ?>
        <div class="row">
            <div class="col-md-12">
                <h3> Remover Produto do Modelo da Cesta </h3>

                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <?php
                        $conexao = DaoProduto::getInstance();
                        $id = $conexao->listarProdutoCesta(antiInject($value));
                        $nome = $conexao->listarPorId(antiInject($id->id_nome));
                        ?>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <input type="hidden" class="form-control" id="id" name="id"
                                       value="<?php echo $id->id ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-9">
                                <label for="validade">Produto </label>
                                <input type="text" value="<?php echo $nome->nome; ?>" class="form-control"
                                       name="validade" disabled>
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="quantidade">Quantidade </label> <span class="campo_obrigatorio"> *</span>
                                <input type="text" value="<?php echo $nome->peso; ?>" class="form-control"
                                       name="validade" disabled>
                            </div>
                        </div>
                    </div>
            </div>

        </div>

        <input type="submit" name="apagar" value="Apagar" class="btn btn-danger">
        <input type="reset" value="Limpar" class="btn btn-default">

        </form>

    </div>
</div>
<?php
break;
case
'selecionarModelo':
    ?>
    <div class="row">
        <div class="col-md-12">
            <h3> Selecionar modelo da cesta </h3>

            <form action="<?php echo PATH . '/produtos/gerarCestas/'; ?>" method="post" enctype="multipart/form-data">

                <select class="form-control" name="modelo">
                    <?php
                    $conexao = DaoProduto::getInstance();
                    $modelos = $conexao->listarModelos();
                    foreach ($modelos as $modelo) {
                        echo "<option value='$modelo->id'> $modelo->nome </option>";
                    }
                    ?>
                </select></br>

                <input type="submit" name="selecionar" value="Selecionar" class="btn btn-info">

            </form>

        </div>
    </div>

    <?php
    break;
case 'gerarCestas':
    if (isset($_POST['modelo'])) {
        $conexao = DaoProduto::getInstance();
        $modelos = $conexao->listarProdutosCesta(antiInject($_POST['modelo']));
    }
    ?>
    <div class="row">
        <h2>Gerar Cestas Básica</h2>
        <div class="col-lg-5">
            <div class="w3-card-8 w3-dark-grey">

                <div class="w3-container w3-center">
                    <h3>Modelo da Cesta</h3>
                    <table class="table table-bordered">
                        <thead>
                        <tr class="text-center">
                            <th>Nome</th>
                            <th>Peso (KG) / Litros / Qnt</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($modelos as $modelo) {
                            $conexao = DaoProduto::getInstance();
                            $nome = $conexao->getNome($modelo->id_nome);
                            echo "<td>$nome->nome </td>";
                            echo "<td> $modelo->peso</td>";
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="col-lg-7">
            <div class="w3-card-8 w3-dark-grey" style="margin: 0 auto">
                <form action="<?php echo PATH; ?> /classes/relatorio.php" method="POST" target="_blank">
                    <div class="w3-container w3-center">
                        <h3>Selecionar Produtos</h3>
                        <div class="row">
                            <div class="col-lg-6">
                                <h5> Quantidade de Cestas</h5>
                            </div>
                            <div class="col-lg-3">
                                <input class='form-control' type="number" value="0" name="quantidadeCestas" required>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Disponível</th>
                                <th>Peso (KG) / Litros / Qnt</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($modelos as $modelo) {
                                $conexao = DaoProduto::getInstance();
                                $produtos = $conexao->listarTodosPorNomeProduto($modelo->id_nome);
                                foreach ($produtos as $produto) {
                                    echo "<tr class='text-center'>";
                                    $nome = $conexao->getNome($produto->id_nome_produto);
                                    echo "<td><div class='col-lg-5'> $produto->id_produto </div></td>";
                                    echo "<td> $nome->nome ($produto->peso)</td>";
                                    echo "<td> $produto->quantidade </td>";
                                    echo "<td><div class='col-lg-10'><input type='number' name='produto[]' class='form-control' value='0' min='0' max='$produto->quantidade' required>
                                                                     <input type='number' name='produtosExistentes[]' value='$produto->quantidade' class='form-control' hidden>
                                                                     <input type='number' name='idProdutos[]' value='$produto->id_produto' class='form-control' hidden>
                                                                     <input type='number' name='idNomeProdutos[]' value='$produto->id_nome_produto' class='form-control' hidden>
                                                                     <input type='text' name='dataVencimento[]' value='$produto->dataVencimento' class='form-control' hidden>
                                                                     <input type='number' name='peso[]' value='$produto->peso' class='form-control' hidden>
                                                                     </div></td>";
                                    echo "</tr>";
                                }
                            }
                            ?>
                            </tbody>
                        </table>

                        <div class="w3-section">
                            <button type="submit" name="relatorioCestaBasica" class="w3-btn w3-green">Salvar Cesta
                            </button>
                            <button type="reset" class="w3-btn w3-red">Limpar</button>
                        </div>
                </form>
            </div>

        </div>
    </div>
    </div>
    <?php
    break;
case 'addProduto':

    if (isset($_POST['cadastrar'])) {
        $id = antiInject($_POST['produtos']);
        $vencimento = antiInject($_POST['validade']);
        $quantidade = antiInject($_POST['quantidade']);
        $peso = antiInject($_POST['peso']);


        if (!isset($nome) and !isset($vencimento) and !isset($quantidade) and !isset($peso)) {
            echo '<div class="alert alert-info"> Os campos marcados com * são obrigatórios </div>';
        } else {
            $produto = new Produto($id, $vencimento, $quantidade, $peso);
            $conexao = DaoProduto::getInstance();
            $conexao->inserir($produto);
        }
    }

    ?>
    <div class="row">
        <div class="col-lg-9">

            <h3> Adicionar Produto </h3><br>

            <form action="" method="post" enctype="multipart/form-data">


                <div class="row">
                    <div class="form-group col-lg-9">
                        <label for="produto">Produto </label> <span class="campo_obrigatorio"> *</span>
                        <select class="form-control" name="produtos">
                            <?php
                            $conexao = DaoProduto::getInstance();
                            $nomes = $conexao->listarTodosNomes();
                            foreach ($nomes as $nome) {
                                echo "<option value='$nome->id_nome_produto'> $nome->nome </option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="peso">Peso (KG) / Litros / Qtd </label> <span class="campo_obrigatorio"> *</span>
                        <input type="number" step="0.01" class="form-control" id="peso" name="peso" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-10">
                        <label for="validade">Data de Validade </label> <span class="campo_obrigatorio"> *</span>
                        <input type="text" class="form-control" id="data_consulta" name="validade" required>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="quantidade">Quantidade </label> <span class="campo_obrigatorio"> *</span>
                        <input type="number" class="form-control" id="quantidade" name="quantidade" required>
                    </div>
                </div>
        </div>

    </div>

    <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-primary">
    <input type="reset" value="Limpar" class="btn btn-default">

    </form>

    </div>
    </div>
    <?php
    break;
case 'removerProduto':
    if (isset($_POST['apagar'])) {
        $id = antiInject($_POST['id']);
        $quantidade = antiInject($_POST['quantidade']);


        if (!isset($id) and !isset($quantidade)) {
            echo '<div class="alert alert-info"> Os campos marcados com * são obrigatórios </div>';
        } else {
            $conexao = DaoProduto::getInstance();
            $conexao->deletar($id, $quantidade);
        }
    }

    ?>

    <div class="col-lg-9">

        <h3> Remover Produtos </h3>

        <form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <?php
                $conexao = DaoProduto::getInstance();
                $id = $conexao->listarPorIdProduto(antiInject($value));
                $nome = $conexao->listarPorId(antiInject($id->id_nome_produto));
                ?>
                <div class="row">
                    <div class="form-group col-lg-12">
                        <input type="hidden" class="form-control" id="id" name="id"
                               value="<?php echo $id->id_produto ?>">
                    </div>
                </div>
                <label for="nome_produto">Nome Produto </label>
                <input type='text' value="<?php echo $nome->nome; ?>" class='form-control' id='nome_produto'
                       name='nome_produto' disabled>
                <div class="row">
                    <div class="form-group col-lg-10">
                        <label for="validade">Data de Vencimento </label>
                        <input type="text" value="<?php echo $id->dataVencimento; ?>" class="form-control"
                               name="validade" disabled>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="quantidade">Quantidade </label> <span class="campo_obrigatorio"> *</span>
                        <select class="form-control" name="quantidade">
                            <?php
                            for ($i = 1; $i < $id->quantidade + 1; $i++) {
                                echo "<option value='$i'> $i </option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
    </div>

    </div>

    <input type="submit" name="apagar" value="Apagar" class="btn btn-danger">
    <input type="reset" value="Limpar" class="btn btn-default">

    </form>

    </div>
    <?php
    break;
case "listar":
    ?>
    <h3> Listagem dos Produtos </h3>
    <br>
    <div class=".col-md-3 .col-md-offset-3" align="right">
        <a href="<?php echo PATH ?>/produtos/addProduto/<?php echo $value; ?>"
           class="btn btn-primary"
           title="Nova Consulta"> Novo Produto </a>
    </div>

    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table cellspacing="0" class="table table-hover table-responsive" width="100%" id="tabela">
                    <thead>
                    <tr>
                        <th> ID</th>
                        <th> Nome</th>
                        <th> Data de Vecimento</th>
                        <th> Peso (KG) / Litros / Qnt
                        <th> Quantidade</th>
                        <th> Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $conexao = DaoProduto::getInstance();
                    $produtos = $conexao->listarTodos();
                    foreach ($produtos as $produto) {
                        $conexaoP = DaoProduto::getInstance();
                        $nomeProduto = $conexaoP->listarPorId($produto->id_nome_produto);
                        $hoje = DateTime::createFromFormat('d/m/Y', date('d/m/Y'), $timeZone);
                        //$data = strtotime(date('d-m-Y'));
                        $produtoVencimento = DateTime::createFromFormat('d/m/Y', $produto->dataVencimento, $timeZone);
                        //$produtoVencimento = strtotime($produto->dataVencimento);
                        if ($produtoVencimento < $hoje) {
                            ?>
                            <tr>
                                <td><font color="red"> <?php echo $produto->id_produto ?></td>
                                <td><font color="red"> <?php echo $nomeProduto->nome ?></td>
                                <td><font color="red"> <?php echo $produto->dataVencimento ?></td>
                                <td><font color="red"> <?php echo $produto->peso ?></td>
                                <td><font color="red"> <?php echo $produto->quantidade ?></td>
                                <td>
                                    <a href="<?php echo PATH ?>/produtos/editarProduto/<?php echo $produto->id_produto ?>"
                                       class="btn btn-primary"
                                       title="Editar Produtos"> <span
                                            class="glyphicon glyphicon-pencil icone_list"
                                            aria-hidden="true"> </span> </a>
                                    <a href="<?php echo PATH ?>/produtos/removerProduto/<?php echo $produto->id_produto ?>"
                                       class="btn btn-danger"
                                       title="Remover Produtos"> <span
                                            class="glyphicon glyphicon-remove icone_list"
                                            aria-hidden="true"> </span> </a>
                                </td>
                            </tr>
                            <?php
                        } else {
                            ?>
                            <tr>
                                <td><font color="#006400"> <?php echo $produto->id_produto ?></td>
                                <td><font color="#006400"> <?php echo $nomeProduto->nome ?></td>
                                <td><font color="#006400"> <?php echo $produto->dataVencimento ?></td>
                                <td><font color="#006400"> <?php echo $produto->peso ?></td>
                                <td><font color="#006400"> <?php echo $produto->quantidade ?></td>
                                <td>
                                    <a href="<?php echo PATH ?>/produtos/editarProduto/<?php echo $produto->id_produto ?>"
                                       class="btn btn-primary"
                                       title="Editar Produtos"> <span
                                            class="glyphicon glyphicon-pencil icone_list"
                                            aria-hidden="true"> </span> </a>
                                    <a href="<?php echo PATH ?>/produtos/removerProduto/<?php echo $produto->id_produto ?>"
                                       class="btn btn-danger"
                                       title="Remover Produtos"> <span
                                            class="glyphicon glyphicon-remove icone_list"
                                            aria-hidden="true"> </span> </a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div>


    <?php
    break;
case "editarProduto":
    if (isset($_POST['editar'])) {
        $id = antiInject($_POST['id']);
        $validade = antiInject($_POST['validade']);
        $quantidade = antiInject($_POST['quantidade']);


        if (!isset($id) and !isset($validade) and !isset($quantidade)) {
            echo '<div class="alert alert-info"> Os campos marcados com * são obrigatórios </div>';
        } else {
            $conexao = DaoProduto::getInstance();
            $conexao->editar($id, $validade, $quantidade);
        }
    }
    ?>
    <h3> Editar Produto </h3>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="form-group col-lg-12">
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $value ?>">
            </div>
        </div>
        <div class="form-group">
            <?php
            $conexao = DaoProduto::getInstance();
            $id = $conexao->listarPorIdProduto(antiInject($value));
            $nome = $conexao->listarPorId($id->id_nome_produto);
            ?>
            <label for="validade">Produto </label> <span class="campo_obrigatorio"> *</span>
            <input type="text" value="<?php echo $nome->nome; ?>" class="form-control" id="produto" name="produto"
                   disabled>
        </div>
        <div class="row">
            <div class="form-group col-lg-10">
                <label for="validade">Data de Validade </label> <span class="campo_obrigatorio"> *</span>
                <input type="text" value="<?php echo $id->dataVencimento; ?>" class="form-control" id="data_consulta"
                       name="validade" required>
            </div>
            <div class="form-group col-lg-2">
                <label for="quantidade">Quantidade </label> <span class="campo_obrigatorio"> *</span>
                <input type="number" value="<?php echo $id->quantidade; ?>" class="form-control" id="quantidade"
                       name="quantidade" required>
            </div>
        </div>
        </div>

        </div>

        <input type="submit" name="editar" value="Editar" class="btn btn-primary">
        <input type="reset" value="Limpar" class="btn btn-default">

    </form>

    </div>
    <?php
    break;
}
?>

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<script>
    function MudarEstadoAuxilioDoenca(el) {
        var display = document.getElementById('campo_auxilio_doenca').style.display;
        if (display == "none" && el == 1)
            document.getElementById('campo_auxilio_doenca').style.display = 'block';
        else if (display == "block" && el == 0)
            document.getElementById('campo_auxilio_doenca').style.display = 'none';
    }

    function MudarEstadoCestaBasica(el) {
        var display = document.getElementById('campo_necessita_cesta').style.display;
        if (display == "none" && el == 1)
            document.getElementById('campo_necessita_cesta').style.display = 'block';
        else if (display == "block" && el == 0)
            document.getElementById('campo_necessita_cesta').style.display = 'none';
    }

    function MudarEstadoUsaMedicamento(el) {
        var display = document.getElementById('campo_usa_medicamento').style.display;
        if (display == "none" && el == 1)
            document.getElementById('campo_usa_medicamento').style.display = 'block';
        else if (display == "block" && el == 0)
            document.getElementById('campo_usa_medicamento').style.display = 'none';
    }

    function MudarEstadoRealizaOutroTratamento(el) {
        var display = document.getElementById('campo_realiza_outro_tratamento').style.display;
        if (display == "none" && el == 1)
            document.getElementById('campo_realiza_outro_tratamento').style.display = 'block';
        else if (display == "block" && el == 0)
            document.getElementById('campo_realiza_outro_tratamento').style.display = 'none';
    }

    function MudarEstadoNecessitaOutroAuxilio(el) {
        var display = document.getElementById('campo_necessita_outro_auxilio').style.display;
        if (display == "none" && el == 1)
            document.getElementById('campo_necessita_outro_auxilio').style.display = 'block';
        else if (display == "block" && el == 0)
            document.getElementById('campo_necessita_outro_auxilio').style.display = 'none';
    }
    function duplicarCampos() {
        var clone = document.getElementById('origem').cloneNode(true);
        var destino = document.getElementById('destino');
        destino.appendChild(clone);
        var camposClonados = clone.getElementsByTagName('input');
        for (i = 0; i < camposClonados.length; i++) {
            camposClonados[i].value = '';
        }
    }
    function removerCampos(id) {
        var node1 = document.getElementById('destino');
        node1.removeChild(node1.childNodes[0]);
    }
</script>