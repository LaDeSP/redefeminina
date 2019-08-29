<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Gerenciar
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="glyphicon glyphicon-th"></i> <a href="<?php echo PATH ?>/"> Inicío </a>
                    </li>
                    <li class="active">
                        <i class="gglyphicon glyphicon-shopping-cart"></i> Gerenciar
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <a href="<?php echo PATH ?>/gerenciar/listarNome" class="btn btn-info"> Nomes dos Produtos </a>
                <a href="<?php echo PATH ?>/gerenciar/gerenciarCestas" class="btn btn-default"> Gerenciar os Modelos das
                    Cestas Básicas </a>
            </div>
        </div>

        <br>

        <?php
        switch ($action) {
        case 'removerModelo':
        if (isset($_POST['apagar'])) {
            $id = antiInject($_POST['id']);
            if (!isset($id)) {
                echo '<div class="alert alert-info"> Os campos marcados com * são obrigatórios </div>';
            } else {
                $conexao = DaoProduto::getInstance();
                $conexao->apagarModelo($id);
            }
        }
        ?>
        <div class="row">
            <div class="col-md-12">
                <h3> Remover Modelo de Cesta </h3>

                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <?php
                        $conexao = DaoProduto::getInstance();
                        $id = $conexao->listarModeloId(antiInject($value));
                        ?>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <input type="hidden" class="form-control" id="id" name="id"
                                       value="<?php echo $id->id ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-9">
                                <label for="validade">Modelo </label>
                                <input type="text" value="<?php echo $id->nome; ?>" class="form-control" name="modelo"
                                       disabled>
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
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id->id ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-9">
                            <label for="validade">Produto </label>
                            <input type="text" value="<?php echo $nome->nome; ?>" class="form-control" name="validade"
                                   disabled>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="quantidade">Quantidade </label> <span class="campo_obrigatorio"> *</span>
                            <input type="text" value="<?php echo $nome->peso; ?>" class="form-control" name="validade"
                                   disabled>
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
case 'editarModelo':
if (isset($_POST['cadastrar'])) {
    $produto = antiInject($_POST['produtos']);
    $peso = antiInject($_POST['peso']);
    $cesta = antiInject($value);
    if (!isset($produto) and !isset($cesta) and !isset($peso)) {
        echo '<div class="alert alert-info"> Os campos marcados com * são obrigatórios </div>';
    } else {
        $conexao = DaoProduto::getInstance();
        $conexao->adicionarModelo($produto, $cesta, $peso);
    }
}
?>
<div class="row">
<div class="col-md-12">
    <h3> Adicionar itens no modelo da cesta </h3> <br>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-9">
                <label for="quantidade">Nome do Produto </label> <span class="campo_obrigatorio"> *</span>
                <select class="form-control" name="produtos">
                    <?php
                    $conexao = DaoProduto::getInstance();
                    $nomes = $conexao->listarTodosNomes();
                    foreach ($nomes as $nome) {
                        echo "<option value='$nome->id_nome_produto'> $nome->nome </option>";
                    }
                    ?>
                </select><br>
            </div>
            <div class="form-group col-lg-3">
                <label for="peso">Peso (KG) / Litros / Qnt </label> <span class="campo_obrigatorio"> *</span>
                <input type="number" step="0.01" class="form-control" id="peso" name="peso" required>
            </div>
        </div>
        <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-primary">
        <input type="reset" value="Limpar" class="btn btn-default"><br><br>

    </form>


    <h3>Produtos Cadastrados no Modelo</h3>

    <div class="table-responsive">
        <table cellspacing="0" class="table table-hover table-responsive" width="100%" id="tabela">
            <thead>
            <tr>
                <th> ID</th>
                <th> Nome</th>
                <th> Peso(KG) / Litros / Qnt</th>
                <th> Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $conexao = DaoProduto::getInstance();
            $produtos = $conexao->listarProdutosCesta(antiInject($value));
            foreach ($produtos as $produto) {
                $conexaoP = DaoProduto::getInstance();
                $nome = $conexaoP->listarPorId(antiInject($produto->id_nome));
                ?>
                <tr>
                    <td> <?php echo $produto->id ?> </td>
                    <td> <?php echo $nome->nome ?> </td>
                    <td> <?php echo $produto->peso ?> </td>
                    <td>
                        <a href="<?php echo PATH ?>/gerenciar/removerCesta/<?php echo $produto->id ?>"
                           class="btn btn-danger"
                           title="Remover Produtos"> <span
                                class="glyphicon glyphicon-remove icone_list"
                                aria-hidden="true"> </span> </a>
                    </td>
                </tr>
                <?php

            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<?php
break;
case 'addCesta':
    if (isset($_POST['cadastrar'])) {
        $nome = antiInject($_POST['nome_cesta']);

        if (!isset($nome)) {
            echo '<div class="alert alert-info"> Os campos marcados com * são obrigatórios </div>';
        } else {
            $conexao = DaoProduto::getInstance();
            $conexao->adicionarCesta($nome);
        }
    }

    ?>
    <div class="row">
        <div class="col-lg-9">
            <h3> Adicionar Cesta Básica </h3> <br><br>


            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="nome_cesta">Nome da Cesta </label> <span class="campo_obrigatorio"> *</span>
                    <input type="text" class="form-control" id="nome_cesta" name="nome_cesta" required>
                </div>
                <br>

                <div>
                    <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-primary">
                    <input type="reset" value="Limpar" class="btn btn-default">
                </div>
            </form>
        </div>
    </div>
    <?php
    break;
case 'gerenciarCestas':
    ?>
    <div class="row">
        <div class="col-lg-12">
            <h3> Gerenciar os Modelos das Cestas Básicas </h3> <br><br>

            <div class=".col-md-3 .col-md-offset-3" align="right">
                <a href="<?php echo PATH ?>/gerenciar/addCesta/<?php echo $value; ?>"
                   class="btn btn-primary"
                   title="Nova Consulta"> Novo Modelo </a><br><br>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="table-responsive">
                <table cellspacing="0" class="table table-hover table-responsive" width="100%" id="tabela">
                    <thead>
                    <tr>
                        <th> ID</th>
                        <th> Nome</th>
                        <th> Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $conexao = DaoProduto::getInstance();
                    $cestas = $conexao->listarCestas();
                    foreach ($cestas as $cesta) {
                        ?>
                        <tr>
                            <td> <?php echo $cesta->id ?> </td>
                            <td> <?php echo $cesta->nome ?> </td>
                            <td>
                                <a href="<?php echo PATH ?>/gerenciar/editarModelo/<?php echo $cesta->id ?>"
                                   class="btn btn-primary"
                                   title="Editar Produtos"> <span
                                        class="glyphicon glyphicon-pencil icone_list"
                                        aria-hidden="true"> </span> </a>
                                <a href="<?php echo PATH ?>/gerenciar/removerModelo/<?php echo $cesta->id ?>"
                                   class="btn btn-danger"
                                   title="Remover Produtos"> <span
                                        class="glyphicon glyphicon-remove icone_list"
                                        aria-hidden="true"> </span> </a>
                            </td>
                        </tr>
                        <?php

                    }
                    ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <?php
    break;
case "addNome":
if (isset($_POST['cadastrar'])) {
    $nome_produto = antiInject($_POST['nome_produto']);

    if (!isset($nome_produto)) {
        echo '<div class="alert alert-info"> Os campos marcados com * são obrigatórios </div>';
    } else {
        $conexao = DaoProduto::getInstance();
        $conexao->inserirNome($nome_produto);
    }
}

?>
<div class="row">
    <div class="col-lg-9">

        <h3> Adicionar Nome do Produto </h3><br>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-lg-9">
                    <label for="nome_produto">Nome do Produto </label> <span class="campo_obrigatorio"> *</span>
                    <input type="text" class="form-control" id="nome_produto" name="nome_produto" required>
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
case "apagarNome":

    if (isset($_POST['apagar'])) {
        $id = antiInject($_POST['id_produto']);

        if (!isset($id)) {
            echo '<div class="alert alert-info"> Os campos marcados com * são obrigatórios </div>';
        } else {
            $conexao = DaoProduto::getInstance();
            $conexao->deletarNome($id);
        }
    }

    ?>

    <div class="col-lg-9">

        <h3> Apagar Nome do Produto </h3>

        <form action="" method="post" enctype="multipart/form-data">
            <!--
                            <div class="form-group">
                                <select class="form-control" name="produtos">
                                    <?php

            /*
            $conexao = DaoProduto::getInstance();
            $nomes = $conexao->listarTodosNomes();
            foreach ($nomes as $nome){
                echo "<option value='$nome->id_nome_produto'> $nome->nome </option>";
            }*/
            ?>
                                </select>
                            </div>

                    </div>-->

            <div class="row">

                <?php
                $conexao = DaoProduto::getInstance();
                $id = $conexao->listarPorId($value);
                echo "<input type='text' name='id_produto' class='form_control' value='$id->id_nome_produto' hidden>";
                echo "<input type='text' name='produto' class='form-control' value='$id->nome' disabled >";

                ?>
            </div>
            <br><br>


            <input type="submit" name="apagar" value="Apagar" class="btn btn-danger">
            <input type="reset" value="Limpar" class="btn btn-default">

        </form>

    </div>

    <?php
    break;
case "listarNome":
    ?>
    <div class="row">
        <div class="col-lg-12">
            <h3> Listagem dos nomes dos Produtos </h3>
            <br>
            <div class=".col-md-3 .col-md-offset-3" align="right">
                <a href="<?php echo PATH ?>/gerenciar/addNome/<?php echo $value; ?>"
                   class="btn btn-primary"
                   title="Nova Consulta"> Novo Nome </a><br><br>
            </div>
        </div>


        <div class="col-lg-12">
            <div class="table-responsive">
                <table cellspacing="0" class="table table-hover table-responsive" width="100%" id="tabela">
                    <thead>
                    <tr>
                        <th> ID</th>
                        <th> Nome</th>
                        <th> Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $conexao = DaoProduto::getInstance();
                    $produtos = $conexao->listarTodosNomes();
                    foreach ($produtos as $produto) {
                        ?>
                        <tr>
                            <td> <?php echo $produto->id_nome_produto ?> </td>
                            <td> <?php echo $produto->nome ?> </td>
                            <td>
                                <a href="<?php echo PATH ?>/gerenciar/apagarNome/ <?php echo $produto->id_nome_produto; ?>"
                                   class="btn btn-danger"
                                   title="Remover Nome"> <span
                                        class="glyphicon glyphicon-remove icone_list"
                                        aria-hidden="true"> </span> </a></td>
                        </tr>
                        <?php

                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
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