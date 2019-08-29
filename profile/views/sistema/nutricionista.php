<?php
if (!isAdmin() && !isNutricionista()) {
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
                    Nutricionista
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="glyphicon glyphicon-th"></i> <a href="<?php echo PATH ?>"> Inicío </a>
                    </li>
                    <li class="active">
                        <i class="glyphicon glyphicon-heart"></i> Nutricionista
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <a href="<?php echo PATH ?>/nutricionista/list" class="btn btn-info"> Listar Pacientes </a>
                <a href="<?php echo PATH ?>/nutricionista/report" class="btn btn-default"> Relatórios </a>
            </div>
        </div>

        <br>

        <?php
        switch ($action) {
            case 'report':
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <label>Gerar relatório em PDF dos</label><br>
                        <form action="<?php echo PATH; ?> /classes/relatorio.php" method="post" name="form-relatorio"
                              target="_blank">
                            <select class="form-control" name="relatorio-nutricionista">
                                <option value="atendidos">Pacientes atendidos
                                    pela <?php echo $_SESSION['user']; ?></option>
                                <option value="todosPacientes">Pacientes atendidos (todos)</option>
                            </select><br>
                            <input type="submit" value="Gerar" class="btn btn-success" name="gerar">
                        </form>
                    </div>
                </div>
                <?php

                break;
            case 'delConsulta':

                if (isset($value) && is_numeric($value)) {
                    $conexao = DaoNutricionista::getInstance();
                    $consulta = $conexao->listarConsultasID($value);

                    if (isset($_POST['deletar'])) {
                        $id = $_POST['id_consulta_nutri'];
                        $conexao->deletarConsulta($id);
                    }


                    echo "
                    <div class='col-lg-9'>

                        <div class='row'>
                            <h3> Deletar Consulta </h3>
                            <br>
                                <form action='' method='post'>
                                    <input type='hidden' class='form-control' name='id_consulta_nutri' value='$consulta->id_consulta_nutri'>

                                    <div class='row'>
                                        <div class='form-group col-lg-8'>
                                            <label>Data da Consulta</label>
                                            <input type='text' class='form-control' name='nome_paciente' value='$consulta->data_consulta' disabled>
                                        </div>
                                    </div>

                                    <button class = 'btn btn-primary' name='deletar'>Deletar</button>
                                    <a class='btn btn-default' href='" . PATH . "/nutricionista/list/'>Cancelar</a>
                                </form>
                        </div>

                    </div>";
                } else {
                    echo '<div class="alert alert-danger"> Deve-se passar um ID </div>';
                }
                ?>

                <?php

                break;
            case 'mostrarConsulta':

                $conexao = DaoNutricionista::getInstance();
                $consulta = $conexao->listarConsultasID($value);
                ?>

                <div class="row">
                    <div class="col-lg-9">
                        <form action="" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="id" id="id" value="<?php echo $value; ?>">

                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="data_consulta">Data da Consulta </label> <span
                                        class="campo_obrigatorio"> *</span>
                                    <input type="text" class="form-control data"
                                           value="<?php echo $consulta->data_consulta; ?>"
                                           id="data_consulta" name="data_consulta" disabled>
                                </div>
                                <div class="form-group col-lg-8">
                                    <label for="nome">Motivo da Consulta </label> <span
                                        class="campo_obrigatorio"> *</span>
                                    <input type="text" class="form-control" id="motivo_consulta" name="motivo_consulta"
                                           value="<?php echo $consulta->motivo_consulta; ?>" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="informacoes_evolucao">Informações da Evolução </label> <span
                                        class="campo_obrigatorio"> *</span>
                                    <input type="text" class="form-control" id="informacoes_evolucao"
                                           name="informacoes_evolucao"
                                           value="<?php echo $consulta->informacoes_evolucao; ?>" disabled>
                                </div>
                            </div>

                            <br>

                            <h3>Avaliação Clínica</h3><br>

                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="avaliacao_clinica">Patologia </label>
                                    <input type="text" class="form-control" id="patologia" name="patologia"
                                           value="<?php echo $consulta->patologia; ?>" disabled>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="avaliacao_clinica">Patologia Associada </label>
                                    <input type="text" class="form-control" id="patologia_associada"
                                           name="patologia_associada"
                                           value="<?php echo $consulta->patologia_associada; ?>" disabled>
                                </div>
                            </div>

                            <br>

                            <h3>Caracteristicas do Aparelho Gastro Intestinal </h3><br>

                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="disfagia">Disgafia</label>
                                    <input class="form-control" type="text"
                                           value="<?php if ($consulta->disfagia) echo "Sim"; else echo "Não"; ?>"
                                           disabled>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="pirose">Pirose</label>
                                    <input class="form-control" type="text"
                                           value="<?php if ($consulta->pirose) echo "Sim"; else echo "Não"; ?>"
                                           disabled>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="odinofagia">Odinofagia</label>
                                    <input class="form-control" type="text"
                                           value="<?php if ($consulta->odinofagia) echo "Sim"; else echo "Não"; ?>"
                                           disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="aspecto_fezes">Aspecto das fezes </label>
                                    <input type="text" class="form-control" id="aspecto_fezes" name="aspecto_fezes"
                                           value="<?php echo $consulta->aspecto_fezes; ?>" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="modificacoes_fezes">Modificações das fezes </label>
                                    <input type="text" class="form-control" id="modificacoes_fezes"
                                           name="modificacoes_fezes"
                                           value="<?php echo $consulta->modificacoes_fezes; ?>" disabled>
                                </div>
                            </div>

                            <br>

                            <h3>Avaliação Antopométrica</h3><br>

                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="avaliacao_clinica">Peso Habitual </label>
                                    <input type="number" step="0.01" class="form-control" id="peso_habitual"
                                           name="peso_habitual"
                                           value="<?php echo $consulta->peso_habitual; ?>" disabled>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="avaliacao_clinica">Peso Atual </label>
                                    <input type="number" step="0.01" class="form-control" id="peso_atual"
                                           name="peso_atual""
                                    value="<?php echo $consulta->peso_atual; ?>" disabled>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="avaliacao_clinica">Peso Desejável </label>
                                    <input type="number" step="0.01" class="form-control" id="peso_desejavel"
                                           name="peso_desejavel"
                                           value="<?php echo $consulta->peso_desejavel; ?>" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="altura">Altura</label>
                                    <input type="number" step="0.01" class="form-control" id="altura" name="altura"
                                           value="<?php echo $consulta->altura; ?>" disabled>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="altura">IMC</label>
                                    <input type="number" step="0.01" class="form-control" id="imc" name="imc"
                                           value="<?php
                                           $imc = $consulta->peso_atual / ($consulta->altura * $consulta->altura);
                                           echo number_format($imc, 2, '.', '');
                                           ?>" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="altura">Situação corporal com base no IMC</label>
                                    <input type="text" class="form-control" id="imcResult" name="imcResult" value="<?php
                                    if ($consulta->altura != 0) {
                                        $imc = $consulta->peso_atual / ($consulta->altura * $consulta->altura);

                                        if ($imc < 16) {
                                            echo "Baixo peso muito grave";
                                        } else if ($imc >= 16 && $imc < 17) {
                                            echo "Baixo peso grave";
                                        } else if ($imc >= 17 && $imc < 18.50) {
                                            echo "Baixo peso";
                                        } else if ($imc >= 18.50 && $imc < 25) {
                                            echo "Peso normal";
                                        } else if ($imc >= 25 && $imc < 30) {
                                            echo "Sobrepeso";
                                        } else if ($imc >= 30 && $imc < 35) {
                                            echo "Obesidade grau I";
                                        } else if ($imc >= 35 && $imc < 40) {
                                            echo "Obesidade grau II";
                                        } else {
                                            echo "Obesidade grau III (obesidade mórbida)";
                                        }
                                    }

                                    ?>" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="altura">CC</label>
                                    <input type="text" class="form-control" id="cc" name="cc"
                                           value="<?php echo $consulta->cc; ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="realiza_atividade_fisica">Realiza Atividade Fisica </label><br>
                                <input class="form-control" type="text" name="realiza_atividade_fisica"
                                       id="realiza_atividade_fisica" value="<?php
                                if ($consulta->realiza_atividade_fisica) echo $consulta->tipo_atividade_fisica;
                                else echo "Não realiza atividades fisicas";
                                ?>" disabled>
                            </div>


                            <br>
                            <h3>Registro Alimentar</h3><br>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="apetite_atual">Apetite Atual </label>
                                    <input type="text" class="form-control" id="apetite_atual" name="apetite_atual"
                                           value="<?php echo $consulta->apetite_atual; ?>" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-2">
                                    <label></label>
                                    <h4>Desjejum</h4>
                                </div>
                                <div class="form-group col-lg-2">
                                    <label for="modificacoes_fezes">Hora </label>
                                    <input type="text" class="form-control" id="horaDesjejum" name="horaDesjejum"
                                           value="<?php echo $consulta->desjejum_hora; ?>" disabled>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="modificacoes_fezes">Refeição </label>
                                    <input type="text" class="form-control" id="refeicaoDesjejum"
                                           name="refeicaoDesjejum" value="<?php echo $consulta->desjejum_refeicao; ?>"
                                           disabled>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="modificacoes_fezes">Quantidade </label>
                                    <input type="text" class="form-control" id="quantidadeDesjejum"
                                           name="quantidadeDesjejum" value="<?php echo $consulta->desjejum_qtd; ?>"
                                           disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-2">
                                    <label></label>
                                    <h4>Colação</h4>
                                </div>
                                <div class="form-group col-lg-2">
                                    <label for="modificacoes_fezes">Hora </label>
                                    <input type="text" class="form-control" id="horaColacao" name="horaColacao"
                                           value="<?php echo $consulta->colacao_hora; ?>" disabled>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="modificacoes_fezes">Refeição </label>
                                    <input type="text" class="form-control" id="refeicaoColacao" name="refeicaoColacao"
                                           value="<?php echo $consulta->colacao_refeicao; ?>" disabled>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="modificacoes_fezes">Quantidade </label>
                                    <input type="text" class="form-control" id="quantidadeColacao"
                                           name="quantidadeColacao" value="<?php echo $consulta->colacao_qtd; ?>"
                                           disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-2">
                                    <label></label>
                                    <h4>Almoço</h4>
                                </div>
                                <div class="form-group col-lg-2">
                                    <label for="modificacoes_fezes">Hora </label>
                                    <input type="text" class="form-control" id="horaAlmoco" name="horaAlmoco"
                                           value="<?php echo $consulta->almoco_hora; ?>" disabled>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="modificacoes_fezes">Refeição </label>
                                    <input type="text" class="form-control" id="refeicaoAlmoco" name="refeicaoAlmoco"
                                           value="<?php echo $consulta->almoco_refeicao; ?>" disabled>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="modificacoes_fezes">Quantidade </label>
                                    <input type="text" class="form-control" id="quantidadeAlmoco"
                                           name="quantidadeAlmoco" value="<?php echo $consulta->almoco_qtd; ?>"
                                           disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-2">
                                    <label></label>
                                    <h4>Lanche</h4>
                                </div>
                                <div class="form-group col-lg-2">
                                    <label for="modificacoes_fezes">Hora </label>
                                    <input type="text" class="form-control" id="horaLanche" name="horaLanche"
                                           value="<?php echo $consulta->lanche_hora; ?>" disabled>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="modificacoes_fezes">Refeição </label>
                                    <input type="text" class="form-control" id="refeicaoLanche" name="refeicaoLanche"
                                           value="<?php echo $consulta->lanche_refeicao; ?>" disabled>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="modificacoes_fezes">Quantidade </label>
                                    <input type="text" class="form-control" id="quantidadeLanche"
                                           name="quantidadeLanche" value="<?php echo $consulta->lanche_qtd; ?>"
                                           disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-2">
                                    <label></label>
                                    <h4>Jantar</h4>
                                </div>
                                <div class="form-group col-lg-2">
                                    <label for="modificacoes_fezes">Hora </label>
                                    <input type="text" class="form-control" id="horaJantar" name="horaJantar"
                                           value="<?php echo $consulta->jantar_hora; ?>" disabled>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="modificacoes_fezes">Refeição </label>
                                    <input type="text" class="form-control" id="refeicaoJantar" name="refeicaoJantar"
                                           value="<?php echo $consulta->jantar_refeicao; ?>" disabled>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="modificacoes_fezes">Quantidade </label>
                                    <input type="text" class="form-control" id="quantidadeJantar"
                                           name="quantidadeJantar" value="<?php echo $consulta->jantar_qtd; ?>"
                                           disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-2">
                                    <label></label>
                                    <h4>Ceia</h4>
                                </div>
                                <div class="form-group col-lg-2">
                                    <label for="modificacoes_fezes">Hora </label>
                                    <input type="text" class="form-control" id="horaCeia" name="horaCeia"
                                           value="<?php echo $consulta->ceia_hora; ?>" disabled>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="modificacoes_fezes">Refeição </label>
                                    <input type="text" class="form-control" id="refeicaoCeia" name="refeicaoCeia"
                                           value="<?php echo $consulta->ceia_refeicao; ?>" disabled>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="modificacoes_fezes">Quantidade </label>
                                    <input type="text" class="form-control" id="quantidadeCeia" name="quantidadeCeia"
                                           value="<?php echo $consulta->ceia_qtd; ?>" disabled>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
                <?php

                break;
            case 'consult':
                ?>

                <br>
                <div class=".col-md-3 .col-md-offset-3" align="right">
                    <a href="<?php echo PATH ?>/nutricionista/addConsult/<?php echo $value; ?>"
                       class="btn btn-primary"
                       title="Nova Consulta"> Nova Consulta </a>
                    <a href="<?php echo PATH ?>/nutricionista/apagarConsultas/<?php echo $value; ?>"
                       class="btn btn-danger"
                       title="Nova Consulta"> Apagar todas consultas </a>
                </div>

                <br>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table cellspacing="0" class="table table-hover table-responsive" width="100%" id="tabela">
                                <thead>
                                <tr>
                                    <th width="150"> Data da Consulta</th>
                                    <th width="150"> Motivo Consulta</th>
                                    <th width="200"> Informação Evolução</th>
                                    <th width="100"> Patologia</th>
                                    <th width="100"> Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $conexao = DaoNutricionista::getInstance();
                                $consultas = $conexao->listarConsultas($value);
                                foreach ($consultas as $consulta) {
                                    ?>
                                    <tr>
                                        <td> <?php echo $consulta->data_consulta ?> </td>
                                        <td> <?php echo $consulta->motivo_consulta ?> </td>
                                        <td> <?php echo $consulta->informacoes_evolucao ?> </td>
                                        <td> <?php echo $consulta->patologia ?> </td>
                                        <td>
                                            <a href="<?php echo PATH ?>/nutricionista/mostrarConsulta/<?php echo $consulta->id_consulta_nutri ?>"
                                               class="btn btn-info"
                                               title="Ver Consulta"><span class="glyphicon glyphicon-user icone_list"
                                                                          aria-hidden="true"> </span> </a>
                                            <a href="<?php echo PATH ?>/nutricionista/delConsulta/<?php echo $consulta->id_consulta_nutri ?>"
                                               class="btn btn-danger"
                                               title="Deletar Consulta"> <span
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
            case 'addConsult':

                ?>
                <div class="row">
                    <div class="col-lg-9">
                        <?php
                        if (isset($_POST['finalizarConsulta'])) {
                            $id = antiInject($_POST['id']);
                            $data = antiInject($_POST['data_consulta']);
                            $motivo_consulta = antiInject($_POST['motivo_consulta']);
                            $informacoes_evolucao = antiInject($_POST['informacoes_evolucao']);
                            $patologia = antiInject($_POST['patologia']);
                            $patologia_associada = antiInject($_POST['patologia_associada']);
                            $disfagia = antiInject($_POST['disfagia'] == 'Sim' ? 1 : 0);
                            $pirose = antiInject($_POST['pirose'] == 'Sim' ? 1 : 0);
                            $odinofagia = antiInject($_POST['odinofagia'] == 'Sim' ? 1 : 0);
                            $aspecto_fezes = antiInject($_POST['aspecto_fezes']);
                            $modificacoes_fezes = antiInject($_POST['modificacoes_fezes']);
                            $peso_habitual = antiInject($_POST['peso_habitual']);
                            $peso_atual = antiInject($_POST['peso_atual']);
                            $peso_desejavel = antiInject($_POST['peso_desejavel']);
                            $altura = antiInject($_POST['altura']);
                            $apetite_atual = antiInject($_POST['apetite_atual']);
                            $horaDesjejum = antiInject($_POST['horaDesjejum']);
                            $refeicaoDesjejum = antiInject($_POST['refeicaoDesjejum']);
                            $quantidadeDesjejum = antiInject($_POST['quantidadeDesjejum']);
                            $horaColacao = antiInject($_POST['horaColacao']);
                            $refeicaoColacao = antiInject($_POST['refeicaoColacao']);
                            $quantidadeColacao = antiInject($_POST['quantidadeColacao']);
                            $horaAlmoco = antiInject($_POST['horaAlmoco']);
                            $refeicaoAlmoco = antiInject($_POST['refeicaoAlmoco']);
                            $quantidadeAlmoco = antiInject($_POST['quantidadeAlmoco']);
                            $horaLanche = antiInject($_POST['horaLanche']);
                            $refeicaoLanche = antiInject($_POST['refeicaoLanche']);
                            $quantidadeLanche = antiInject($_POST['quantidadeLanche']);
                            $horaJantar = antiInject($_POST['horaJantar']);
                            $refeicaoJantar = antiInject($_POST['refeicaoJantar']);
                            $quantidadeJantar = antiInject($_POST['quantidadeJantar']);
                            $horaCeia = antiInject($_POST['horaCeia']);
                            $refeicaoCeia = antiInject($_POST['refeicaoCeia']);
                            $quantidadeCeia = antiInject($_POST['quantidadeCeia']);
                            $cc = antiInject($_POST['cc']);
                            $realiza_atividade_fisica = antiInject($_POST['realiza_atividade_fisica']);
                            $tipo_atividade_fisica = antiInject($_POST['tipo_atividade_fisica']);
                            $id_nutricionista = antiInject($_SESSION['id_user']);

                            if (false) {
                                echo '<div class="alert alert-info"> Os campos marcados com * são obrigatórios </div>';
                            } else {
                                $paciente = new PacienteNutricionista();
                                $consulta = new ConsultaNutricionista();
                                $avaliacaoClinica = new AvaliacaoClinica();
                                $registro = new RegistroAlimentar();
                                $avaliacaoAntropometrica = new AvaliacaoAntropometrica();
                                $caracteristicasAparelho = new CaracteristicasDoAparelhoGastrointestinal();

                                $paciente->setId($id);

                                $consulta->setDataConsulta($data);
                                $consulta->setMotivoConsulta($motivo_consulta);
                                $consulta->setInformacoesEvolucao($informacoes_evolucao);


                                $avaliacaoClinica->setPatologia($patologia);
                                $avaliacaoClinica->setPatologiaAssociada($patologia_associada);

                                $registro->setApetiteAtual($apetite_atual);
                                $registro->setAlmoco($refeicaoAlmoco, $quantidadeAlmoco, $horaAlmoco);
                                $registro->setCeia($refeicaoCeia, $quantidadeCeia, $horaCeia);
                                $registro->setColacao($refeicaoColacao, $quantidadeColacao, $horaColacao);
                                $registro->setDesjejum($refeicaoDesjejum, $quantidadeDesjejum, $horaDesjejum);
                                $registro->setJantar($refeicaoJantar, $quantidadeJantar, $horaJantar);
                                $registro->setLanche($refeicaoLanche, $quantidadeLanche, $horaLanche);

                                $avaliacaoAntropometrica->setCc($cc);
                                $avaliacaoAntropometrica->setPesoAtual($peso_atual);
                                $avaliacaoAntropometrica->setPesoDesejavel($peso_desejavel);
                                $avaliacaoAntropometrica->setPesoHabitual($peso_habitual);
                                $avaliacaoAntropometrica->setRealizaAtividadeFisica($realiza_atividade_fisica);
                                $avaliacaoAntropometrica->setTipoAtividadeFisica($tipo_atividade_fisica);
                                $avaliacaoAntropometrica->setAltura($altura);

                                $caracteristicasAparelho->setDisfagia($disfagia);
                                $caracteristicasAparelho->setPirose($pirose);
                                $caracteristicasAparelho->setAspectoFezes($aspecto_fezes);
                                $caracteristicasAparelho->setModificacoesFezes($modificacoes_fezes);
                                $caracteristicasAparelho->setOdinofagia($odinofagia);

                                $conexao = DaoNutricionista::getInstance();
                                $conexao->inserirConsulta($paciente, $consulta, $avaliacaoClinica, $registro, $avaliacaoAntropometrica, $caracteristicasAparelho, $value, $id_nutricionista);

                            }

                        }
                        ?>

                        <br>
                        <h3>Nova consulta</h3><br>

                        <form action="" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="id" id="id" value="<?php echo $value; ?>">
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="data_consulta">Data da Consulta </label> <span
                                        class="campo_obrigatorio"> *</span>
                                    <input type="text" class="form-control data" id="data_consulta" name="data_consulta"
                                           required>
                                </div>
                                <div class="form-group col-lg-8">
                                    <label for="nome">Motivo da Consulta </label> <span
                                        class="campo_obrigatorio"> *</span>
                                    <input type="text" class="form-control" id="motivo_consulta" name="motivo_consulta"
                                           required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="informacoes_evolucao">Informações da Evolução </label> <span
                                        class="campo_obrigatorio"> *</span>
                                    <textarea type="text" class="form-control" id="informacoes_evolucao"
                                              name="informacoes_evolucao" required></textarea>
                                </div>
                            </div>

                            <br>
                            <h3>Avaliação Clínica</h3><br>

                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="avaliacao_clinica">Patologia </label>
                                    <input type="text" class="form-control" id="patologia" name="patologia">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="avaliacao_clinica">Patologia Associada </label>
                                    <input type="text" class="form-control" id="patologia_associada"
                                           name="patologia_associada">
                                </div>
                            </div>

                            <br>
                            <h3>Caracteristicas do Aparelho Gastro Intestinal </h3><br>

                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="disfagia">Disgafia</label>
                                    <select class="form-control" id="disfagia" name="disfagia">
                                        <option>Sim</option>
                                        <option>Não</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="pirose">Pirose</label>
                                    <select class="form-control" id="pirose" name="pirose">
                                        <option>Sim</option>
                                        <option>Não</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="odinofagia">Odinofagia</label>
                                    <select class="form-control" id="odinofagia" name="odinofagia">
                                        <option>Sim</option>
                                        <option>Não</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="aspecto_fezes">Aspecto das fezes </label>
                                    <input type="text" class="form-control" id="aspecto_fezes" name="aspecto_fezes">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="modificacoes_fezes">Modificações das fezes </label>
                                    <input type="text" class="form-control" id="modificacoes_fezes"
                                           name="modificacoes_fezes">
                                </div>
                            </div>

                            <br>
                            <h3>Avaliação Antopométrica</h3><br>

                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="avaliacao_clinica">Peso Habitual </label>
                                    <input type="number" step="0.01" class="form-control" id="peso_habitual"
                                           name="peso_habitual">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="avaliacao_clinica">Peso Atual </label>
                                    <input type="number" step="0.01" class="form-control" id="peso_atual"
                                           name="peso_atual" onkeyup="IMC()">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="avaliacao_clinica">Peso Desejável </label>
                                    <input type="number" step="0.01" class="form-control" id="peso_desejavel"
                                           name="peso_desejavel">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="altura">Altura</label>
                                    <input type="number" step="0.01" class="form-control" id="altura" name="altura"
                                           onkeyup="IMC()">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="altura">IMC</label>
                                    <input type="number" step="0.01" class="form-control" id="imc" name="imc" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="altura">Situação corporal com base no IMC</label>
                                    <input type="text" class="form-control" id="imcResult" name="imcResult" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="altura">CC</label>
                                    <input type="text" class="form-control" id="cc" name="cc">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="realiza_atividade_fisica">Realiza Atividade Fisica </label>
                                <div class="radio">
                                    <label><input type="radio" name="realiza_atividade_fisica"
                                                  id="realiza_atividade_fisica" value="1"
                                                  onclick="MudarRealizaAtividadeFisica('1')">Sim</label>
                                </div>
                                <div class="form-group" id="campo_realiza_atividade_fisica" style="display:none;">
                                    <label>Qual tipo de atividade fisica </label>
                                    <input type="text" name="tipo_atividade_fisica" id="tipo_atividade_fisica"
                                           class="form-control" value="">
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="realiza_atividade_fisica"
                                                  id="realiza_atividade_fisica" value="0"
                                                  onclick="MudarRealizaAtividadeFisica('0')" checked>Não</label>
                                </div>
                            </div>


                            <br>
                            <h3>Registro Alimentar</h3><br>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="apetite_atual">Apetite Atual </label>
                                    <input type="text" class="form-control" id="apetite_atual" name="apetite_atual">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-2">
                                    <label></label>
                                    <h4>Desjejum</h4>
                                </div>
                                <div class="form-group col-lg-2">
                                    <label for="modificacoes_fezes">Hora </label>
                                    <input type="text" class="form-control" id="horaDesjejum" name="horaDesjejum">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="modificacoes_fezes">Refeição </label>
                                    <input type="text" class="form-control" id="refeicaoDesjejum"
                                           name="refeicaoDesjejum">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="modificacoes_fezes">Quantidade </label>
                                    <input type="text" class="form-control" id="quantidadeDesjejum"
                                           name="quantidadeDesjejum">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-2">
                                    <label></label>
                                    <h4>Colação</h4>
                                </div>
                                <div class="form-group col-lg-2">
                                    <label for="modificacoes_fezes">Hora </label>
                                    <input type="text" class="form-control" id="horaColacao" name="horaColacao">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="modificacoes_fezes">Refeição </label>
                                    <input type="text" class="form-control" id="refeicaoColacao" name="refeicaoColacao">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="modificacoes_fezes">Quantidade </label>
                                    <input type="text" class="form-control" id="quantidadeColacao"
                                           name="quantidadeColacao">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-2">
                                    <label></label>
                                    <h4>Almoço</h4>
                                </div>
                                <div class="form-group col-lg-2">
                                    <label for="modificacoes_fezes">Hora </label>
                                    <input type="text" class="form-control" id="horaAlmoco" name="horaAlmoco">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="modificacoes_fezes">Refeição </label>
                                    <input type="text" class="form-control" id="refeicaoAlmoco" name="refeicaoAlmoco">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="modificacoes_fezes">Quantidade </label>
                                    <input type="text" class="form-control" id="quantidadeAlmoco"
                                           name="quantidadeAlmoco">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-2">
                                    <label></label>
                                    <h4>Lanche</h4>
                                </div>
                                <div class="form-group col-lg-2">
                                    <label for="modificacoes_fezes">Hora </label>
                                    <input type="text" class="form-control" id="horaLanche" name="horaLanche">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="modificacoes_fezes">Refeição </label>
                                    <input type="text" class="form-control" id="refeicaoLanche" name="refeicaoLanche">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="modificacoes_fezes">Quantidade </label>
                                    <input type="text" class="form-control" id="quantidadeLanche"
                                           name="quantidadeLanche">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-2">
                                    <label></label>
                                    <h4>Jantar</h4>
                                </div>
                                <div class="form-group col-lg-2">
                                    <label for="modificacoes_fezes">Hora </label>
                                    <input type="text" class="form-control" id="horaJantar" name="horaJantar">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="modificacoes_fezes">Refeição </label>
                                    <input type="text" class="form-control" id="refeicaoJantar" name="refeicaoJantar">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="modificacoes_fezes">Quantidade </label>
                                    <input type="text" class="form-control" id="quantidadeJantar"
                                           name="quantidadeJantar">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-2">
                                    <label></label>
                                    <h4>Ceia</h4>
                                </div>
                                <div class="form-group col-lg-2">
                                    <label for="modificacoes_fezes">Hora </label>
                                    <input type="text" class="form-control" id="horaCeia" name="horaCeia">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="modificacoes_fezes">Refeição </label>
                                    <input type="text" class="form-control" id="refeicaoCeia" name="refeicaoCeia">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="modificacoes_fezes">Quantidade </label>
                                    <input type="text" class="form-control" id="quantidadeCeia" name="quantidadeCeia">
                                </div>
                            </div>


                            <input type="submit" name="finalizarConsulta" value="Finalizar Consulta"
                                   class="btn btn-primary">
                            <input type="reset" value="Limpar" class="btn btn-default">

                        </form>
                    </div>
                </div>
                <?php

                break;
            case 'edit' :
                ?>

                <div class="row">

                    <?php
                    if (isset($_POST['salvar'])) {
                        $tem_alergia_alimentar = antiInject($_POST['tem_alergia_alimentar']);
                        $tipo_alergia_alimentar = antiInject($_POST['tipo_alergia_alimentar']);
                        $tem_intolerancia_alimentar = antiInject($_POST['tem_intolerancia_alimentar']);
                        $tipo_intolerancia_alimentar = antiInject($_POST['tipo_intolerancia_alimentar']);
                        $id = antiInject($_POST['id']);


                        //VERIFICAR CONDICOES
                        if (false) {
                            echo '<div class="alert alert-info"> Os campos marcados com * são obrigatórios </div>';
                        } else {
                            $alergia = ($tem_alergia_alimentar == 1) ? $tipo_alergia_alimentar : 0;
                            $intolerancia = ($tem_intolerancia_alimentar == 1) ? $tipo_intolerancia_alimentar : 0;
                            $paciente = new PacienteNutricionista();
                            $paciente->setId($id);
                            $paciente->setTemAlergiaAlimentar($tem_alergia_alimentar);
                            $paciente->setTipoAlergiaAlimentar($alergia);
                            $paciente->setTemIntoleranciaAlimentar($tem_intolerancia_alimentar);
                            $paciente->setTipoIntoleranciaAlimentar($intolerancia);
                            $conexao = DaoNutricionista::getInstance();
                            $conexao->inserir($paciente);
                        }
                    }
                    ?>

                    <?php
                    $conexao = DaoNutricionista::getInstance();
                    $paciente = $conexao->verificaPreenchimento($value);
                    if ($paciente) {
                        $pacienteP = $conexao->listarPacienteNutricionistaID($value);
                    }
                    ?>

                    <div class="col-lg-9">

                        <h3> Alterar dados do paciente </h3><br>

                        <form action="" method="post" enctype="multipart/form-data">

                            <input type="hidden" id="id" name="id" value="<?php echo $value; ?>">
                            <div class="form-group">
                                <label for="tem_alergia_alimentar">Tem Alergia Alimentar <span
                                        class="campo_obrigatorio"> *</span> </label>
                                <div class="radio">
                                    <label><input type="radio" name="tem_alergia_alimentar" id="tem_alergia_alimentar"
                                                  value="1"
                                                  onclick="MudarTemAlergiaAlimentar('1')" <?php if ($pacienteP->tem_alergia_alimentar) {
                                            echo 'checked';
                                        } ?> >Sim</label>
                                </div>
                                <div class="form-group" id="campo_tem_alergia_alimentar" style="display:none;">
                                    <label>Alergia a que </label>
                                    <input type="text" name="tipo_alergia_alimentar" id="tipo_alergia_alimentar"
                                           class="form-control" value="<?php if ($pacienteP->tem_alergia_alimentar) {
                                        echo $pacienteP->tipo_alergia_alimentar;
                                    } ?>">
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="tem_alergia_alimentar" id="tem_alergia_alimentar"
                                                  value="0"
                                                  onclick="MudarTemAlergiaAlimentar('0')" <?php if (!$pacienteP->tem_alergia_alimentar) {
                                            echo 'checked';
                                        } ?>>Não</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tem_intolerancia_alimentar">Tem Intolerancia Alimentar <span
                                        class="campo_obrigatorio"> *</span> </label>
                                <div class="radio">
                                    <label><input type="radio" name="tem_intolerancia_alimentar"
                                                  id="tem_intolerancia_alimentar" value="1"
                                                  onclick="MudarTemIntoleranciaAlimentar('1')" <?php if ($pacienteP->tem_intolerancia_alimentar) {
                                            echo 'checked';
                                        } ?> >Sim</label>
                                </div>
                                <div class="form-group" id="campo_tem_intolerancia_alimentar" style="display:none;">
                                    <label>Intolerancia a que </label>
                                    <input type="text" name="tipo_intolerancia_alimentar"
                                           id="tipo_intolerancia_alimentar" class="form-control"
                                           value="<?php if ($pacienteP->tem_intolerancia_alimentar) {
                                               echo $pacienteP->tipo_intolerancia_alimentar;
                                           } ?>">
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="tem_intolerancia_alimentar"
                                                  id="tem_intolerancia_alimentar" value="0"
                                                  onclick="MudarTemIntoleranciaAlimentar('0')" <?php if (!$pacienteP->tem_intolerancia_alimentar) {
                                            echo 'checked';
                                        } ?>>Não</label>
                                </div>
                            </div>

                            <input type="submit" name="salvar" value="Alterar" class="btn btn-primary"'>
                            <a class='btn btn-default' href='<?php echo PATH ?>/nutricionista/list/'> Cancelar </a>

                        </form>

                    </div>
                </div>

                <?php
                break;
            case 'profile' :
                ?>

                <?php
                $conexao = DaoNutricionista::getInstance();
                $conexaoP = DaoPaciente::getInstance();
                $paciente = $conexaoP->listarPorID($value);
                if ($paciente) {
                    $nutricionista = $conexao->listarPacienteNutricionistaID($value);
                }
                ?>

                <div class="row">

                    <div class="col-lg-9">

                        <h3> Perfil Paciente </h3>

                        <form>

                            <div class="form-group">
                                <label for="nome">Nome </label>
                                <input type="text" class="form-control" id="nome" name="nome"
                                       value="<?php echo $paciente->nome_paciente ?>" disabled>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-10">
                                    <label for="rua">Rua </label>
                                    <input type="text" class="form-control" id="rua" name="rua"
                                           value="<?php echo $paciente->rua ?>" disabled>
                                </div>
                                <div class="form-group col-lg-2">
                                    <label for="numero">Número </label>
                                    <input type="text" class="form-control" id="numero" name="numero"
                                           value="<?php echo $paciente->numero ?>" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="nascimento">Data de Nascimento </label>
                                    <input type="text" class="form-control" id="nascimento" name="nascimento"
                                           value="<?php echo $paciente->nascimento ?>" disabled>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="telefone">Telefone </label>
                                    <input type="text" class="form-control" id="telefone" name="telefone"
                                           value="<?php echo $paciente->telefone ?>" disabled>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="celular">Celular </label>
                                    <input type="text" class="form-control" id="celular" name="celular"
                                           value="<?php echo $paciente->celular ?>" disabled>
                                </div>
                            </div>
                            <label> Sexo </label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="sexo" value="M"
                                           disabled <?php if ($paciente->sexo == 'M') echo checked ?>>
                                    Masculino
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="sexo" value="F"
                                           disabled <?php if ($paciente->sexo == 'F') echo checked ?>>
                                    Feminino
                                </label>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="cpf">CPF </label>
                                    <input type="text" class="form-control" id="cpf" name="cpf"
                                           value="<?php echo $paciente->cpf ?>" disabled>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="rg">RG </label>
                                    <input type="text" class="form-control" id="rg" name="rg"
                                           value="<?php echo $paciente->rg ?>" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label>Status</label>
                                    <select class="form-control" name="status" disabled>
                                        <option> <?php echo $paciente->status ?> </option>
                                    </select>
                                </div>
                            </div>
                            <?php
                            $conexaoP = DaoNutricionista::getInstance();
                            $preenchimento = $conexaoP->verificaPreenchimento($paciente->id_paciente);
                            if ($preenchimento) {
                                if ($nutricionista->tem_alergia_alimentar) {
                                    echo "<br><label for='tem_alergia_alimentar'>Alergia Alimentar</label>";
                                    echo "<input type='text' name='tipo_alergia_alimentar' id='tipo_alergia_alimentar' class='form-control' value='$nutricionista->tipo_alergia_alimentar' disabled><br>";
                                } else {
                                    echo "<br><label for='tem_alergia_alimentar'><span class='campo_obrigatorio'>Não tem nenhum tipo de alergia alimentar</span></label><br>";
                                }

                                if ($nutricionista->tem_intolerancia_alimentar) {
                                    echo "<br><label for='tem_intolerancia_alimentar'>Intolerancia Alimentar</label>";
                                    echo "<input type='text' name='tem_intolerancia_alimentar' id='tem_intolerancia_alimentar' class='form-control' value='$nutricionista->tipo_intolerancia_alimentar' disabled><br>";
                                } else {
                                    echo "<br><label for='tem_intolerancia_alimentar'><span class='campo_obrigatorio'>Não necessita de cesta básica</span></label><br>";
                                }
                            } else {
                                echo '<div class="alert alert-warning"> Preenchimento não realizado </div>';
                            }
                            ?>

                        </form>

                    </div>

                </div>
                <?php
                break;
            case 'list' :
                ?>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table cellspacing="0" class="table table-hover table-responsive" width="100%" id="tabela">
                                <thead>
                                <tr>
                                    <th> Nome</th>
                                    <th> Retornos</th>
                                    <th> Ultima Consulta</th>
                                    <th> Preenchimento</th>
                                    <th> Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $conexao = DaoPaciente::getInstance();
                                $pacientes = $conexao->listarTodos();
                                foreach ($pacientes as $paciente) {
                                    $conexaoP = DaoNutricionista::getInstance();
                                    $preenchimento = $conexaoP->verificaPreenchimento($paciente->id_paciente);
                                    $retornos = $conexaoP->retornos($paciente->id_paciente);
                                    $ultimaConsulta = $conexaoP->ultimaConsulta($paciente->id_paciente);
                                    ?>
                                    <tr>
                                        <td> <?php echo $paciente->nome_paciente ?> </td>
                                        <td> <?php echo $retornos ?> </td>
                                        <td> <?php echo $ultimaConsulta->data_consulta ?> </td>
                                        <td> <?php
                                            if ($preenchimento) {
                                                echo "<span class='glyphicon glyphicon-ok'
                                                                                aria-hidden='true'> </span>";
                                            } else {
                                                echo "<span class='glyphicon glyphicon-remove'
                                                                                aria-hidden='true'> </span>";
                                            }
                                            ?> </td>
                                        <td>
                                            <a href="<?php echo PATH ?>/nutricionista/profile/<?php echo $paciente->id_paciente ?>"
                                               class="btn btn-info"
                                               title="Ver perfil"><span class="glyphicon glyphicon-user icone_list"
                                                                        aria-hidden="true"> </span> </a>
                                            <a href="<?php echo PATH ?>/nutricionista/edit/<?php echo $paciente->id_paciente ?>"
                                               class="btn btn-primary"
                                               title="Editar perfil"> <span
                                                    class="glyphicon glyphicon-pencil icone_list"
                                                    aria-hidden="true"> </span> </a>
                                            <a href="<?php echo PATH ?>/nutricionista/consult/<?php echo $paciente->id_paciente ?>"
                                               class="btn btn-primary"
                                               title="Listar consultas"> <span
                                                    class="glyphicon glyphicon-list"
                                                    aria-hidden="true"> </span> </a>
                                            <a href="<?php echo PATH ?>/nutricionista/arquivo/<?php echo $paciente->id_paciente ?>"
                                               class="btn btn-primary"
                                               title="Listar consultas"> <span
                                                    class="glyphicon glyphicon-file"
                                                    aria-hidden="true"> </span> </a>
                                            <a href="<?php echo PATH ?>/nutricionista/del/<?php echo $paciente->id_paciente ?>"
                                               class="btn btn-danger"
                                               title="Deletar perfil"> <span
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

            case 'del' :

                if (isset($value) && is_numeric($value)) {
                    $conexao = DaoPaciente::getInstance();
                    $conexaoP = DaoNutricionista::getInstance();
                    $paciente = $conexao->listarPorID($value);

                    if (isset($_POST['deletar'])) {
                        $id = antiInject($_POST['id_paciente']);
                        $conexaoP->deletar($id);
                    }


                    echo "
                            <div class='col-lg-9'>
        
                                <div class='row'>
                                    <h3> Deletar Paciente </h3>
        
                                    <br>
        
                                    <form action='' method='post'>
                                        <input type='hidden' class='form-control' name='id_paciente' value='$paciente->id_paciente'>
                                        <div class='row'>
                                            <div class='form-group col-lg-8'>
                                                <label>Nome</label>
                                                <input type='text' class='form-control' name='nome_paciente' value='$paciente->nome_paciente' disabled>
                                            </div>
                                        </div>
        
                                        <button class = 'btn btn-primary' name='deletar'>Deletar</button>
                                        <a class='btn btn-default' href='" . PATH . "/nutricionista/list/'>Cancelar</a>
                                    </form>
                                </div>
        
                            </div>";

                } else {
                    echo '<div class="alert alert-danger"> Deve-se passar um ID </div>';
                }

                break;
            case 'apagarConsultas':

                if (isset($value) && is_numeric($value)) {
                    $conexao = DaoPaciente::getInstance();
                    $conexaoP = DaoNutricionista::getInstance();
                    $paciente = $conexao->listarPorID($value);

                    if (isset($_POST['deletar'])) {
                        $id = antiInject($_POST['id_paciente']);
                        $conexaoP->deletarConsultas($id);
                    }


                    echo "
                        <div class='col-lg-9'>
        
                            <div class='row'>
                                <h3> Apagar todas consultas </h3>
        
                                <br>
        
                                <form action='' method='post'>
                                    <input type='hidden' class='form-control' name='id_paciente' value='$paciente->id_paciente'>
                                    <div class='row'>
                                        <div class='form-group col-lg-8'>
                                            <label>Consultas do paciente</label>
                                            <input type='text' class='form-control' name='nome_paciente' value='$paciente->nome_paciente' disabled>
                                        </div>
                                    </div>
        
                                    <button class = 'btn btn-primary' name='deletar'>Deletar</button>
                                    <a class='btn btn-default' href='" . PATH . "/nutricionista/list/'>Cancelar</a>
                                </form>
                            </div>
        
                        </div>";

                } else {
                    echo '<div class="alert alert-danger"> Deve-se passar um ID </div>';
                }
                break;
            case 'arquivo':
                $conexao = DaoNutricionista::getInstance();
                $resultado = $conexao->obterArquivo(antiInject($value));
                if (isset($_POST['salvar'])){
                    $conexao = DaoNutricionista::getInstance();
                    $arquivo = $conexao->atualizaArquivo(antiInject($value), antiInject($_POST['arquivo']));
                }
                ?>
                    <div class="row">
                        <h3> Anotações </h3>
                        <form method="post" name="form-arquivo">
                            <textarea name="arquivo" rows="10" cols="100"><?php echo $resultado->arquivo; ?></textarea></br></br>
                            <input type="submit" value="Salvar" class="btn btn-success" name="salvar">
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
    function MudarTemAlergiaAlimentar(el) {
        var display = document.getElementById('campo_tem_alergia_alimentar').style.display;
        if (display == "none" && el == 1)
            document.getElementById('campo_tem_alergia_alimentar').style.display = 'block';
        else if (display == "block" && el == 0)
            document.getElementById('campo_tem_alergia_alimentar').style.display = 'none';
    }
</script>

<script>
    function MudarTemIntoleranciaAlimentar(el) {
        var display = document.getElementById('campo_tem_intolerancia_alimentar').style.display;
        if (display == "none" && el == 1)
            document.getElementById('campo_tem_intolerancia_alimentar').style.display = 'block';
        else if (display == "block" && el == 0)
            document.getElementById('campo_tem_intolerancia_alimentar').style.display = 'none';
    }
</script>

<script>
    function MudarRealizaAtividadeFisica(el) {
        var display = document.getElementById('campo_realiza_atividade_fisica').style.display;
        if (display == "none" && el == 1)
            document.getElementById('campo_realiza_atividade_fisica').style.display = 'block';
        else if (display == "block" && el == 0)
            document.getElementById('campo_realiza_atividade_fisica').style.display = 'none';
    }
</script>

<script>
    function IMC() {
        var peso = document.getElementById('peso_atual').value;
        var altura = document.getElementById('altura').value;
        var imc = peso / (altura * altura);
        document.getElementById('imc').value = parseFloat(imc.toFixed(2));
        ImcResult();
    }
</script>

<script>
    function ImcResult() {
        var imc = document.getElementById('imc').value;
        document.getElementById('imcResult').checked;
        if (imc < 16) {
            document.getElementById('imcResult').value = "Baixo peso muito grave";
        } else if (imc >= 16 && imc < 17) {
            document.getElementById('imcResult').value = "Baixo peso grave";
        } else if (imc >= 17 && imc < 18.50) {
            document.getElementById('imcResult').value = "Baixo peso";
        } else if (imc >= 18.50 && imc < 25) {
            document.getElementById('imcResult').value = "Peso normal";
        } else if (imc >= 25 && imc < 30) {
            document.getElementById('imcResult').value = "Sobrepeso";
        } else if (imc >= 30 && imc < 35) {
            document.getElementById('imcResult').value = "Obesidade grau I";
        } else if (imc >= 35 && imc < 40) {
            document.getElementById('imcResult').value = "Obesidade grau II";
        } else {
            document.getElementById('imcResult').value = "Obesidade grau III (obesidade mórbida)";
        }

    }
</script>