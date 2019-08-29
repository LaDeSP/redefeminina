
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Voluntária
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="glyphicon glyphicon-th"></i> <a href="<?php echo PATH ?>/"> Inicío </a>
                    </li>
                    <li class="active">
                        <i class="glyphicon glyphicon-star-empty"></i> Voluntária
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <a href="<?php echo PATH ?>/voluntaria/add" class="btn btn-primary"> Adicionar Voluntária </a>
                <a href="<?php echo PATH ?>/voluntaria/list" class="btn btn-info"> Listar Voluntária </a>
            </div>
        </div>

        <br>

        <?php
            switch ($action) {

                case 'add' :
                    if (isAdmin() || isSecretaria()) {

                        ?>

                        <div class="row">

                            <?php
                            if (isset($_POST['cadastrar'])) {
                                $nome = antiInject($_POST['nome']);
                                $rua = antiInject($_POST['rua']);
                                $numero = antiInject($_POST['numero']);
                                $nascimento = antiInject($_POST['nascimento']);
                                $telefone = antiInject($_POST['telefone']);
                                $celular = antiInject($_POST['celular']);
                                $sexo = antiInject(($_POST['sexo']) == 'M' ? 'M' : 'F');
                                $cpf = antiInject($_POST['cpf']);
                                $rg = antiInject($_POST['rg']);
                                $profissao = antiInject($_POST['profissao']);
                                $habilidades = antiInject($_POST['habilidades']);
                                $diasSemana = antiInject($_POST['diasSemana']);
                                $horasSemana = antiInject($_POST['horasSemana']);
                                $usuario = antiInject($_POST['usuario']);
                                $senha = ($_POST['senha'] != '') ? antiInject($_POST['senha']) : '';
                                $csenha = ($_POST['csenha'] != '') ? antiInject($_POST['csenha']) : '';
                                $status = "Ativo";
                                $acesso = antiInject($_POST['acesso']);
                                $error = false;

                                if (empty($nome) || empty($rua) || empty($numero) || empty($nascimento) || empty($profissao) || empty($habilidades) || empty($diasSemana) || empty($horasSemana)) {
                                    echo '<div class="alert alert-info"> Os campos marcados com * são obrigatórios </div>';
                                    $error = true;
                                }

                                if (!$error) {
                                    if ($acesso != 'Sem acesso') {

                                        if (!empty($usuario) && strlen($usuario) >= 6 && !empty($senha) && strlen($senha) >= 6) {

                                            if (!empty($csenha) && $senha == $csenha) {
                                                $voluntaria = new Voluntaria($nome, $rua, $numero, $nascimento, $telefone, $celular, $sexo, $cpf, $rg, $profissao, $habilidades, $diasSemana,
                                                    $horasSemana, $usuario, criptografar($senha), $status, $acesso);
                                                $conexao = DaoVoluntaria::getInstance();
                                                $conexao->inserir($voluntaria);
                                                $error = false;
                                            } else {
                                                echo '<div class="alert alert-danger"> Senha Incorreta </div>';
                                            }
                                        } else {
                                            echo '<div class="alert alert-danger"> Usuário ou senha Inválida </div>';
                                        }
                                    } else {
                                        $voluntaria = new Voluntaria($nome, $rua, $numero, $nascimento, $telefone, $celular, $sexo, $cpf, $rg, $profissao, $habilidades, $diasSemana,
                                            $horasSemana, $usuario, $senha, $status, $acesso);
                                        $conexao = DaoVoluntaria::getInstance();
                                        $conexao->inserir($voluntaria);
                                        $error = false;
                                    }
                                }
                            }


                            ?>

                            <div class="col-lg-9">

                                <h3> Adicionar Voluntária </h3>

                                <br>

                                <form action="" method="post" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="form-group col-lg-5">
                                            <label>Selecione o nível de acesso ao sistema </label> <span class="campo_obrigatorio"> *</span>
                                            <select class="form-control" id="acesso" name="acesso" onchange="selecionaAcesso()">
                                                <option value="Sem acesso">Sem acesso</option>
                                                <option value="Secretária">Secretária</option>
                                                <option value="Fisioterapeuta">Fisioterapeuta</option>
                                                <option value="Assistente Social">Assistente Social</option>
                                                <option value="Nutricionista">Nutricionista</option>
                                                <option value="Tesoureira">Tesoureira</option>
                                                <option value="Presidência">Presidência</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nome">Nome </label> <span class="campo_obrigatorio"> *</span>
                                        <input type="text" pattern="[a-zA-Zà-úÀ-Ú\s]+$" title="Não são permitidos símbolos e números" class="form-control" id="nome" name="nome" required
                                               autofocus>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-10">
                                            <label for="rua">Rua </label> <span class="campo_obrigatorio"> *</span>
                                            <input type="text" class="form-control" pattern="[a-zA-Z0-9à-úÀ-Ú\s]+$"
                                                   title="Não são permitidos símbolos" id="rua" name="rua" required>
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label for="numero">Número </label> <span
                                                class="campo_obrigatorio"> *</span>
                                            <input type="number" class="form-control" id="numero" name="numero" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label for="nascimento">Data de Nascimento </label> <span
                                                class="campo_obrigatorio"> *</span>
                                            <input type="text" class="form-control data" id="nascimento" name="nascimento"
                                                   required>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="telefone">Telefone </label>
                                            <input type="tel" class="form-control" id="telefone" name="telefone">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="celular">Celular </label>
                                            <input type="tel" class="form-control" id="celular" name="celular">
                                        </div>
                                    </div>

                                    <label> Sexo </label> <span class="campo_obrigatorio"> *</span>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="sexo" value="M">
                                            Masculino
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="sexo" value="F" checked>
                                            Feminino
                                        </label>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label for="cpf">CPF </label>
                                            <input type="text" class="form-control" id="cpf" name="cpf">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="rg">RG </label>
                                            <input type="text" class="form-control" pattern="[0-9.]+$" title="Os números devem ser sem espaços ou separados por ponto" id="rg" name="rg">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="profissao">Profissão </label> <span
                                                class="campo_obrigatorio"> *</span>
                                            <input type="text" pattern="[a-zA-Zà-úÀ-Ú\s]+$" class="form-control" id="profissao" name="profissao"
                                                   title="Não são permitidos símbolos e números" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="habilidades">Habilidades </label> <span
                                            class="campo_obrigatorio"> *</span>
                                        <input type="text" pattern="[a-zA-Z0-9à-úÀ-Ú\s]+$" title="Não são permitidos símbolos" class="form-control" id="habilidades" name="habilidades"
                                               required>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="dia_disponibilidade">Dias da semana disponíveis </label> <span
                                                class="campo_obrigatorio"> *</span>
                                            <input type="text" pattern="[a-zA-Zà-úÀ-Ú,\s]+$" title="Separar os dias da semana com vírgula" class="form-control" id="dia_disponibilidade"
                                                   name="diasSemana" required placeholder="Segunda, Terça, Quarta">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="hora_disponibilidade">Horários disponíveis </label> <span
                                                class="campo_obrigatorio"> *</span>
                                            <input type="text" class="form-control" id="hora_disponibilidade" placeholder="12:00 - 13:00"
                                                   name="horasSemana" required>
                                        </div>
                                    </div>
                                    <div id="user-pass" style="display: none;">
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label for="usuario">Usuário </label>
                                                <input type="text" class="form-control" id="usuario" name="usuario" title="Mínimo de 6 caracteres"
                                                       maxlength="15" size="15">
                                                <div style="padding-top: 2px"> Mínimo de caracteres 6 </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-4">
                                                <label for="senha">Senha </label>
                                                <input type="password" class="form-control" id="senha" name="senha"
                                                       maxlength="20" size="20">
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="csenha">Confirmar Senha </label>
                                                <input type="password" class="form-control" id="csenha" name="csenha"
                                                       maxlength="20" size="20">

                                                <div id="confirmar-senha" style="padding-top: 1px;"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-primary">
                                    <input type="reset" value="Limpar" class="btn btn-default">

                                </form>

                            </div>
                        </div>
                        <?php
                    } else {
                        echo '<div class="alert alert-danger"> Acesso restrito apenas para pessoas autorizadas. Entre em contato com a presidente para mais informações!  </div>';
                        return;
                    }
                break;
                case 'edit' :
                    ?>

                    <div class="row">

                        <?php
                            if (isset($_POST['alterar'])) {
                                $id = antiInject($_POST['id']);
                                $nome = antiInject($_POST['nome']);
                                $rua = antiInject($_POST['rua']);
                                $numero = antiInject($_POST['numero']);
                                $nascimento = antiInject($_POST['nascimento']);
                                $telefone = antiInject($_POST['telefone']);
                                $celular = antiInject($_POST['celular']);
                                $sexo = antiInject(($_POST['sexo']) == 'M' ? 'M' : 'F');
                                $cpf = antiInject($_POST['cpf']);
                                $rg = antiInject($_POST['rg']);
                                $profissao = antiInject($_POST['profissao']);
                                $habilidades = antiInject($_POST['habilidades']);
                                $diasSemana = antiInject($_POST['diasSemana']);
                                $horasSemana = antiInject($_POST['horasSemana']);
                                $usuario = antiInject($_POST['usuario']);
                                $senha = antiInject(($_POST['senha'] != '') ? criptografar($_POST['senha']) : '');
                                $status = antiInject($_POST['status']);
                                $acesso = antiInject($_POST['acesso']);
                                $error = false;

                                if (empty($nome) || empty($rua) || empty($numero) || empty($nascimento) || empty($profissao) || empty($habilidades) || empty($diasSemana) || empty($horasSemana) ) {
                                    echo '<div class="alert alert-info"> Os campos marcados com * são obrigatórios </div>';
                                    $error = true;
                                }

                                if (!$error) {
                                    if ($acesso != 'Sem acesso') {

                                        if (!empty($usuario) && strlen($usuario) >= 6) {
                                            $voluntaria = new Voluntaria($nome, $rua, $numero, $nascimento, $telefone, $celular, $sexo, $cpf, $rg, $profissao, $habilidades, $diasSemana,
                                                $horasSemana, $usuario, $senha, $status, $acesso);
                                            $voluntaria->setId($id);
                                            $conexao = DaoVoluntaria::getInstance();
                                            $conexao->editar($voluntaria);
                                            $error = false;
                                        } else {
                                            echo '<div class="alert alert-danger"> Usuário Inválido </div>';
                                        }
                                    } else {
                                        $voluntaria = new Voluntaria($nome, $rua, $numero, $nascimento, $telefone, $celular, $sexo, $cpf, $rg, $profissao, $habilidades, $diasSemana,
                                            $horasSemana, $usuario, $senha, $status, $acesso);
                                        $voluntaria->setId($id);
                                        $conexao = DaoVoluntaria::getInstance();
                                        $conexao->editar($voluntaria);
                                        $error = false;
                                    }
                                }
                            }
                        ?>

                        <?php
                        if (isset($value) && is_numeric($value)) {
                            $conexao = DaoVoluntaria::getInstance();
                            $voluntaria = $conexao->listarPorID($value);
                            if ($voluntaria->id_voluntaria != $_SESSION['id_user'] && !isAdmin() && !isSecretaria()) {
                                echo '<div class="alert alert-danger"> Acesso restrito apenas para pessoas autorizadas. Entre em contato com a presidente para mais informações!  </div>';
                                return;
                            }
                            ?>

                            <div class="col-lg-9">

                                <h3> Alterar Voluntária </h3>

                                <form action="" method="post" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="form-group col-lg-2">
                                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $voluntaria->id_voluntaria ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nome">Nome </label> <span class="campo_obrigatorio"> *</span>
                                        <input type="text" class="form-control" id="nome" pattern="[a-zA-Zà-úÀ-Ú\s]+$" title="Não são permitidos símbolos e números"
                                               autofocus name="nome" required value="<?php echo $voluntaria->nome_voluntaria ?>">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-10">
                                            <label for="rua">Rua </label> <span class="campo_obrigatorio"> *</span>
                                            <input type="text" class="form-control" id="rua" name="rua"
                                                   pattern="[a-zA-Z0-9à-úÀ-Ú\s]+$"
                                                   title="Não são permitidos símbolos" required value="<?php echo $voluntaria->rua ?>">
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label for="numero">Número </label> <span class="campo_obrigatorio"> *</span>
                                            <input type="number" class="form-control" id="numero" name="numero" required value="<?php echo $voluntaria->numero ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label for="nascimento">Data de Nascimento </label> <span class="campo_obrigatorio"> *</span>
                                            <input type="text" class="form-control data" id="nascimento" name="nascimento" required value="<?php echo $voluntaria->data_nascimento ?>">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="telefone">Telefone </label>
                                            <input type="tel" class="form-control" id="telefone" name="telefone" value="<?php echo $voluntaria->telefone ?>">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="celular">Celular </label>
                                            <input type="tel" class="form-control" id="celular" name="celular" value="<?php echo $voluntaria->celular ?>">
                                        </div>
                                    </div>

                                    <label> Sexo </label> <span class="campo_obrigatorio"> *</span>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="sexo" value="M" <?php if ($voluntaria->sexo == 'M') echo checked ?>>
                                            Masculino
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="sexo" alue="F" <?php if ($voluntaria->sexo == 'F') echo checked ?>>
                                            Feminino
                                        </label>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label for="cpf">CPF </label>
                                            <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $voluntaria->cpf ?>">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="rg">RG </label>
                                            <input type="text" class="form-control" id="rg" pattern="[0-9.]+$" title="Os números devem ser sem espaços ou separados por ponto" name="rg" value="<?php echo $voluntaria->rg ?>">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="profissao">Profissão </label> <span class="campo_obrigatorio"> *</span>
                                            <input type="text" class="form-control" id="profissao" name="profissao" pattern="[a-zA-Zà-úÀ-Ú\s]+$" title="Não são permitidos símbolos e números"
                                                   required value="<?php echo $voluntaria->profissao ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="habilidades">Habilidades </label> <span class="campo_obrigatorio"> *</span>
                                        <input type="text" class="form-control" id="habilidades" name="habilidades"
                                               pattern="[a-zA-Z0-9à-úÀ-Ú\s]+$" title="Não são permitidos símbolos" required value="<?php echo $voluntaria->habilidades ?>">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="dia_disponibilidade">Dias da semana disponíveis </label> <span class="campo_obrigatorio"> *</span>
                                            <input type="text" class="form-control" id="dia_disponibilidade" pattern="[a-zA-Zà-úÀ-Ú,\s]+$" title="Separar os dias da semana com vírgula"
                                                   name="diasSemana" required value="<?php echo $voluntaria->dia_semana_disponivel ?>">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="hora_disponibilidade">Horários disponíveis </label> <span class="campo_obrigatorio"> *</span>
                                            <input type="text" class="form-control" id="hora_disponibilidade" name="horasSemana" required value="<?php echo $voluntaria->horario_disponivel ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label for="usuario">Usuário </label>
                                            <input type="text" class="form-control" id="usuario" name="usuario" title="Mínimo de 6 caracteres" maxlength="15" size="15" value="<?php echo $voluntaria->usuario ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php if (isSecretaria() || isAdmin()) { ?>
                                        <div class="form-group col-lg-4">
                                            <label>Status</label> <span class="campo_obrigatorio"> *</span>
                                            <select class="form-control" name="status">
                                                <option <?php if ($voluntaria->status == "Inativo") echo 'selected'; ?> value='Inativo'> Inativo </option>
                                                <option <?php if ($voluntaria->status == "Ativo") echo 'selected'; ?> value='Ativo'> Ativo </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Nível de acesso ao sistema</label> <span class="campo_obrigatorio"> *</span>
                                            <select class="form-control" name="acesso">
                                                <option <?php if ($voluntaria->nivel_acesso == 'Sem acesso') echo 'selected'; ?> value="Sem acesso">Sem acesso</option>
                                                <option <?php if ($voluntaria->nivel_acesso == 'Secretária') echo 'selected'; ?> value="Secretária">Secretária</option>
                                                <option <?php if ($voluntaria->nivel_acesso == 'Fisioterapeuta') echo 'selected'; ?> value="Fisioterapeuta">Fisioterapeuta</option>
                                                <option <?php if ($voluntaria->nivel_acesso == 'Assistente Social') echo 'selected'; ?> value="Assistente Social">Assistente Social</option>
                                                <option <?php if ($voluntaria->nivel_acesso == 'Nutricionista') echo 'selected'; ?> value="Nutricionista">Nutricionista</option>
                                                <option <?php if ($voluntaria->nivel_acesso == 'Tesoureira') echo 'selected'; ?> value="Tesoureira">Tesoureira</option>
                                                <option <?php if ($voluntaria->nivel_acesso == 'Presidência') echo 'selected'; ?> value="Presidência">Presidência</option>
                                            </select>
                                        </div>
                                        <?php } else { ?>
                                        <div class="form-group col-lg-4">
                                            <input type="hidden" class="form-control" name="status" value="<?php echo $voluntaria->status ?>">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <input type="hidden" class="form-control" name="acesso" value="<?php echo $voluntaria->nivel_acesso ?>">
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <input type="submit" name="alterar" value="Alterar" class="btn btn-primary">
                                    <a class="btn btn-default" href="<?php echo PATH ?>/voluntaria/list/">Cancelar</a>

                                </form>

                            </div>
                            <?php
                        } else {
                            echo '<div class="alert alert-danger"> Deve-se passar um ID </div>';
                        }
                        ?>
                    </div>

                <?php
                break;
                case 'profile' :
                    ?>
                    <div class="row">

                        <?php

                        if (isset($value) && is_numeric($value)) {
                            $conexao = DaoVoluntaria::getInstance();
                            $voluntaria = $conexao->listarPorID($value);
                            if ($voluntaria->id_voluntaria != $_SESSION['id_user'] && !isAdmin() && !isSecretaria()) {
                                echo '<div class="alert alert-danger"> Acesso restrito apenas para pessoas autorizadas. Entre em contato com a presidente para mais informações!  </div>';
                                return;
                            }
                            ?>

                            <div class="col-lg-9">

                                <h3> Perfil Voluntária </h3>

                                <form>

                                    <div class="form-group">
                                        <label for="nome">Nome </label>
                                        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $voluntaria->nome_voluntaria ?>" disabled>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-10">
                                            <label for="rua">Rua </label>
                                            <input type="text" class="form-control" id="rua" name="rua" value="<?php echo $voluntaria->rua ?>" disabled>
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label for="numero">Número </label>
                                            <input type="number" class="form-control" id="numero" name="numero" value="<?php echo $voluntaria->numero ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label for="nascimento">Data de Nascimento </label>
                                            <input type="text" class="form-control data" id="nascimento" name="nascimento" value="<?php echo $voluntaria->data_nascimento ?>" disabled>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="telefone">Telefone </label>
                                            <input type="tel" class="form-control" id="telefone" name="telefone" value="<?php echo $voluntaria->telefone ?>" disabled>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="celular">Celular </label>
                                            <input type="tel" class="form-control" id="celular" name="celular" value="<?php echo $voluntaria->celular ?>" disabled>
                                        </div>
                                    </div>
                                    <label> Sexo </label>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="sexo" value="M" disabled <?php if ($voluntaria->sexo == 'M') echo checked ?>>
                                            Masculino
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="sexo" value="F" disabled <?php if ($voluntaria->sexo == 'F') echo checked ?>>
                                            Feminino
                                        </label>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label for="cpf">CPF </label>
                                            <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $voluntaria->cpf ?>" disabled>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="rg">RG </label>
                                            <input type="text" class="form-control" id="rg" name="rg" value="<?php echo $voluntaria->rg ?>" disabled>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="profissao">Profissão </label>
                                            <input type="text" class="form-control" id="profissao" name="profissao" value="<?php echo $voluntaria->profissao ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="habilidades">Habilidades </label>
                                        <input type="text" class="form-control" id="habilidades" name="habilidades" value="<?php echo $voluntaria->habilidades ?>" disabled>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="dia_disponibilidade">Dias da semana disponível </label>
                                            <input type="text" class="form-control" id="dia_disponibilidade" name="diasSemana" value="<?php echo $voluntaria->dia_semana_disponivel ?>" disabled>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="hora_disponibilidade">Horários disponível </label>
                                            <input type="text" class="form-control" id="hora_disponibilidade" name="horasSemana" value="<?php echo $voluntaria->horario_disponivel ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label for="usuario">Usuário </label>
                                            <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $voluntaria->usuario ?>" disabled>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="senha">Senha </label>
                                            <input type="password" class="form-control" id="senha" name="senha" value="<?php echo $voluntaria->senha ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label>Status</label>
                                            <select class="form-control" name="status" disabled>
                                                <option> <?php echo $voluntaria->status ?> </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>Nível de acesso ao sistema</label>
                                            <select class="form-control" name="acesso" disabled>
                                                <option> <?php echo $voluntaria->nivel_acesso ?> </option>
                                            </select>
                                        </div>
                                    </div>

                                </form>

                            </div>
                            <?php
                        } else {
                            echo '<div class="alert alert-danger"> Deve-se passar um ID </div>';
                        }
                        ?>

                    </div>
                <?php
                break;
                case 'list' :
                    ?>

                    <br>

                    <div class="row">

                        <div class="col-lg-12">

                            <table cellspacing="0" class="table table-hover table-responsive" width="100%" id="tabela">

                                <thead>
                                <tr>
                                    <th> Nome </th>
                                    <th> Telefone / Celular </th>
                                    <th> Profissão </th>
                                    <th> Sexo </th>
                                    <th> Status </th>
                                    <th> Ações </th>
                                </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $conexao = DaoVoluntaria::getInstance();
                                    $voluntarias = $conexao->listarTodos();
                                    foreach ($voluntarias as $voluntaria) {
                                    ?>
                                    <tr>
                                        <td> <?php echo $voluntaria->nome_voluntaria ?> </td>
                                        <td> <?php echo $voluntaria->telefone . ' ' . $voluntaria->celular ?> </td>
                                        <td> <?php echo $voluntaria->profissao ?> </td>
                                        <td> <?php echo $voluntaria->sexo ?> </td>
                                        <td> <?php echo $voluntaria->status ?> </td>
                                        <td>
                                            <?php if ($voluntaria->nome_voluntaria != "Administrador") { ?>
                                                <a href="<?php echo PATH ?>/voluntaria/profile/<?php echo $voluntaria->id_voluntaria ?>"
                                                   class="btn btn-info" title="Ver perfil"><span
                                                        class="glyphicon glyphicon-user" aria-hidden="true"> </span>
                                                </a>
                                                <a href="<?php echo PATH ?>/voluntaria/edit/<?php echo $voluntaria->id_voluntaria ?>"
                                                   class="btn btn-primary" title="Editar perfil"> <span
                                                        class="glyphicon glyphicon-pencil" aria-hidden="true"> </span>
                                                </a>
                                                <a href="<?php echo PATH ?>/voluntaria/pass/<?php echo $voluntaria->id_voluntaria ?>"
                                                   class="btn btn-primary" title="Alterar senha"> <span
                                                        class="glyphicon glyphicon-lock" aria-hidden="true"> </span>
                                                </a>
                                                <a href="<?php echo PATH ?>/voluntaria/del/<?php echo $voluntaria->id_voluntaria ?>"
                                                   class="btn btn-danger" title="Deletar perfil"> <span
                                                        class="glyphicon glyphicon-remove" aria-hidden="true"> </span>
                                                </a>
                                            <?php } ?>
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
                case 'pass' :
                    ?>

                    <div class="row">

                        <?php
                        if (isset($value) && is_numeric($value)) {
                            if (isset($_POST['alterar'])) {
                                $id = antiInject($_POST['id']);
                                $senha = antiInject($_POST['senha']);
                                $csenha = antiInject($_POST['csenha']);
                                $error = false;

                                if (empty($senha) && empty($csenha)) {
                                    echo '<div class="alert alert-danger"> Acesso restrito apenas para pessoas autorizadas. Entre em contato com a presidente para mais informações!  </div>';
                                    $error = true;
                                }

                                if (!$error && strlen($senha) >= 6) {
                                    if ($senha == $csenha) {
                                        $conexao = DaoVoluntaria::getInstance();
                                        $conexao->editarSenha($id, criptografar($senha));
                                    } else {
                                        echo '<div class="alert alert-danger"> Senha Incorreta </div>';
                                    }
                                } else {
                                    echo '<div class="alert alert-danger"> Senha Inválida </div>';
                                }

                            }
                            ?>

                            <?php
                            $conexao = DaoVoluntaria::getInstance();
                            $voluntaria = $conexao->listarPorID($value);
                            if ($voluntaria->id_voluntaria != $_SESSION['id_user'] && !isAdmin() && !isSecretaria()) {
                                echo '<div class="alert alert-danger"> Somente pessoas autorizadas </div>';
                                return;
                            }
                            ?>

                            <div class="col-lg-9">

                                <h3> Alterar Senha </h3>

                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $voluntaria->id_voluntaria ?>">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-8">
                                            <label for="nome">Nome </label>
                                            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $voluntaria->nome_voluntaria ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label for="senha">Nova Senha </label> </label> <span class="campo_obrigatorio"> *</span>
                                            <input type="password" class="form-control" required id="senha" name="senha" maxlength="20" size="20">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="csenha">Confirmar Senha </label> <span class="campo_obrigatorio"> *</span>
                                            <input type="password" class="form-control" required id="csenha" name="csenha" maxlength="20" size="20">
                                            <div id="confirmar-senha" style="padding-top: 1px;"> </div>
                                        </div>
                                    </div>
                                    <input type="submit" name="alterar" value="Alterar" class="btn btn-primary">
                                    <a class="btn btn-default" href="<?php echo PATH ?>/voluntaria/list/">Cancelar</a>

                                </form>

                            </div>
                        <?php
                        } else {
                            echo '<div class="alert alert-danger"> Deve-se passar um ID </div>';
                        } ?>

                    </div>

                    <?php
                    break;
                case 'del' :
                    if (!isAdmin()) {
                        echo '<div class="alert alert-danger"> Acesso restrito apenas para pessoas autorizadas. Entre em contato com a presidente para mais informações!  </div>';
                        return;
                    }

                    if (isset($value) && is_numeric($value)) {
                        $conexao = DaoVoluntaria::getInstance();
                        $voluntaria = $conexao->listarPorID($value);

                        if (isset($_POST['deletar'])) {
                            $id = antiInject($_POST['id']);
                            $conexao->deletar($id);
                        }
                        ?>

                        <div class="row">
                            <div class="col-lg-9">

                                <h3> Deletar Voluntária </h3>

                                <form action="" method="post" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="form-group col-lg-2">
                                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $voluntaria->id_voluntaria ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-8">
                                            <label for="nome">Nome </label>
                                            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $voluntaria->nome_voluntaria ?>" disabled>
                                        </div>
                                    </div>

                                    <input type="submit" name="deletar" value="Deletar" class="btn btn-primary">
                                    <a class="btn btn-default" href="<?php echo PATH ?>/voluntaria/list/">Cancelar</a>

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
    function selecionaAcesso() {
        var acesso = document.getElementById('acesso').value;
        if(acesso != "Sem acesso") {
            document.getElementById('user-pass').style.display = 'block';
        } else {
            document.getElementById('user-pass').style.display = 'none';
        }
    }
</script>