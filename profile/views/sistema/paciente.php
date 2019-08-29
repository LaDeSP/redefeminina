
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Pacientes
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
                <a href="<?php echo PATH ?>/paciente/add" class="btn btn-primary"> Adicionar Paciente </a>
                <a href="<?php echo PATH ?>/paciente/list" class="btn btn-info"> Listar Pacientes </a>
            </div>
        </div>

        <br>

        <?php
        switch ($action) {

            case 'add' :
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
                        $status = "Ativo";

                        if (!isset($nome) || !isset($rua) || !isset($numero) || !isset($nascimento) ) {
                            echo '<div class="alert alert-info"> Os campos marcados com * são obrigatórios </div>';
                        } else {
                            $paciente = new Paciente();
                            $paciente->setNome($nome);
                            $paciente->setRua($rua);
                            $paciente->setNumeroCasa($numero);
                            $paciente->setNascimento($nascimento);
                            $paciente->setTelefone($telefone);
                            $paciente->setCelular($celular);
                            $paciente->setSexo($sexo);
                            $paciente->setCpf($cpf);
                            $paciente->setRg($rg);
                            $paciente->setStatus($status);
                            $conexao = DaoPaciente::getInstance();
                            $conexao->inserir($paciente);
                        }
                    }
                    ?>

                    <div class="col-lg-9">

                        <h3> Adicionar Paciente </h3>

                        <form action="" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="nome">Nome </label> <span class="campo_obrigatorio"> *</span>
                                <input type="text" class="form-control" autofocus id="nome" name="nome" pattern="[a-zA-Zà-úÀ-Ú\s]+$"
                                       title="Não são permitidos símbolos e números" required>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-10">
                                    <label for="rua">Rua </label> <span class="campo_obrigatorio"> *</span>
                                    <input type="text" class="form-control" pattern="[a-zA-Z0-9à-úÀ-Ú\s]+$"
                                           title="Não são permitidos símbolos" id="rua" name="rua" required>
                                </div>
                                <div class="form-group col-lg-2">
                                    <label for="numero">Número </label> <span class="campo_obrigatorio"> *</span>
                                    <input type="number" class="form-control" id="numero" name="numero" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="nascimento">Data de Nascimento </label> <span class="campo_obrigatorio"> *</span>
                                    <input type="text" class="form-control data" id="nascimento" name="nascimento" required>
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

                            <div class="row">

                                    <div class = "col-md-6">
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
                                    </div>

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
                            </div>
                            </div>

                            </div>

                            <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-primary">
                            <input type="reset" value="Limpar" class="btn btn-default">

                        </form>

                    </div>

                <?php
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
                        $status = antiInject($_POST['status']);

                        if (!isset($nome) || !isset($rua) || !isset($numero) || !isset($nascimento) ) {
                            echo '<div class="alert alert-info"> Os campos marcados com * são obrigatórios </div>';
                        } else {

                            $paciente = new Paciente();
                            $paciente->setId($id);
                            $paciente->setNome($nome);
                            $paciente->setRua($rua);
                            $paciente->setNumeroCasa($numero);
                            $paciente->setNascimento($nascimento);
                            $paciente->setTelefone($telefone);
                            $paciente->setCelular($celular);
                            $paciente->setSexo($sexo);
                            $paciente->setCpf($cpf);
                            $paciente->setRg($rg);
                            $paciente->setStatus($status);
                            $conexao = DaoPaciente::getInstance();
                            $conexao->editar($paciente);
                        }
                    }
                    ?>

                    <?php
                    if (isset($value) && is_numeric($value)) {
                        $conexao = DaoPaciente::getInstance();
                        $paciente = $conexao->listarPorID($value);
                    ?>

                        <div class="col-lg-9">

                            <h3> Alterar Paciente </h3>

                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="form-group col-lg-2">
                                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $paciente->id_paciente ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nome">Nome </label><span class="campo_obrigatorio"> *</span>
                                    <input type="text" class="form-control" id="nome" name="nome" pattern="[a-zA-Zà-úÀ-Ú\s]+$" title="Não são permitidos símbolos e números"
                                           autofocus value="<?php echo $paciente->nome_paciente ?>" required>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-10">
                                        <label for="rua">Rua </label><span class="campo_obrigatorio"> *</span>
                                        <input type="text" class="form-control" id="rua" name="rua"
                                               pattern="[a-zA-Z0-9à-úÀ-Ú\s]+$"
                                               title="Não são permitidos símbolos" value="<?php echo $paciente->rua ?>" required>
                                    </div>
                                    <div class="form-group col-lg-2">
                                        <label for="numero">Número </label><span class="campo_obrigatorio"> *</span>
                                        <input type="number" class="form-control" id="numero" name="numero"value="<?php echo $paciente->numero ?>" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="nascimento">Data de Nascimento </label><span class="campo_obrigatorio"> *</span>
                                        <input type="text" class="form-control data" id="nascimento" name="nascimento" value="<?php echo $paciente->nascimento ?>" required>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="telefone">Telefone </label>
                                        <input type="tel" class="form-control" id="telefone" name="telefone" value="<?php echo $paciente->telefone ?>" >
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="celular">Celular </label>
                                        <input type="tel" class="form-control" id="celular" name="celular" value="<?php echo $paciente->celular ?>" >
                                    </div>
                                </div>
                                <label> Sexo </label><span class="campo_obrigatorio"> *</span>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="sexo" value="M" <?php if ($paciente->sexo == 'M') echo checked ?>>
                                        Masculino
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="sexo" value="F" <?php if ($paciente->sexo == 'F') echo checked ?>>
                                        Feminino
                                    </label>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="cpf">CPF </label>
                                        <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $paciente->cpf ?>" >
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="rg">RG </label>
                                        <input type="text" class="form-control" pattern="[0-9.]+$" title="Os números devem ser sem espaços ou separados por ponto" id="rg" name="rg" value="<?php echo $paciente->rg ?>" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label>Status</label> <span class="campo_obrigatorio"> *</span>
                                        <select class="form-control" name="status">
                                            <option <?php if ($paciente->status == "Óbito") echo 'selected'; ?> value='Óbito'> Óbito </option>
                                            <option <?php if ($paciente->status == "Inativo") echo 'selected'; ?> value='Inativo'> Inativo </option>
                                            <option <?php if ($paciente->status == "Ativo") echo 'selected'; ?> value='Ativo'> Ativo </option>
                                        </select>
                                    </div>
                                </div>

                                <input type="submit" name="alterar" value="Alterar" class="btn btn-primary">
                                <a class="btn btn-default" href="<?php echo PATH ?>/paciente/list/">Cancelar</a>

                            </form>

                        </div>
                    <?php } else {
                        echo '<div class="alert alert-danger"> Deve-se passar um ID </div>';
                    }
                    ?>
                </div>

                <?php
                break;
            case 'profile' :
                ?>

                <?php
                $conexao = DaoPaciente::getInstance();
                $paciente = $conexao->listarPorID($value);
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

                        </form>

                    </div>

                </div>
                <?php
                break;
            case 'list' :
                ?>

                <br>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table cellspacing="0" class="table table-hover table-responsive" width="100%" id="tabela">
                                <thead>
                                <tr>
                                    <th> Nome</th>
                                    <th> Telefone / Celular</th>
                                    <th> Sexo</th>
                                    <th> Status</th>
                                    <th> Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                        $conexao = DaoPaciente::getInstance();
                                        $pacientes = $conexao->listarTodos();
                                        foreach ($pacientes as $paciente) {
                                            ?>
                                            <tr>
                                                <td> <?php echo $paciente->nome_paciente ?> </td>
                                                <td> <?php echo $paciente->telefone . ' ' . $paciente->celular ?> </td>
                                                <td> <?php echo $paciente->sexo ?> </td>
                                                <td> <?php echo $paciente->status ?> </td>
                                                <td>
                                                    <a href="<?php echo PATH ?>/paciente/profile/<?php echo $paciente->id_paciente ?>"
                                                       class="btn btn-info"
                                                       title="Ver perfil"><span
                                                            class="glyphicon glyphicon-user icone_list"
                                                            aria-hidden="true"> </span> </a>
                                                    <a href="<?php echo PATH ?>/paciente/edit/<?php echo $paciente->id_paciente ?>"
                                                       class="btn btn-primary"
                                                       title="Editar perfil"> <span
                                                            class="glyphicon glyphicon-pencil icone_list"
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
        }
        ?>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
