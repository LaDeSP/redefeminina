<?php
    if (!isAdmin() && !isTesoureira()) {
        echo '<div class="alert alert-danger"> Acesso restrito apenas para pessoas autorizadas. Entre em contato com a presidente para mais informações!  </div>';
        return;
    }
?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Financeiro
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="glyphicon glyphicon-th"></i> <a href="<?php echo PATH ?>/">Inicío</a>
                    </li>
                    <li class="active">
                        <i class="glyphicon glyphicon-signal"></i> Financeiro
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <a href="<?php echo PATH ?>/financeiro/novofluxo" class="btn btn-info"
                   title="Clique para abrir um novo Fluxo de Caixa"> Novo fluxo</a>
                <a href="<?php echo PATH ?>/financeiro/adde" class="btn btn-primary"
                   title="Adicionar todas as entradas no caixa"> Adicionar Entrada no Caixa</a>
                <a href="<?php echo PATH ?>/financeiro/adds" class="btn btn-primary"
                   title="Adicionar todas as saidas no caixa"> Adicionar Saída no Caixa</a>
                <a href="<?php echo PATH ?>/financeiro/list" class="btn btn-primary"
                   title="Lista todas as entradas e saidas"> Listar Contas</a>
                <a href="<?php echo PATH ?>/financeiro/listtodos" class="btn btn-primary"
                   title="Lista todas as entradas e saidas"> Listar todos</a>
            </div>
        </div>

        <br>

        <?php
        $somarEntrada = 0;
        $somarSaida = 0;
        switch ($action):
            case 'listafluxo' :
            ?>
            <div class="row">
                <?php
                if (isset($value) && is_numeric($value)) {
                    ?>
                    <div class="col-lg-5">
                        <div class="table-responsive">
                            <h3>Listar Entrada</h3>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th> Nome</th>
                                        <th> Valor</th>
                                        <th> Data</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $conexao = DaoFinanceiro::getInstance();
                                    $data_fluxo = $conexao->validarFluxo();

                                    $conexao = DaoFinanceiro::getInstance();
                                    $id_fluxo = antiInject($value);
                                    $financeiroEntrada = $conexao->listarEntrada($id_fluxo);
                                    foreach ($financeiroEntrada as $financeiro) {
                                        ?>
                                        <tr>
                                            <td> <?php echo $financeiro->nome ?> </td>
                                            <td> <?php echo $financeiro->valor;
                                                $somarEntrada += $financeiro->valor; ?> </td>
                                            <td> <?php echo $financeiro->data_entrada ?> </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-lg-5 col-lg-offset-2">
                        <div class="table-responsive">
                            <h3>Listar Saida</h3>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th> Nome</th>
                                    <th> Valor</th>
                                    <th> Data</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $conexao = DaoFinanceiro::getInstance();
                                    $data_fluxo = $conexao->validarFluxo();

                                    $conexao = DaoFinanceiro::getInstance();
                                    $id_fluxo = antiInject($value);
                                    $financeiroSaida = $conexao->listarSaida($id_fluxo);
                                    foreach ($financeiroSaida as $financeiro) {
                                        ?>
                                        <tr>
                                            <td> <?php echo $financeiro->nome ?> </td>
                                            <td> <?php echo $financeiro->valor;
                                                $somarSaida += $financeiro->valor; ?></td>
                                            <td> <?php echo $financeiro->data_vencimento ?> </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php
                } else {
                    echo '<div class="alert alert-danger"> Deve-se passar um ID </div>';
                }
                ?>
                <?php
                break;
                case 'novofluxo':
                    $conexao = DaoFinanceiro::getInstance();
                    $data_fluxo = $conexao->validarfluxo();

                    if ($data_fluxo == true) {
                        echo '<div class="alert alert-danger"> Existe um fluxo Aberto!! Para abrir um novo fluxo, finalize o atual. </div>';
                    } else {
                        $conexao = DaoFinanceiro::getInstance();
                        $conexao->inserirFluxo();
                    }
                    break;
                case 'listtodos' :
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Fluxos Cadastrados</h3><br>
                            <table cellspacing="0" class="table table-hover table-responsive" width="100%" id="tabela">

                                <thead>
                                    <tr>
                                        <th> #ID</th>
                                        <th> Total Saldo Entrada</th>
                                        <th> Total Saldo Saída</th>
                                        <th> Total</th>
                                        <th> Data Abertura</th>
                                        <th> Data Encerramento</th>
                                        <th> Listar</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $conexao = DaoFinanceiro::getInstance();
                                    $financeiros = $conexao->listarTodos();
                                    foreach ($financeiros as $financeiro) {
                                        ?>
                                        <tr>
                                            <td> <?php echo $financeiro->id_fluxo_caixa ?> </td>
                                            <td> <?php echo $financeiro->saldo_entrada;
                                                $saldoEntrada = $financeiro->saldo_entrada; ?> </td>
                                            <td> <?php echo $financeiro->saldo_saida;
                                                $saldoSaida = $financeiro->saldo_saida; ?> </td>
                                            <td> <?php echo $saldoEntrada -= $saldoSaida ?> </td>
                                            <td> <?php echo $financeiro->mes ?> </td>
                                            <td> <?php echo $financeiro->data_final_fluxo ?> </td>
                                            <td>
                                                <a href="<?php echo PATH ?>/financeiro/listafluxo/<?php echo $financeiro->id_fluxo_caixa ?>"
                                                   class="btn btn-primary"
                                                   title="Listar Todos"> <span
                                                        class="glyphicon glyphicon-th-list"
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

                case 'list' :
                    ?>
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="table-responsive">
                                <h3>Listar Entrada</h3>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th> Nome </th>
                                            <th> Valor </th>
                                            <th> Data </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $conexao = DaoFinanceiro::getInstance();
                                        $data_fluxo = $conexao->validarFluxo();

                                        if ($data_fluxo == true) {

                                            $conexao = DaoFinanceiro::getInstance();
                                            $id_fluxo = $conexao->pega_id_fluxo();
                                            $financeiroEntrada = $conexao->listarEntrada($id_fluxo);
                                            foreach ($financeiroEntrada as $financeiro) {
                                                ?>
                                                <tr>
                                                    <td> <?php echo $financeiro->nome ?> </td>
                                                    <td> <?php echo $financeiro->valor;
                                                        $somarEntrada += $financeiro->valor; ?> </td>
                                                    <td> <?php echo $financeiro->data_entrada ?> </td>
                                                    <td>
                                                        <a href="<?php echo PATH ?>/financeiro/dele/<?php echo $financeiro->id_caixa ?>"
                                                           class="btn btn-danger"
                                                           title="Deletar Conta"> <span
                                                                class="glyphicon glyphicon-remove icone_list"
                                                                aria-hidden="true"> </span> </a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>

                                            <?php
                                        } else {
                                            echo '<div class="alert alert-danger"> Não existe Fluxo Aberto! </div>';
                                        }
                                        ?>

                                        <tr>
                                            <td><b><h4>Total:R$</b><?php echo $somarEntrada; ?></h4></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-5 col-lg-offset-2">
                            <div class="table-responsive">
                                <h3>Listar Saida</h3>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th> Nome </th>
                                            <th> Valor </th>
                                            <th> Data </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $conexao = DaoFinanceiro::getInstance();
                                        $data_fluxo = $conexao->validarFluxo();

                                        if ($data_fluxo == true) {
                                            $conexao = DaoFinanceiro::getInstance();
                                            $id_fluxo = $conexao->pega_id_fluxo();
                                            $financeiroSaida = $conexao->listarSaida($id_fluxo);
                                            foreach ($financeiroSaida as $financeiro) {
                                                ?>
                                                <tr>
                                                    <td> <?php echo $financeiro->nome ?> </td>
                                                    <td> <?php echo $financeiro->valor;
                                                        $somarSaida += $financeiro->valor; ?></td>
                                                    <td> <?php echo $financeiro->data_vencimento ?> </td>
                                                    <td>
                                                        <a href="<?php echo PATH ?>/financeiro/dels/<?php echo $financeiro->id_conta ?>"
                                                           class="btn btn-danger"
                                                           title="Deletar perfil"> <span
                                                                class="glyphicon glyphicon-remove icone_list"
                                                                aria-hidden="true"> </span> </a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                        } else {
                                            echo '<div class="alert alert-danger"> Não existe Fluxo Aberto! </div>';
                                        }
                                        ?>
                                        <tr>
                                            <td><b><h4>Total:R$</b><?php echo $somarSaida; ?></h4></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <a href="<?php echo PATH ?>/financeiro/finalizarfluxo/&entrada=<?php echo $somarEntrada; ?>&saida=<?php echo $somarSaida; ?>"
                       class="btn btn-info" title="Clique para finalizar o fluxo atual aberto">Finalizar-Fluxo</a>
                    <?php
                    break;
                case 'finalizarfluxo':
                    $conexao = DaoFinanceiro::getInstance();
                    $data_fluxo = $conexao->validarFluxo();

                    if ($data_fluxo == true) {
                        $somarEntrada = $_GET['entrada'];
                        $somarSaida = $_GET['saida'];
                        $conexao = DaoFinanceiro::getInstance();
                        $conexao->finalizarFluxo($somarEntrada, $somarSaida, $conexao->pega_id_fluxo());
                    } else {
                        echo '<div class="alert alert-danger"> Não Existe um fluxo aberto para ser finalizado!!! </div>';
                    }

                    break;

                case 'dele' :
                    ?>
                    <?php
                    if (isset($value) && is_numeric($value)) {
                        $conexao = DaoFinanceiro::getInstance();
                        $financeiro = $conexao->listarPorIDEntrada($value);

                        if (isset($_POST['deletarEntrada'])) {
                            $conexao->deletarEntrada($_POST['id_caixa']);
                        }
                        ?>

                        <div class="row">
                            <div class="col-lg-9">

                                <h3>Deletar</h3>

                                <br>

                                <form action='' method='post'>
                                    <input type='hidden' class='form-control' name='id_caixa'
                                           value='<?php echo $financeiro->id_caixa ?>'>
                                    <div class="row">
                                        <div class="form-group col-lg-8">
                                            <label>Nome da Conta</label>
                                            <input type='text' class='form-control' name='nome_paciente'
                                                   value='<?php echo $financeiro->nome ?>' disabled>
                                        </div>
                                    </div>
                                    <button class='btn btn-primary' name='deletarEntrada'>Deletar</button>
                                    <a class="btn btn-default" href="<?php echo PATH ?>/financeiro/list/">Cancelar</a>
                                </form>
                            </div>
                        </div>
                        <?php
                    } else {
                        echo '<div class="alert alert-danger"> Deve-se passar um ID </div>';
                    }
                    ?>
                    <?php
                    break;

                case 'dels' :
                    ?>
                    <?php
                    if (isset($value) && is_numeric($value)) {
                        $conexao = DaoFinanceiro::getInstance();
                        $financeiro = $conexao->listarPorIDSaida($value);

                        if (isset($_POST['deletarSaida'])) {
                            $conexao->deletarSaida($_POST['id_conta']);
                        }
                        ?>

                        <div class="row">
                            <div class="col-lg-9">

                                <h3>Deletar</h3>

                                <br>

                                <form action='' method='post'>
                                    <input type='hidden' class='form-control' name='id_conta'
                                           value='<?php echo $financeiro->id_conta ?>'>
                                    <div class="row">
                                        <div class="form-group col-lg-8">
                                            <label>Nome da Conta</label>
                                            <input type='text' class='form-control' name='nome_paciente'
                                                   value='<?php echo $financeiro->nome ?>' disabled>
                                        </div>
                                    </div>
                                    <button class='btn btn-primary' name='deletarSaida'>Deletar</button>
                                    <a class="btn btn-default" href="<?php echo PATH ?>/financeiro/list/">Cancelar</a>
                                </form>
                            </div>
                        </div>
                        <?php
                    } else {
                        echo '<div class="alert alert-danger"> Deve-se passar um ID </div>';
                    }
                    ?>
                    <?php
                    break;

                case 'adde' :
                    ?>
                    <div class="row">
                        <?php
                        $conexao = DaoFinanceiro::getInstance();
                        $data_fluxo = $conexao->validarfluxo();

                        if ($data_fluxo == true) {

                            if (isset($_POST['cadastrarEntrada'])) {
                                $nome = antiInject($_POST['nome']);
                                $valor = antiInject($_POST['valor']);
                                $dtaentrada = antiInject($_POST['dtaentrada']);

                                if (empty($nome) || empty($valor) || empty($dtaentrada)) {
                                    echo '<div class="alert alert-info"> Os campos marcados com * são obrigatórios </div>';
                                } else {
                                    $financeiro = new FinanceiroEntrada($nome, $valor, $dtaentrada);
                                    $conexao = DaoFinanceiro::getInstance();
                                    $conexao->inserirEntrada($financeiro);
                                }
                            }
                            ?>

                            <div class="col-lg-9">
                                <h3>Adicionar Entrada no Caixa</h3>

                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="form-group col-lg-8">
                                            <label for="nome">Nome </label> <span class="campo_obrigatorio"> *</span>
                                            <input type="text" pattern="[a-zA-Zà-úÀ-Ú\s]+$"
                                                   title="Não são permitidos símbolos e números" class="form-control"
                                                   id="nome" name="nome" size="50" maxlength="50" autofocus required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label for="telefone">Valor <span class="campo_obrigatorio"> *</span></label>
                                            <input type="number" min="0" step="0.01" class="form-control" id="valor"
                                                   name="valor" required>
                                        </div>

                                        <div class="form-group col-lg-4">
                                            <label for="dtaentrada">Data de Entrada </label> <span
                                                class="campo_obrigatorio"> *</span>
                                            <input type="text" class="form-control data" id="dtaentrada" name="dtaentrada"
                                                   required>
                                        </div>
                                    </div>

                                    <input type="submit" name="cadastrarEntrada" value="Cadastrar" class="btn btn-primary">
                                    <input type="reset" value="Limpar" class="btn btn-default">
                                </form>
                                <br>
                            </div>
                            <?php
                        } else {
                            echo '<div class="alert alert-danger"> Abra um novo fluxo para adicionar uma Entrada no Caixa. </div>';
                        }

                        ?>

                    </div>

                    <?php
                    break;

                case 'adds' :
                    ?>
                    <div class="row">
                        <?php
                        $conexao = DaoFinanceiro::getInstance();
                        $data_fluxo = $conexao->validarfluxo();

                        if ($data_fluxo == true) {
                            if (isset($_POST['cadastrarSaida'])) {
                                $nome = antiInject($_POST['nome']);
                                $valor = antiInject($_POST['valor']);
                                $dtasaida = antiInject($_POST['dtasaida']);

                                if (empty($nome) || empty($valor) || empty($dtasaida)) {
                                    echo '<div class="alert alert-info"> Os campos marcados com * são obrigatórios </div>';
                                } else {
                                    $financeiro = new FinanceiroSaida($nome, $valor, $dtasaida);
                                    $conexao = DaoFinanceiro::getInstance();
                                    $conexao->inserirSaida($financeiro);
                                }
                            }
                            ?>

                            <div class="col-lg-9">
                                <h3>Adicionar Saída do Caixa</h3>

                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="form-group col-lg-8">
                                            <label for="nome">Nome </label> <span class="campo_obrigatorio"> *</span>
                                            <input type="text" pattern="[a-zA-Zà-úÀ-Ú\s]+$"
                                                   title="Não são permitidos símbolos e números" class="form-control"
                                                   id="nome" name="nome" size="50" maxlength="50" autofocus required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label for="valor">Valor </label> <span class="campo_obrigatorio"> *</span>
                                            <input type="number" min="0" step='any' min=0 class="form-control" id="valor"
                                                   name="valor" required>
                                        </div>

                                        <div class="form-group col-lg-4">
                                            <label for="dtasaida">Data de Saída </label> <span
                                                class="campo_obrigatorio"> *</span>
                                            <input type="text" class="form-control data" id="dtasaida" name="dtasaida" required>
                                        </div>
                                    </div>

                                    <input type="submit" name="cadastrarSaida" value="Cadastrar" class="btn btn-primary">
                                    <input type="reset" value="Limpar" class="btn btn-default">
                                </form>
                            </div>
                            <?php
                        } else {
                            echo '<div class="alert alert-danger"> Abra um novo fluxo para adicionar uma Saída no caixa. </div>';
                        }
                        ?>
                    </div>
                <?php endswitch ?>
            </div>
        <!-- /.container-fluid -->
    </div>

</div>
    <!-- /#page-wrapper -->