<?php
if (!isAdmin() && !isAssistente()) {
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
                    Assistente Social
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="glyphicon glyphicon-th"></i> <a href="<?php echo PATH ?>/"> Inicío </a>
                    </li>
                    <li class="active">
                        <i class="glyphicon glyphicon-heart"></i> Pacientes
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <a href="<?php echo PATH ?>/assistente/list" class="btn btn-info"> Listar Pacientes </a>
                <a href="<?php echo PATH ?>/assistente/report" class="btn btn-default"> Relatórios </a>
            </div>
        </div>

        <br>

        <?php
        switch ($action) {

            case 'report':

            ?>
                <div class="row">
                    <label>Gerar relatório em PDF dos</label><br>
                    <form action="<?php echo PATH; ?> /classes/relatorio.php" method="post" name="form-relatorio" target="_blank">
                        <select class="form-control" name="relatorio-assistente">
                            <option value="ativos">Pacientes Ativos</option>
                            <option value="inativos">Pacientes Inativos</option>
                            <option value="recebem-auxilio-doenca">Pacientes que recebem auxilio doença</option>
                            <option value="necessita-cesta">Pacientes que necessitam de Cesta Básica</option>
                            <option value="usa-medicamento">Pacientes que usam medicamentos</option>
                            <option value="reliza-outro-tratamento">Pacientes que realizam outro tratamento</option>
                            <option value="necessita-outro-auxilio">Pacientes que necessitam outro auxilio</option>
                        </select><br>
                        <input type="submit" value="Gerar" class="btn btn-success" name="gerar">
                    </form>
                </div>
            <?php

            break;
            case 'edit' :
                ?>

                <div class="row">

                    <?php
                    if (isset($_POST['salvar'])) {
                        $tipo_doenca = antiInject($_POST['tipo_doenca']);
                        $recebe_auxilio_doenca = antiInject($_POST['recebe_auxilio_doenca']);
                        $tipo_auxilio = antiInject($_POST['tipo_auxilio']);
                        $necessita_cesta = antiInject($_POST['necessita_cesta']);
                        $porque_necessita = antiInject($_POST['porque_necessita']);
                        $qtd_pessoas_res = antiInject($_POST['qtd_pessoas_res']);
                        $qtd_crianca = antiInject($_POST['qtd_crianca']);
                        $qtd_trabalhadores = antiInject($_POST['qtd_trabalhadores']);
                        $renda_familiar = antiInject($_POST['renda_familiar']);
                        $usa_medicamento = antiInject($_POST['usa_medicamento']);
                        $tipo_medicamento = antiInject($_POST['tipo_medicamento']);
                        $realiza_outro_tratamento = antiInject($_POST['realiza_outro_tratamento']);
                        $tipo_tratamento = antiInject($_POST['tipo_tratamento']);
                        $necessita_outro_auxilio = antiInject($_POST['necessita_outro_auxilio']);
                        $tipo_outro_auxilio = antiInject($_POST['tipo_outro_auxilio']);
                        $id = antiInject($_POST['id']);


                        //VERIFICAR CONDICOES
                        if (empty($tipo_doenca) || !isset($qtd_pessoas_res)
                            || !isset($qtd_crianca) || !isset($qtd_trabalhadores) || empty($renda_familiar)){
                            echo '<div class="alert alert-info"> Os campos marcados com * são obrigatórios </div>';
                        } else {

                            $paciente = new PacienteAssistenteSocial();
                            $paciente->setId($id);
                            $paciente->setTipoDoenca($tipo_doenca);
                            $paciente->setRecebeAuxilioDoenca($recebe_auxilio_doenca);
                            $paciente->setTipoAuxilioDoenca($tipo_auxilio);
                            $paciente->setTipoDoenca($tipo_doenca);
                            $paciente->setNecessitaCestaBasica($necessita_cesta);
                            $paciente->setPorQueCestaBasica($porque_necessita);
                            $paciente->setQtdPessoasResidencia($qtd_pessoas_res);
                            $paciente->setQtdMenorDeIdade($qtd_crianca);
                            $paciente->setQtdTrabalhadores($qtd_trabalhadores);
                            $paciente->setRendaFamilia($renda_familiar);
                            $paciente->setUsaMedicamento($usa_medicamento);
                            $paciente->setTipoMedicamento($tipo_medicamento);
                            $paciente->setRealizaOutroTratamento($realiza_outro_tratamento);
                            $paciente->setTipoTratamento($tipo_tratamento);
                            $paciente->setNecessitaOutroAuxilio($necessita_outro_auxilio);
                            $paciente->setTipoOutroAuxilio($tipo_outro_auxilio);
                            $conexao = DaoAssistenteSocial::getInstance();
                            $conexao->inserir($paciente);
                        }
                    }
                    
                    $conexao = DaoAssistenteSocial::getInstance();
                    $paciente = $conexao->verificaPreenchimento($value);
                    if ($paciente){
                        $pacienteP = $conexao->listarPacienteAssistenteID($value);
                    }
                    ?>

                    <div class="col-lg-9">

                        <h3> Alterar dados do paciente </h3><br>

                        <form action="" method="post" enctype="multipart/form-data">

                            <input type="hidden" id="id" name="id" value="<?php echo $value; ?>">
                            <div class="form-group">
                                <label for="tipo_doenca">Tipo Doença <span class="campo_obrigatorio"> *</span> </label>
                                <input type="text" class="form-control" id="tipo_doenca" name="tipo_doenca" value="<?php if ($paciente){ echo $pacienteP->tipo_doenca; } ?>"onfocus required>
                            </div>
                            <div class="form-group">
                                <label for="recebe_auxilio_doenca">Recebe auxilio doença <span class="campo_obrigatorio"> *</span> </label>
                                <div class="radio">
                                    <label><input type="radio" name="recebe_auxilio_doenca" id="recebe_auxilio_doenca" value="1" onclick="MudarEstadoAuxilioDoenca('1')" <?php if ($pacienteP->recebe_auxilio_doenca){ echo 'checked'; } ?> >Sim</label>
                                </div>
                                <div class="form-group" id="campo_auxilio_doenca" style="display:none;">
                                    <label>Qual auxilio </label>
                                    <input type="text" name="tipo_auxilio" id="tipo_auxilio" class="form-control" value="<?php if ($pacienteP->recebe_auxilio_doenca){ echo $pacienteP->tipo_auxilio; } ?>">
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="recebe_auxilio_doenca" id="recebe_auxilio_doenca" value="0" onclick="MudarEstadoAuxilioDoenca('0')" <?php if (!$pacienteP->recebe_auxilio_doenca){ echo 'checked'; } ?>>Não</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="necessita_cesta">Necessita cesta básica <span class="campo_obrigatorio"> *</span> </label>
                                <div class="radio">
                                    <label><input type="radio" name="necessita_cesta" id="necessita_cesta" value="1" onclick="MudarEstadoCestaBasica('1')" <?php if ($pacienteP->necessita_cesta){ echo 'checked'; } ?>>Sim</label>
                                </div>
                                <div class="form-group" id="campo_necessita_cesta" style="display:none;">
                                    <label>Por que necessita </label>
                                    <input type="text" id="porque_necessita" name="porque_necessita" class="form-control" value="<?php if ($pacienteP->recebe_auxilio_doenca){ echo $pacienteP->porque_necessita; } ?>">
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="necessita_cesta" id="necessita_cesta" value="0" onclick="MudarEstadoCestaBasica('0')" <?php if (!$pacienteP->necessita_cesta){ echo 'checked'; } ?>>Não</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div>
                                    <label for="qtd_pessoas_res">Quantidade de pessoas na residência <span class="campo_obrigatorio"> *</span></label>
                                    <input type="number" id="qtd_pessoas_res" name="qtd_pessoas_res" class="form-control" value="<?php if ($paciente){ echo $pacienteP->qtd_pessoas_res; } ?>" required>
                                </div>
                                <div>
                                    <label for="qtd_crianca">Quantidade de crianças <span class="campo_obrigatorio"> *</span></label>
                                    <input type="number" id="qtd_crianca" name="qtd_crianca" class="form-control" value="<?php if ($paciente){ echo $pacienteP->qtd_crianca; } ?>" required>
                                </div>
                                <div>
                                    <label for="qtd_trabalhadores">Quantidade de pessoas que trabalham <span class="campo_obrigatorio"> *</span></label>
                                    <input type="number" id="qtd_trabalhadores" name="qtd_trabalhadores" class="form-control" value="<?php if ($paciente){ echo $pacienteP->qtd_trabalhadores; } ?>" required>
                                 </div>
                                <div>
                                    <label for="renda_familiar">Renda Familiar <span class="campo_obrigatorio"> *</span></label>
                                    <input type="number" id="renda_familiar" name="renda_familiar" step="0.01" class="form-control" value="<?php if ($paciente){ echo $pacienteP->renda_familiar; } ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="usa_medicamento">Usa medicamento <span class="campo_obrigatorio"> *</span> </label>
                                <div class="radio">
                                    <label><input type="radio" name="usa_medicamento" id="usa_medicamento" value="1" onclick="MudarEstadoUsaMedicamento('1')" <?php if ($pacienteP->usa_medicamento){ echo 'checked'; } ?>>Sim</label>
                                </div>
                                <div class="form-group" id="campo_usa_medicamento" style="display:none;">
                                    <label>Tipo medicamento </label>
                                    <input type="text" id="tipo_medicamento" name="tipo_medicamento" class="form-control" value="<?php if ($pacienteP->usa_medicamento){ echo $pacienteP->tipo_medicamento; } ?>">
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="usa_medicamento" id="usa_medicamento" value="0" onclick="MudarEstadoUsaMedicamento('0')" <?php if (!$pacienteP->usa_medicamento){ echo 'checked'; } ?>>Não</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="realiza_outro_tratamento">Realiza outro tratamento <span class="campo_obrigatorio"> *</span></label>
                                <div class="radio">
                                    <label><input type="radio" name="realiza_outro_tratamento" id="realiza_outro_tratamento" value="1" onclick="MudarEstadoRealizaOutroTratamento('1')" <?php if ($pacienteP->realiza_outro_tratamento){ echo 'checked'; } ?>>Sim</label>
                                </div>
                                <div class="form-group" id="campo_realiza_outro_tratamento" style="display:none;">
                                    <label>Tipo tratamento </label>
                                    <input type="text" id="tipo_tratamento" name="tipo_tratamento" class="form-control" value="<?php if ($pacienteP->realiza_outro_tratamento){ echo $pacienteP->tipo_tratamento; } ?>">
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="realiza_outro_tratamento" id="realiza_outro_tratamento" value="0" onclick="MudarEstadoRealizaOutroTratamento('0')" <?php if (!$pacienteP->realiza_outro_tratamento){ echo 'checked'; } ?>>Não</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="necessita_outro_auxilio">Necessita outro auxilio <span class="campo_obrigatorio"> *</span></label>
                                <div class="radio">
                                    <label><input type="radio" name="necessita_outro_auxilio" id="necessita_outro_auxilio" value="1" onclick="MudarEstadoNecessitaOutroAuxilio('1')" <?php if ($pacienteP->necessita_outro_auxilio){ echo 'checked'; } ?>>Sim</label>
                                </div>
                                <div class="form-group" id="campo_necessita_outro_auxilio" style="display:none;">
                                    <label>Tipo outro auxilio </label>
                                    <input type="text" id="tipo_outro_auxilio" name="tipo_outro_auxilio" class="form-control" value="<?php if ($pacienteP->necessita_outro_auxilio){ echo $pacienteP->tipo_auxilio; } ?>">
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="necessita_outro_auxilio" id="necessita_outro_auxilio" value="0" onclick="MudarEstadoNecessitaOutroAuxilio('0')" <?php if (!$pacienteP->necessita_outro_auxilio){ echo 'checked'; } ?>>Não</label>
                                </div>
                            </div>


                            <input type="submit" name="salvar" value="Salvar" class="btn btn-primary">
                            <input type="reset" value="Limpar" class="btn btn-default">

                        </form>

                    </div>
                </div>

                <?php
                break;
            case 'profile' :
                ?>

                <?php
                $conexao = DaoAssistenteSocial::getInstance();
                $conexaoP = DaoPaciente::getInstance();
                $paciente = $conexaoP->listarPorID($value);
                if ($paciente) {
                    $assistente = $conexao->listarPacienteAssistenteID($value);
                }
                ?>

                <div class="row">

                    <div class="col-lg-9">

                        <h3> Perfil Paciente </h3>

                        <form>

                            <div class="form-group">
                                <label for="nome">Nome </label>
                                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $paciente->nome_paciente ?>" disabled>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-10">
                                    <label for="rua">Rua </label>
                                    <input type="text" class="form-control" id="rua" name="rua" value="<?php echo $paciente->rua ?>" disabled>
                                </div>
                                <div class="form-group col-lg-2">
                                    <label for="numero">Número </label>
                                    <input type="text" class="form-control" id="numero" name="numero"value="<?php echo $paciente->numero ?>" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="nascimento">Data de Nascimento </label>
                                    <input type="text" class="form-control" id="nascimento" name="nascimento" value="<?php echo $paciente->nascimento ?>" disabled>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="telefone">Telefone </label>
                                    <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $paciente->telefone ?>" disabled>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="celular">Celular </label>
                                    <input type="text" class="form-control" id="celular" name="celular" value="<?php echo $paciente->celular ?>" disabled>
                                </div>
                            </div>
                            <label> Sexo </label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="sexo" value="M" disabled <?php if ($paciente->sexo == 'M') echo checked ?>>
                                    Masculino
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="sexo" value="F" disabled <?php if ($paciente->sexo == 'F') echo checked ?>>
                                    Feminino
                                </label>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="cpf">CPF </label>
                                    <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $paciente->cpf ?>" disabled>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="rg">RG </label>
                                    <input type="text" class="form-control" id="rg" name="rg" value="<?php echo $paciente->rg ?>" disabled>
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
                                $conexaoP = DaoAssistenteSocial::getInstance();
                                $preenchimento = $conexaoP->verificaPreenchimento($paciente->id_paciente);
                                if (!$preenchimento){
                                    echo '<div class="alert alert-warning"> Preenchimento não realizado </div>';
                                }else{

                            ?>
                            <div class="form-group">
                                <label for="tipo_doenca">Tipo Doença * </label>
                                <input type="text" class="form-control" id="tipo_doenca" name="tipo_doenca" value="<?php echo $assistente->tipo_doenca ?>" disabled>
                            </div>
                            <div class="form-group">
                                <?php
                                if ($assistente->recebe_auxilio_doenca){
                                   echo "<br><label for='recebe_auxilio_doenca'>Tipo auxilio doença</label>";
                                    echo "<input type='text' name='tipo_auxilio' id='tipo_auxilio' class='form-control' value='$assistente->tipo_auxilio' disabled><br>";
                                }else{
                                    echo "<br><label for='recebe_auxilio_doenca'><font color='red'>Não recebe auxilio doença</font></label><br>";
                                }

                                if ($assistente->necessita_cesta){
                                    echo "<br><label for='recebe_auxilio_doenca'>Por que necessita cesta básica</label>";
                                    echo "<input type='text' name='tipo_auxilio' id='tipo_auxilio' class='form-control' value='$assistente->porque_necessita' disabled><br>";
                                }else{
                                    echo "<br><label for='recebe_auxilio_doenca'><font color='red'>Não necessita de cesta básica</font></label><br>";
                                }
                                ?>

                            <div class="form-group">
                                <div>
                                    <label for="qtd_pessoas_res">Quantidade de pessoas na casa *</label>
                                    <input type="text" id="qtd_pessoas_res" name="qtd_pessoas_res" class="form-control" value="<?php echo $assistente->qtd_pessoas_res ?>" disabled>
                                </div>
                                <div>
                                    <label for="qtd_crianca">Quantidade de crianças *</label>
                                    <input type="text" id="qtd_crianca" name="qtd_crianca" class="form-control" value="<?php echo $assistente->qtd_crianca ?>" disabled>
                                </div>
                                <div>
                                    <label for="qtd_trabalhadores">Quantidade de pessoas que trabalham *</label>
                                    <input type="number" id="qtd_trabalhadores" name="qtd_trabalhadores" class="form-control" value="<?php echo $assistente->qtd_trabalhadores ?>" disabled>
                                </div>
                                <div>
                                    <label for="renda_familiar">Renda Familiar *</label>
                                    <input type="text" id="renda_familiar" name="renda_familiar" class="form-control" value="<?php echo $assistente->renda_familiar ?>" disabled>
                                </div>
                            </div>

                                <?php
                                if ($assistente->usa_medicamento){
                                    echo "<br><label for='recebe_auxilio_doenca'>Tipo medicamento</label>";
                                    echo "<input type='text' name='tipo_auxilio' id='tipo_auxilio' class='form-control' value='$assistente->tipo_medicamento' disabled><br>";
                                }else{
                                    echo "<br><label for='recebe_auxilio_doenca'><font color='red'>Não usa medicamento</font></label><br>";
                                }

                                if ($assistente->realiza_outro_tratamento){
                                    echo "<br><label for='recebe_auxilio_doenca'>Qual tratamento realiza</label>";
                                    echo "<input type='text' name='tipo_auxilio' id='tipo_auxilio' class='form-control' value='$assistente->tipo_tratamento' disabled><br>";
                                }else{
                                    echo "<br><label for='recebe_auxilio_doenca'><font color='red'>Não realiza outro tratamento</font></label><br>";
                                }

                                if ($assistente->necessita_outro_auxilio){
                                    echo "<br><label for='recebe_auxilio_doenca'>Qual outro auxilio necessita</label>";
                                    echo "<input type='text' name='tipo_auxilio' id='tipo_auxilio' class='form-control' value='$assistente->tipo_outro_auxilio' disabled><br>";
                                }else{
                                    echo "<br><label for='recebe_auxilio_doenca'><font color='red'>Não necessita outro auxilio</font></label><br>";
                                }

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
                                    $conexaoP = DaoAssistenteSocial::getInstance();
                                    $preenchimento = $conexaoP->verificaPreenchimento($paciente->id_paciente);
                                    ?>
                                    <tr>
                                        <td> <?php echo $paciente->nome_paciente ?> </td>
                                        <td> <?php echo $paciente->sexo ?> </td>
                                        <td> <?php echo $paciente->status ?> </td>
                                        <td>
                                            <?php
                                                if ($preenchimento){
                                                   echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'> </span>";
                                                }else{
                                                    echo "<span class='glyphicon glyphicon-remove' aria-hidden='true'> </span>";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo PATH ?>/assistente/profile/<?php echo $paciente->id_paciente ?>"
                                               class="btn btn-info"
                                               title="Ver perfil"><span class="glyphicon glyphicon-user icone_list"
                                                                        aria-hidden="true"> </span> </a>
                                            <a href="<?php echo PATH ?>/assistente/edit/<?php echo $paciente->id_paciente ?>"
                                               class="btn btn-primary"
                                               title="Editar perfil"> <span
                                                    class="glyphicon glyphicon-pencil icone_list"
                                                    aria-hidden="true"> </span> </a>
                                            <a href="<?php echo PATH ?>/assistente/del/<?php echo $paciente->id_paciente ?>"
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
                    $conexaoP = DaoAssistenteSocial::getInstance();
                    $paciente = $conexao->listarPorID($value);

                    if (isset($_POST['deletar'])) {
                        $id = antiInject($_POST['id_paciente']);
                        $conexaoP->deletar($id);
                    }
                    ?>

                    <div class="col-lg-9">

                        <div class="row">
                            <h3> Deletar Paciente </h3>

                            <br>

                                <form action='' method='post'>

                                    <input type='hidden' class='form-control' name='id_paciente' value='<?php echo $paciente->id_paciente ?>'>

                                    <div class="row">
                                        <div class="form-group col-lg-8">
                                            <label>Nome</label>
                                            <input type='text' class='form-control' name='nome_paciente' value='<?php echo $paciente->nome_paciente ?>' disabled>
                                        </div>
                                    </div>

                                    <button class='btn btn-primary' name='deletar'>Deletar</button>
                                    <a class="btn btn-default" href="<?php echo PATH ?>/assistente/list/">Cancelar</a>

                                </form>
                        </div>

                    </div>

                    <?php
                }
                else {
                    echo '<div class="alert alert-danger"> Deve-se passar um ID </div>';
                }
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
        if(display == "none" && el == 1)
            document.getElementById('campo_auxilio_doenca').style.display = 'block';
        else if (display == "block" && el == 0)
            document.getElementById('campo_auxilio_doenca').style.display = 'none';
    }
</script>

<script>
    function MudarEstadoCestaBasica(el) {
        var display = document.getElementById('campo_necessita_cesta').style.display;
        if(display == "none" && el == 1)
            document.getElementById('campo_necessita_cesta').style.display = 'block';
        else if (display == "block" && el == 0)
            document.getElementById('campo_necessita_cesta').style.display = 'none';
    }
</script>

<script>
    function MudarEstadoUsaMedicamento(el) {
        var display = document.getElementById('campo_usa_medicamento').style.display;
        if(display == "none" && el == 1)
            document.getElementById('campo_usa_medicamento').style.display = 'block';
        else if (display == "block" && el == 0)
            document.getElementById('campo_usa_medicamento').style.display = 'none';
    }
</script>


<script>
    function MudarEstadoRealizaOutroTratamento(el) {
        var display = document.getElementById('campo_realiza_outro_tratamento').style.display;
        if(display == "none" && el == 1)
            document.getElementById('campo_realiza_outro_tratamento').style.display = 'block';
        else if (display == "block" && el == 0)
            document.getElementById('campo_realiza_outro_tratamento').style.display = 'none';
    }
</script>

<script>
    function MudarEstadoNecessitaOutroAuxilio(el) {
        var display = document.getElementById('campo_necessita_outro_auxilio').style.display;
        if(display == "none" && el == 1)
            document.getElementById('campo_necessita_outro_auxilio').style.display = 'block';
        else if (display == "block" && el == 0)
            document.getElementById('campo_necessita_outro_auxilio').style.display = 'none';
    }
</script>