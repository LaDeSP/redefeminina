<?php
if (!isAdmin() && !isFisioterapeuta()) {
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
                    Fisioterapeuta
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="glyphicon glyphicon-th"></i> <a href="<?php echo PATH ?>"> Inicío </a>
                    </li>
                    <li class="active">
                        <i class="glyphicon glyphicon-heart"></i> Fisioterapeuta
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <a href="<?php echo PATH ?>/fisioterapeuta/list" class="btn btn-info"> Listar Pacientes </a>
            </div>
        </div>

        <br>

        <?php
        switch ($action) {
            case 'delConsulta':

                $conexao = DaoFisioterapeuta::getInstance();
                $consulta = $conexao->listarConsultasID($value);

                if (isset($_POST['deletar'])) {
                    $id = antiInject($_POST['id_consulta_fisio']);
                    $conexao->deletarConsulta($id);
                }


                echo "
                 <div class='col-lg-9'>

                    <div class='row'>
                        <form action='' method='post'>

                            <h3> Deletar Consulta </h3>

                            <br>

                            <input type='hidden' class='form-control' name='id_consulta_fisio' value='$consulta->id'>

                            <div class='row'>
                                <div class='form-group col-lg-8'>
                                    <label>Data da Consulta</label>
                                    <input type='text' class='form-control' name='nome_paciente' value='$consulta->data_consulta' disabled>
                                </div>
                            </div>

                            <button class = 'btn btn-primary' name='deletar'>Deletar</button>
                            <a class='btn btn-default' href='" . PATH . "/fisioterapeuta/list/'>Cancelar</a>
                        </form>
                    </div>

                 </div>";

                ?>

                <?php
            case 'mostrarConsulta':
                $conexao = DaoFisioterapeuta::getInstance();
                $consulta = $conexao->listarConsultasID($value);
                ?>


                <br><h3>Consulta</h3><br>
                <br><h3>Antecedentes Familiares</h3><br>

                <div class="form-group">
                    <label for="casos_cancer">Data da consulta</label>
                    <input type="text" class="form-control" id="radioterapia_inicio" name="radioterapia_inicio"
                           value="<?php echo $consulta->data_consulta; ?>" disabled>
                </div>

                <div class="form-group">
                    <label for="casos_cancer">Motivo da Consulta </label>
                    <input type="text" class="form-control" id="radioterapia_inicio" name="radioterapia_inicio"
                           value="<?php echo $consulta->motivo_consulta; ?>" disabled>
                </div>

                <div class="form-group">
                    <label for="casos_cancer">Queixa Principal </label>
                    <input type="text" class="form-control" id="radioterapia_inicio" name="radioterapia_inicio"
                           value="<?php echo $consulta->queixa_principal; ?>" disabled>
                </div>

                <div class="form-group">
                    <label for="casos_cancer">Historia Doença </label>
                    <input type="text" class="form-control" id="radioterapia_inicio" name="radioterapia_inicio"
                           value="<?php echo $consulta->historia_doenca; ?>" disabled>
                </div>

                <h3>Histórico terapias</h3><br>

                <div class="row">
                    <div class="form-group col-lg-2">
                        <label></label>
                        <h5>Radioterapia</h5>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="radioterapia_inicio">Inicio </label>
                        <input type="text" class="form-control" id="radioterapia_inicio" name="radioterapia_inicio"
                               value="<?php echo $consulta->radioterapia_inicio; ?>" disabled>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="radioterapia_final">Final </label>
                        <input type="text" class="form-control" id="radioterapia_final" name="radioterapia_final"
                               value="<?php echo $consulta->radioterapia_final; ?>" disabled>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="radioterapia_sessoes">Nº Sessões </label>
                        <input type="text" class="form-control" id="radioterapia_sessoes" name="radioterapia_sessoes"
                               value="<?php echo $consulta->radioterapia_sessoes; ?>" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-2">
                        <label></label>
                        <h5>Quimioterapia</h5>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="radioterapia_inicio">Inicio </label>
                        <input type="text" class="form-control" id="quimioterapia_inicio" name="quimioterapia_inicio"
                               value="<?php echo $consulta->quimioterapia_inicio; ?>" disabled>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="radioterapia_final">Final </label>
                        <input type="text" class="form-control" id="quimioterapia_final" name="quimioterapia_final"
                               value="<?php echo $consulta->quimioterapia_final; ?>" disabled>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="quimioterapia_sessoes">N Sessões </label>
                        <input type="text" class="form-control" id="quimioterapia_sessoes" name="quimioterapia_sessoes"
                               value="<?php echo $consulta->quimioterapia_sessoes; ?>" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-2">
                        <label></label>
                        <h5>Hormonioterapia</h5>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="hormonioterapia_inicio">Inicio </label>
                        <input type="text" class="form-control" id="hormonioterapia_inicio"
                               name="hormonioterapia_inicio"
                               value="<?php echo $consulta->hormonioterapia_inicio; ?>" disabled>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="hormonioterapia_final">Final </label>
                        <input type="text" class="form-control" id="hormonioterapia_final" name="hormonioterapia_final"
                               value="<?php echo $consulta->hormonioterapia_final; ?>" disabled>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="hormonioterapia_sessoes">N Sessões </label>
                        <input type="text" class="form-control" id="hormonioterapia_sessoes"
                               name="hormonioterapia_sessoes"
                               value="<?php echo $consulta->hormonioterapia_sessoes; ?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="observacao">Obs: </label>
                        <input type="text" class="form-control" id="observacao" name="observacao"
                               value="<?php echo $consulta->observacao; ?>" disabled>
                    </div>
                </div><br>


                <br><h3>Exame Físico e Avaliação Postual</h3><br>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="cabeca">Cabeça</label>
                        <input type="text" class="form-control" value="<?php echo $consulta->cabeca; ?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="ombros">Ombros</label>
                        <input type="text" class="form-control" value="<?php echo $consulta->ombros; ?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="dorso">Dorso</label>
                        <input type="text" class="form-control" value="<?php echo $consulta->dorso; ?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="lombar">Lombar</label>
                        <input type="text" class="form-control" value="<?php echo $consulta->lombar; ?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="perve">Pelve</label>
                        <input type="text" class="form-control" value="<?php echo $consulta->perve; ?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="joelhos">Joelhos</label>
                        <input type="text" class="form-control" value="<?php echo $consulta->joelhos; ?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="pes">Pés</label>
                        <input type="text" class="form-control" value="<?php echo $consulta->pes; ?>" disabled>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="conclusao">Conclusão </label>
                        <input type="text" class="form-control" value="<?php echo $consulta->conclusao; ?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="tipo_marcha">Tipo de Marcha </label>
                        <input type="text" class="form-control" value="<?php echo $consulta->tipo_marcha; ?>" disabled>
                    </div>
                </div>

                <br><h3> Inspeção e palpação da cicatriz cirúrgica </h3><br>

                <div class="form-group">
                    <label for="casos_cancer">Dor </label>
                    <?php
                    if ($consulta->dor) {
                        echo "<input type='text' class='form-control' value='$consulta->local_dor' disabled><br>";
                    } else {
                        echo "<input type='text' class='form-control' value='Não possui' disabled>";
                    } ?>
                </div>

                <div class="form-group">
                    <label for="casos_cancer">Aderências </label>
                    <?php
                    if ($consulta->aderencias) {
                        echo "<input type='text' class='form-control' value='$consulta->local_aderencias' disabled><br>";
                    } else {
                        echo "<input type='text' class='form-control' value='Não possui' disabled>";
                    } ?>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="outros">Outros (espessamento, coloração, temperatura ...) </label>
                        <input type="text" class="form-control" value="<?php echo $consulta->outros; ?>" disabled>
                    </div>
                </div>

                <br><h3> Sensibilidade </h3><br>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="sensibilidade">Superficial (tátil, térmica, dolorosa)</label>
                        <input type="text" class="form-control" value="<?php echo $consulta->sensibilidade; ?>"
                               disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="localizacao">Localização e observações: </label>
                        <input type="text" class="form-control" value="<?php echo $consulta->localizacao; ?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="profunda">Profunda(Posição MS no pescoço) </label>
                        <input type="text" class="form-control" value="<?php echo $consulta->profunda; ?>" disabled>
                    </div>
                </div>

                <br><h3> Linfedema </h3><br>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="linfedema_quando">Desde quando? </label>
                        <input type="text" class="form-control" value="<?php echo $consulta->linfedema_quando; ?>"
                               disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="linfedema_caracteristicas">Caracteristicas </label>
                        <input type="text" class="form-control"
                               value="<?php echo $consulta->linfedema_caracteristicas; ?>"
                               disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="linfedema_localizacao">Localização </label>
                        <input type="text" class="form-control" value="<?php echo $consulta->linfedema_localizacao; ?>"
                               disabled>
                    </div>
                </div>

                <br><h3> Hábitos posturais(corretos e incorretos) Obs: Prestar orientações </h3><br>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="habitos_sentar">Sentar </label>
                        <input type="text" class="form-control" value="<?php echo $consulta->habitos_sentar; ?>"
                               disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="habitos_deitar_levantar">Deitar/Levantar </label>
                        <input type="text" class="form-control"
                               value="<?php echo $consulta->habitos_deitar_levantar; ?>"
                               disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="habitos_dormir">Dormir </label>
                        <input type="text" class="form-control" value="<?php echo $consulta->habitos_dormir; ?>"
                               disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="parecer_fisioterapico">Parecer Fisioterápico </label>
                        <input type="text" class="form-control" value="<?php echo $consulta->parecer_fisioterapico; ?>"
                               disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="conduta">Conduta </label>
                        <input type="text" class="form-control" value="<?php echo $consulta->conduta; ?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="data_orientacao">Data Orientação </label>
                        <input type="text" class="form-control" value="<?php echo $consulta->data_orientacao; ?>"
                               disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="orientacao">Orientações </label>
                        <input type="text" class="form-control" value="<?php echo $consulta->orientacao; ?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="evolucao">Evolução </label>
                        <input type="text" class="form-control" value="<?php echo $consulta->evolucao; ?>" disabled>
                    </div>
                </div>

                <?php

                break;
            case 'consult':
                ?>

                <div class=".col-md-3 .col-md-offset-3" align="right">
                    <a href="<?php echo PATH ?>/fisioterapeuta/addConsult/<?php echo $value; ?>"
                       class="btn btn-primary"
                       title="Nova Consulta"> Nova Consulta </a>
                    <a href="<?php echo PATH ?>/fisioterapeuta/apagarConsultas/<?php echo $value; ?>"
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
                                    <th> Data da Consulta</th>
                                    <th> Motivo Consulta</th>
                                    <th> Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $conexao = DaoFisioterapeuta::getInstance();
                                $consultas = $conexao->listarConsultas($value);
                                foreach ($consultas as $consulta) {
                                    ?>
                                    <tr>
                                        <td> <?php echo $consulta->data_consulta ?> </td>
                                        <td> <?php echo $consulta->motivo_consulta ?> </td>
                                        <td>
                                            <a href="<?php echo PATH ?>/fisioterapeuta/mostrarConsulta/<?php echo $consulta->id ?>"
                                               class="btn btn-info"
                                               title="Ver Consulta"><span class="glyphicon glyphicon-user icone_list"
                                                                          aria-hidden="true"> </span> </a>
                                            <a href="<?php echo PATH ?>/fisioterapeuta/delConsulta/<?php echo $consulta->id ?>"
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
                    <div class="col-lg-12">
                        <?php
                        if (isset($_POST['finalizarConsulta'])) {
                            $id = antiInject($_POST['id']);
                            $data_consulta = antiInject($_POST['data_consulta']);
                            $motivo_consulta = antiInject($_POST['motivo_consulta']);
                            $queixa_principal = antiInject($_POST['queixa_principal']);
                            $historia_doenca = antiInject($_POST['historia_doenca_atual']);

                            $radioterapia_inicio = antiInject($_POST['radioterapia_inicio']);
                            $radioterapia_final = antiInject($_POST['radioterapia_final']);
                            $radioterapia_sessoes = antiInject($_POST['radioterapia_sessoes']);
                            $quimioterapia_inicio = antiInject($_POST['quimioterapia_inicio']);
                            $quimioterapia_final = antiInject($_POST['quimioterapia_final']);
                            $quimioterapia_sessoes = antiInject($_POST['quimioterapia_sessoes']);
                            $hormonioterapia_inicio = antiInject($_POST['hormonioterapia_inicio']);
                            $hormonioterapia_final = antiInject($_POST['hormonioterapia_final']);
                            $hormonioterapia_sessoes = antiInject($_POST['hormonioterapia_sessoes']);
                            $observacao = antiInject($_POST['observacao']);

                            $cabeca = antiInject($_POST['cabeca']);
                            $ombros = antiInject($_POST['ombros']);
                            $dorso = antiInject($_POST['dorso']);
                            $lombar = antiInject($_POST['lombar']);
                            $perve = antiInject($_POST['perve']);
                            $joelhos = antiInject($_POST['joelhos']);
                            $pes = antiInject($_POST['pes']);
                            $conclusao = antiInject($_POST['conclusao']);
                            $tipo_marcha = antiInject($_POST['tipo_marcha']);
                            $dor = antiInject($_POST['dor']);
                            $local_dor = antiInject($_POST['dor_local']);
                            $aderencias = antiInject($_POST['aderencias']);
                            $local_aderencias = antiInject($_POST['aderencias_local']);
                            $outros = antiInject($_POST['outros']);
                            $sensibilidade = antiInject($_POST['sensibilidade']);
                            $localizacao = antiInject($_POST['localizacao']);
                            $profunda = antiInject($_POST['profunda']);
                            $linfedema_quando = antiInject($_POST['linfedema_quando']);
                            $linfedema_caracteristicas = antiInject($_POST['linfedema_caracteristicas']);
                            $linfedema_localizacao = antiInject($_POST['linfedema_localizacao']);
                            $habitos_sentar = antiInject($_POST['habitos_sentar']);
                            $habitos_deitar_levantar = antiInject($_POST['habitos_deitar_levantar']);
                            $habitos_dormir = antiInject($_POST['habitos_dormir']);
                            $parecer_fisioterapico = antiInject($_POST['parecer_fisioterapico']);
                            $conduta = antiInject($_POST['conduta']);
                            $data_orientacao = antiInject($_POST['data_orientacao']);
                            $orientacao = antiInject($_POST['orientacao']);
                            $evolucao = antiInject($_POST['evolucao']);

                            if (false) {
                                echo '<div class="alert alert-info"> Os campos marcados com * são obrigatórios </div>';
                            } else {
                                $paciente = new ConsultaFisioterapeuta($id, $data_consulta, $motivo_consulta, $queixa_principal, $historia_doenca, $radioterapia_inicio,
                                    $radioterapia_final, $radioterapia_sessoes, $quimioterapia_inicio, $quimioterapia_final, $quimioterapia_sessoes, $hormonioterapia_inicio,
                                    $hormonioterapia_final, $hormonioterapia_sessoes, $observacao, $cabeca, $ombros, $dorso, $lombar, $perve, $joelhos, $pes, $conclusao, $tipo_marcha, $dor, $local_dor, $aderencias, $local_aderencias,
                                    $outros, $sensibilidade, $localizacao, $profunda, $linfedema_quando, $linfedema_caracteristicas, $linfedema_localizacao, $habitos_sentar,
                                    $habitos_deitar_levantar, $habitos_dormir, $parecer_fisioterapico, $conduta, $data_orientacao, $orientacao, $evolucao);

                                $conexao = DaoFisioterapeuta::getInstance();
                                $conexao->inserirConsulta($paciente);
                            }

                        }
                        ?>

                        <br>
                        <h3>Nova Consulta</h3><br>

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
                                    <label for="queixa_principal">Queixa Principal </label> <span
                                        class="campo_obrigatorio"> *</span>
                                    <input type="text" class="form-control" id="queixa_principal"
                                           name="queixa_principal" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="historia_doenca_atual">Historia da doença atual </label>
                                    <input type="text" class="form-control" id="historia_doenca_atual"
                                           name="historia_doenca_atual">
                                </div>
                            </div>


                            <h3>Histórico terapias</h3><br>

                            <div class="row">
                                <div class="form-group col-lg-2">
                                    <label></label>
                                    <h5>Radioterapia</h5>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="radioterapia_inicio">Inicio </label>
                                    <input type="text" class="form-control" id="radioterapia_inicio"
                                           name="radioterapia_inicio">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="radioterapia_final">Final </label>
                                    <input type="text" class="form-control" id="radioterapia_final"
                                           name="radioterapia_final">
                                </div>
                                <div class="form-group col-lg-2">
                                    <label for="radioterapia_sessoes">Nº Sessões </label>
                                    <input type="text" class="form-control" id="radioterapia_sessoes"
                                           name="radioterapia_sessoes">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-2">
                                    <label></label>
                                    <h5>Quimioterapia</h5>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="radioterapia_inicio">Inicio </label>
                                    <input type="text" class="form-control" id="quimioterapia_inicio"
                                           name="quimioterapia_inicio">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="radioterapia_final">Final </label>
                                    <input type="text" class="form-control" id="quimioterapia_final"
                                           name="quimioterapia_final">
                                </div>
                                <div class="form-group col-lg-2">
                                    <label for="quimioterapia_sessoes">Nº Sessões </label>
                                    <input type="text" class="form-control" id="quimioterapia_sessoes"
                                           name="quimioterapia_sessoes">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-2">
                                    <label></label>
                                    <h5>Hormonioterapia</h5>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="hormonioterapia_inicio">Inicio </label>
                                    <input type="text" class="form-control" id="hormonioterapia_inicio"
                                           name="hormonioterapia_inicio">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="hormonioterapia_final">Final </label>
                                    <input type="text" class="form-control" id="hormonioterapia_final"
                                           name="hormonioterapia_final">
                                </div>
                                <div class="form-group col-lg-2">
                                    <label for="hormonioterapia_sessoes">Nº Sessões </label>
                                    <input type="text" class="form-control" id="hormonioterapia_sessoes"
                                           name="hormonioterapia_sessoes">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="observacao">Obs: </label>
                                    <input type="text" class="form-control" id="observacao" name="observacao">
                                </div>
                            </div>
                            <br>


                            <br>
                            <h3>Exame Físico e Avaliação Postual</h3><br>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="cabeca">Cabeça</label>
                                    <select class="form-control" id="cabeca" name="cabeca">
                                        <option></option>
                                        <option>Posteriorizada e/ou hiperlordose cervical</option>
                                        <option>Anteriorizada e/ou retificação cervical</option>
                                        <option>Ambos</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="ombros">Ombros</label>
                                    <select class="form-control" id="ombros" name="ombros">
                                        <option></option>
                                        <option>Posteriorizados ou elevados</option>
                                        <option>Anteriorizados ou enrolados</option>
                                        <option>Ambos</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="dorso">Dorso</label>
                                    <select class="form-control" id="dorso" name="dorso">
                                        <option></option>
                                        <option>Retificado</option>
                                        <option>Cifosado</option>
                                        <option>Ambos</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="lombar">Lombar</label>
                                    <select class="form-control" id="lombar" name="lombar">
                                        <option></option>
                                        <option>Hiperlordose</option>
                                        <option>Retificação</option>
                                        <option>Ambos</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="perve">Pelve</label>
                                    <select class="form-control" id="perve" name="perve">
                                        <option></option>
                                        <option>Ateversão</option>
                                        <option>Retroversão</option>
                                        <option>Ambos</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="joelhos">Joelhos</label>
                                    <select class="form-control" id="joelhos" name="joelhos">
                                        <option></option>
                                        <option>Tend. a heperex. e/ou varismo e/ou RE</option>
                                        <option>Tend. flexão e/ou valgismo e/ou RI</option>
                                        <option>Ambos</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="pes">Pés</label>
                                    <select class="form-control" id="pes" name="pes">
                                        <option></option>
                                        <option>Retro varo e/ou antepé varo</option>
                                        <option>Retro valgo e/ou antepé varo</option>
                                        <option>Ambos</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="conclusao">Conclusão </label>
                                    <input type="text" class="form-control" id="conclusao" name="conclusao">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="tipo_marcha">Tipo de Marcha </label>
                                    <input type="text" class="form-control" id="tipo_marcha" name="tipo_marcha">
                                </div>
                            </div>

                            <br>
                            <h3> Inspeção e palpação da cicatriz cirúrgica </h3><br>

                            <div class="form-group">
                                <label for="casos_cancer">Dor </label>
                                <div class="radio">
                                    <label><input type="radio" name="dor" id="dor" value="1" onclick="MudarDor('1')">Sim</label>
                                </div>
                                <div class="form-group" id="dor_local" style="display:none;">
                                    <label>Local </label>
                                    <input type="text" name="dor_local" id="dor_local" class="form-control"
                                           value=""><br>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="dor" id="dor" value="0" onclick="MudarDor('0')">Não</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="casos_cancer">Aderências </label>
                                <div class="radio">
                                    <label><input type="radio" name="aderencias" id="aderencias" value="1"
                                                  onclick="MudarAderencias('1')">Sim</label>
                                </div>
                                <div class="form-group" id="aderencias_local" style="display:none;">
                                    <label>Local </label>
                                    <input type="text" name="aderencias_local" id="aderencias_local"
                                           class="form-control"
                                           value=""><br>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="aderencias" id="aderencias" value="0"
                                                  onclick="MudarAderencias('0')">Não</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="outros">Outros (espessamento, coloração, temperatura ...) </label>
                                    <input type="text" class="form-control" id="outros" name="outros">
                                </div>
                            </div>

                            <br>
                            <h3> Sensibilidade </h3><br>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="sensibilidade">Superficial (tátil, térmica, dolorosa)</label>
                                    <select class="form-control" id="sensibilidade" name="sensibilidade">
                                        <option></option>
                                        <option>Aumentada</option>
                                        <option>Diminuida</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="localizacao">Localização e observações: </label>
                                    <input type="text" class="form-control" id="localizacao" name="localizacao">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="profunda">Profunda(Posição MS no pescoço) </label>
                                    <input type="text" class="form-control" id="profunda" name="profunda">
                                </div>
                            </div>

                            <br>
                            <h3> Linfedema </h3><br>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="linfedema_quando">Desde quando? </label>
                                    <input type="text" class="form-control" id="linfedema_quando"
                                           name="linfedema_quando">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="linfedema_caracteristicas">Caracteristicas </label>
                                    <input type="text" class="form-control" id="linfedema_caracteristicas"
                                           name="linfedema_caracteristicas">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="linfedema_localizacao">Localização </label>
                                    <input type="text" class="form-control" id="linfedema_localizacao"
                                           name="linfedema_localizacao">
                                </div>
                            </div>

                            <br>
                            <h3> Hábitos posturais(corretos e incorretos) Obs: Prestar orientações </h3><br>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="habitos_sentar">Sentar </label>
                                    <input type="text" class="form-control" id="habitos_sentar" name="habitos_sentar">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="habitos_deitar_levantar">Deitar/Levantar </label>
                                    <input type="text" class="form-control" id="habitos_deitar_levantar"
                                           name="habitos_deitar_levantar">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="habitos_dormir">Dormir </label>
                                    <input type="text" class="form-control" id="habitos_dormir" name="habitos_dormir">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="parecer_fisioterapico">Parecer Fisioterápico </label>
                                    <input type="text" class="form-control" id="parecer_fisioterapico"
                                           name="parecer_fisioterapico">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="conduta">Conduta </label>
                                    <input type="text" class="form-control" id="conduta" name="conduta">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="data_orientacao">Data Orientação </label>
                                    <input type="text" class="form-control data" id="data_orientacao" name="data_orientacao">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="orientacao">Orientações </label>
                                    <input type="text" class="form-control" id="orientacao" name="orientacao">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="evolucao">Evolução </label>
                                    <textarea class="form-control" id="evolucao"
                                              name="evolucao">Insira o texto aqui</textarea>
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
            case 'profile' :
                ?>

                <?php
                $conexao = DaoFisioterapeuta::getInstance();
                $conexaoP = DaoPaciente::getInstance();
                $paciente = $conexaoP->listarPorID($value);
                if ($paciente) {
                    $fisio = $conexao->listarPacienteFisioID($value);
                    $preenchimento = $conexao->verificaPreenchimento($value);
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

                            if ($preenchimento) {

                                ?>

                                <br>
                                <h3> História Cirúrgica </h3><br>

                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="tipo_cirurgia">Tipo de cirurugia </label>
                                        <input type="text" class="form-control" id="tipo_cirurgia"
                                               name="tipo_cirurgia" value="<?php echo $fisio->tipo_cirurgia; ?>"
                                               disabled>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="data_cirurgia">Data da(s) cirurgia(s) </label>
                                        <input type="text" class="form-control data" id="data_consulta"
                                               name="data_cirurgia" value="<?php echo $fisio->data_cirurgia; ?>"
                                               disabled>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="hopital_realizada">Hospital onde foi realizada </label>
                                        <input type="text" class="form-control" id="hopital_realizada"
                                               name="hopital_realizada"
                                               value="<?php echo $fisio->hospital_realizado; ?>" disabled>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="hemitorax_cirurgiado">Hemitórax Cirurgiado</label>
                                        <input type="text" class="form-control"
                                               value="<?php echo $fisio->hemitorax_cirurgiado; ?>" disabled>
                                    </div>
                                </div>
                                <h4>Intercorrências </h4><br>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="trans_operatorio">Trans-operatório (pneumatórax, lesão nervosa,
                                            lesão vascular...)</label>
                                        <input type="text" class="form-control" id="trans_operatorio"
                                               name="trans_operatorio"
                                               value="<?php echo $fisio->trans_operatorio; ?>" disabled>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="pos_operatorio_imediato">Pós-operatório imediato (hemorragias,
                                            infecções, necrose tecidual, lenfedema ...) </label>
                                        <input type="text" class="form-control" id="pos_operatorio_imediato"
                                               name="pos_operatorio_imediato"
                                               value="<?php echo $fisio->pos_operatorio_imediato; ?>" disabled>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="pos_operatorio_tardio">Pós-operatório tardio (linfedema,
                                            retração
                                            cicatricial, ADM, dor ...) </label>
                                        <input type="text" class="form-control" id="pos_operatorio_tardio"
                                               name="pos_operatorio_tardio"
                                               value="<?php echo $fisio->pos_operatorio_tardio; ?>" disabled>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="outras_cirurgias">Outras cirurgias realizadas </label>
                                        <input type="text" class="form-control" id="outras_cirurgias"
                                               name="outras_cirurgias"
                                               value="<?php echo $fisio->outras_cirurgias; ?>" disabled>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="realizou_fisioterapia">Já realizou fisioterapia
                                            anteriormente?</label>
                                        <input type="text" class="form-control" id="realizou_fisioterapia"
                                               name="realizou_fisioterapia"
                                               value="<?php echo $fisio->realizou_fisioterapia; ?>" disabled>
                                    </div>
                                </div>
                                <br>

                                <br>
                                <h3>Antecedentes Familiares</h3><br>

                                <div class="form-group">

                                    <?php
                                    if ($fisio->casos_cancer) {
                                        echo "<label for'casos_cancer'>Casos de câncer de mama na família </label><br>";
                                        echo "<label for='casos_cancer'>Parentesco casos câncer de mama </label>";
                                        echo "<input type='text' class='form-control' value='$fisio->parentesco_casos_cancer' disabled>";
                                    }
                                    ?>


                                    <?php
                                    if ($fisio->outros_casos) {
                                        echo "<label for='casos_cancer'>Outros casos de câncer na família </label><br>";
                                        echo "<label for='casos_cancer'>Localidade do câncer </label>";
                                        echo "<input type='text' class='form-control' value='$fisio->local' disabled> <br>";
                                        echo "<label for='casos_cancer'>Parentesco outros casos de câncer </label>";
                                        echo "<input type='text' class='form-control' value='$fisio->parentesco_outros_casos' disabled> <br>";
                                    } else {

                                    }
                                    ?>
                                </div>

                                <?php
                            } else {
                                echo '<div class="alert alert-warning"> Preenchimento não realizado </div>';
                            }

                            ?>

                        </form>

                    </div>

                </div>
                <?php
                break;
            case 'list':
                ?>

                <br>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table cellspacing="0" class="table table-hover table-responsive" width="100%" id="tabela">
                                <thead>
                                <tr>
                                    <th> Nome</th>
                                    <th> Sexo</th>
                                    <th> Status</th>
                                    <th>Preenchimento</th>
                                    <th> Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $conexao = DaoPaciente::getInstance();
                                $pacientes = $conexao->listarTodos();
                                foreach ($pacientes as $paciente) {
                                    $conexaoP = DaoFisioterapeuta::getInstance();
                                    $preenchimento = $conexaoP->verificaPreenchimento($paciente->id_paciente);
                                    ?>
                                    <tr>
                                        <td> <?php echo $paciente->nome_paciente ?> </td>
                                        <td> <?php echo $paciente->sexo ?> </td>
                                        <td> <?php echo $paciente->status ?> </td>
                                        <td>
                                            <?php
                                            if ($preenchimento) {
                                                echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'> </span>";
                                            } else {
                                                echo "<span class='glyphicon glyphicon-remove' aria-hidden='true'> </span>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo PATH ?>/fisioterapeuta/profile/<?php echo $paciente->id_paciente ?>"
                                               class="btn btn-info"
                                               title="Ver perfil"><span class="glyphicon glyphicon-user icone_list"
                                                                        aria-hidden="true"> </span> </a>
                                            <a href="<?php echo PATH ?>/fisioterapeuta/edit/<?php echo $paciente->id_paciente ?>"
                                               class="btn btn-primary"
                                               title="Editar perfil"> <span
                                                    class="glyphicon glyphicon-pencil icone_list"
                                                    aria-hidden="true"> </span> </a>
                                            <a href="<?php echo PATH ?>/fisioterapeuta/consult/<?php echo $paciente->id_paciente ?>"
                                               class="btn btn-primary"
                                               title="Listar consultas"> <span
                                                    class="glyphicon glyphicon-list"
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

            case 'apagarConsultas':
                if (isset($value) && is_numeric($value)) {
                    $conexao = DaoPaciente::getInstance();
                    $conexaoP = DaoFisioterapeuta::getInstance();
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
                                <a class='btn btn-default' href='" . PATH . "/fisioterapeuta/list/'>Cancelar</a>
                            </form>
                        </div>

                    </div>";

                } else {
                    echo '<div class="alert alert-danger"> Deve-se passar um ID </div>';
                }
                break;
            case 'edit':

                if (isset($_POST['salvar'])) {
                    $id = antiInject($_POST['id']);
                    $tipo_cirurgia = antiInject($_POST['tipo_cirurgia']);
                    $data_cirurgia = antiInject($_POST['data_cirurgia']);
                    $hospital_realizado = antiInject($_POST['hopital_realizada']);
                    $hemitorax_cirurgiado = antiInject($_POST['hemitorax_cirurgiado']);

                    $trans_operatorio = antiInject($_POST['trans_operatorio']);
                    $pos_operatorio_imediato = antiInject($_POST['pos_operatorio_imediato']);
                    $pos_operatorio_tardio = antiInject($_POST['pos_operatorio_tardio']);
                    $outras_cirurgias = antiInject($_POST['outras_cirurgias']);
                    $realizou_fisioterapia = antiInject($_POST['realizou_fisioterapia']);

                    $casos_cancer = antiInject($_POST['casos_cancer']);
                    $parentesco_casos_cancer = antiInject($_POST['parentesco_casos_cancer']);
                    $outros_casos = antiInject($_POST['outros_casos']);
                    $local = antiInject($_POST['local']);
                    $parentesco_outros_casos = antiInject($_POST['parentesco_outros_cancer']);

                    if (false) {
                        echo '<div class="alert alert-info"> Os campos marcados com * são obrigatórios </div>';
                    } else {
                        $perfil = new PerfilFisioterapeuta($id, $tipo_cirurgia, $data_cirurgia, $hospital_realizado, $hemitorax_cirurgiado, $trans_operatorio,
                            $pos_operatorio_imediato, $pos_operatorio_tardio, $outras_cirurgias, $realizou_fisioterapia, $casos_cancer, $parentesco_casos_cancer,
                            $outros_casos, $local, $parentesco_outros_casos);

                        $conexao = DaoFisioterapeuta::getInstance();
                        $conexao->editarPerfil($perfil);
                    }
                }
                ?>

                <div class="row">

                    <div class="col-lg-9">

                        <h3> Alterar dados do paciente </h3><br>

                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id" value="<?php echo $value; ?>">
                            <br>
                            <h3> História Cirúrgica </h3><br>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="tipo_cirurgia">Tipo de cirurugia </label>
                                    <input type="text" class="form-control" id="tipo_cirurgia" name="tipo_cirurgia">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="data_cirurgia">Data da(s) cirurgia(s) </label>
                                    <input type="text" class="form-control data" id="data_consulta" name="data_cirurgia">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="hopital_realizada">Hospital onde foi realizada </label>
                                    <input type="text" class="form-control" id="hopital_realizada"
                                           name="hopital_realizada">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="hemitorax_cirurgiado">Hemitórax Cirurgiado</label>
                                    <select class="form-control" id="hemitorax_cirurgiado"
                                            name="hemitorax_cirurgiado">
                                        <option></option>
                                        <option>Direito</option>
                                        <option>Esquerdo</option>
                                        <option>Ambos</option>
                                    </select>
                                </div>
                            </div>
                            <h4>Intercorrências </h4><br>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="trans_operatorio">Trans-operatório (pneumatórax, lesão nervosa,
                                        lesão vascular...)</label>
                                    <input type="text" class="form-control" id="trans_operatorio"
                                           name="trans_operatorio">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="pos_operatorio_imediato">Pós-operatório imediato (hemorragias,
                                        infecções, necrose tecidual, lenfedema ...) </label>
                                    <input type="text" class="form-control" id="pos_operatorio_imediato"
                                           name="pos_operatorio_imediato">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="pos_operatorio_tardio">Pós-operatório tardio (linfedema, retração
                                        cicatricial, ADM, dor ...) </label>
                                    <input type="text" class="form-control" id="pos_operatorio_tardio"
                                           name="pos_operatorio_tardio">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="outras_cirurgias">Outras cirurgias realizadas </label>
                                    <input type="text" class="form-control" id="outras_cirurgias"
                                           name="outras_cirurgias">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="realizou_fisioterapia">Já realizou fisioterapia
                                        anteriormente?</label>
                                    <input type="text" class="form-control" id="realizou_fisioterapia"
                                           name="realizou_fisioterapia">
                                </div>
                            </div>
                            <br>

                            <br>
                            <h3>Antecedentes Familiares</h3><br>

                            <div class="form-group">
                                <label for="casos_cancer">Casos de câncer de mama na família </label>
                                <div class="radio">
                                    <label><input type="radio" name="casos_cancer" id="casos_cancer" value="1"
                                                  onclick="MudarCasosCancer('1')">Sim</label>
                                </div>
                                <div class="form-group" id="parentesco_casos_cancer" style="display:none;">
                                    <label>Parentesco </label>
                                    <input type="text" name="parentesco_casos_cancer" id="parentesco_casos_cancer"
                                           class="form-control" value="">
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="casos_cancer" id="casos_cancer" value="0"
                                                  onclick="MudarCasosCancer('0')">Não</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="casos_cancer">Outros casos de câncer na família </label>
                                <div class="radio">
                                    <label><input type="radio" name="outros_casos" id="outros_casos" value="1"
                                                  onclick="MudarOutrosCasos('1')">Sim</label>
                                </div>
                                <div class="form-group" id="sim_outros_casos" style="display:none;">
                                    <label>Local </label>
                                    <input type="text" name="local" id="local" class="form-control" value=""><br>
                                    <label>Parentesco </label>
                                    <input type="text" name="parentesco_outros_cancer" id="parentesco_outros_cancer"
                                           class="form-control" value="">
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="outros_casos" id="outros_casos" value="0"
                                                  onclick="MudarOutrosCasos('0')">Não</label>
                                </div>
                            </div>

                            <input type="submit" name="salvar" value="Salvar" class="btn btn-primary">
                            <input type="reset" value="Limpar" class="btn btn-default">

                        </form>

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
    function MudarDor(el) {
        var display = document.getElementById('dor_local').style.display;
        if (display == "none" && el == 1)
            document.getElementById('dor_local').style.display = 'block';
        else if (display == "block" && el == 0)
            document.getElementById('dor_local').style.display = 'none';
    }

    function MudarAderencias(el) {
        var display = document.getElementById('aderencias_local').style.display;
        if (display == "none" && el == 1)
            document.getElementById('aderencias_local').style.display = 'block';
        else if (display == "block" && el == 0)
            document.getElementById('aderencias_local').style.display = 'none';
    }

    function MudarOutrosCasos(el) {
        var display = document.getElementById('sim_outros_casos').style.display;
        if (display == "none" && el == 1)
            document.getElementById('sim_outros_casos').style.display = 'block';
        else if (display == "block" && el == 0)
            document.getElementById('sim_outros_casos').style.display = 'none';
    }

    function MudarCasosCancer(el) {
        var display = document.getElementById('parentesco_casos_cancer').style.display;
        if (display == "none" && el == 1)
            document.getElementById('parentesco_casos_cancer').style.display = 'block';
        else if (display == "block" && el == 0)
            document.getElementById('parentesco_casos_cancer').style.display = 'none';
    }
</script>