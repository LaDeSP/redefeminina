
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Projetos
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="glyphicon glyphicon-th"></i>  <a href="<?php echo PATH ?>/"> Inicío </a>
                        </li>
                        <li class="active">
                            <i class="glyphicon glyphicon-gift"></i> Projetos
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <a href="<?php echo PATH ?>/projetos/add" class="btn btn-primary"> Adicionar Projetos </a>
                    <a href="<?php echo PATH ?>/projetos/list" class="btn btn-info"> Listar Projetos </a>
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
                            $titulo = antiInject($_POST['titulo']);
                            $descricao = trim($_POST['descricao']);

                            if (empty($titulo) || empty($descricao)) {
                                echo '<div class="alert alert-warning"> Os campos marcados com * são obrigatórios </div>';
                            } else {
                                $id_voluntaria = $_SESSION['id_user'];
                                $projeto = new Projeto($titulo, $descricao);
                                $projeto->setIdVoluntaria($id_voluntaria);
                                $conexao = DaoProjeto::getInstance();
                                $conexao->inserir($projeto);
                            }
                        }
                        ?>

                        <div class="col-lg-9">

                            <h3> Adicionar Projeto </h3>

                            <br>

                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="form-group col-lg-8">
                                        <label for="titulo">Título </label> <span class="campo_obrigatorio"> *</span>
                                        <input type="text" class="form-control" pattern="[a-zA-Z0-9à-úÀ-Ú\s]+$" title="Não são permitidos simbolos" id="titulo" name="titulo" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="descricao">Descrição </label> <span class="campo_obrigatorio"> *</span>
                                    <textarea id="descricao" name="descricao" class="form-control" rows="3" required></textarea>
                                    <script>
                                        CKEDITOR.replace( 'descricao' );
                                    </script>
                                </div>

                                <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-primary">
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
                        if (isset($_POST['alterar'])) {
                            $id = antiInject($_POST['id']);
                            $titulo = antiInject($_POST['titulo']);
                            $descricao = trim($_POST['descricao']);

                            if (empty($titulo) || empty($descricao)) {
                                echo '<div class="alert alert-warning"> Os campos marcados com * são obrigatórios </div>';
                            } else {
                                $id_voluntaria = $_SESSION['id_user'];
                                $projeto = new Projeto($titulo, $descricao);
                                $projeto->setId($id);
                                $conexao = DaoProjeto::getInstance();
                                $conexao->editar($projeto);
                            }
                        }
                        ?>

                        <?php
                        if (isset($value) && is_numeric($value)) {
                            $conexao = DaoProjeto::getInstance();
                            $projeto = $conexao->listarPorID($value);
                            if ($projeto->id_voluntaria != $_SESSION['id_user']) {
                                echo '<div class="alert alert-danger"> Somente pessoas autorizadas </div>';
                                echo '<meta http-equiv="refresh" content="3;URL='. PATH . '/home">';
                                return;
                            }
                        ?>

                            <div class="col-lg-9">

                                <h3> Alterar Projeto </h3>

                                <br>

                                <form action="" method="post" enctype="multipart/form-data">

                                    <div class="row">
                                        <input type="hidden" name="id" value="<?php echo $projeto->id_projeto  ?>">
                                        <div class="form-group col-lg-8">
                                            <label for="titulo">Título </label> <span class="campo_obrigatorio"> *</span>
                                            <input type="text" class="form-control" title="Não são permitidos simbolos"
                                                   pattern="[a-zA-Z0-9à-úÀ-Ú\s]+$" id="titulo" name="titulo" value="<?php echo $projeto->titulo_projeto ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="descricao">Descrição </label> <span class="campo_obrigatorio"> *</span>
                                        <textarea id="descricao" name="descricao" class="form-control" rows="3" required><?php echo $projeto->descricao ?></textarea>
                                        <script>
                                            CKEDITOR.replace( 'descricao' );
                                        </script>
                                    </div>

                                    <input type="submit" name="alterar" value="Alterar" class="btn btn-primary">
                                    <a class="btn btn-default" href="<?php echo PATH ?>/projetos/list/">Cancelar</a>

                                </form>

                            </div>
                        <?php
                        } else {
                            echo '<div class="alert alert-danger"> Deve-se passar um ID </div>';
                        }?>

                    </div>
                    <?php
                    break;
                case 'list' :
                    ?>

                    <div class="row">

                        <div class="col-lg-12">

                            <br>

                            <table cellspacing="0" class="table table-hover table-responsive" width="100%" id="tabela">

                                <thead>
                                <tr>
                                    <th> Nome </th>
                                    <th> Descrição </th>
                                    <th> Ações </th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                $conexao = DaoProjeto::getInstance();
                                $projetos = $conexao->listarTodos();
                                foreach ($projetos as $projeto) {
                                    ?>
                                    <tr>
                                        <td> <?php echo $projeto->titulo_projeto ?> </td>
                                        <td> <?php echo $projeto->descricao ?> </td>
                                        <td>
                                            <a href="<?php echo PATH ?>/projetos/edit/<?php echo $projeto->id_projeto ?>"
                                               class="btn btn-primary" title="Editar Projeto"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span> </a>
                                            <a href="<?php echo PATH ?>/projetos/del/<?php echo $projeto->id_projeto ?>"
                                               class="btn btn-danger" title="Deletar Projeto"> <span class="glyphicon glyphicon-remove" aria-hidden="true"> </span> </a>
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
                case 'del' :
                    ?>

                    <div class="row">

                        <?php
                        if (isset($value) && is_numeric($value)) {
                            $conexao = DaoProjeto::getInstance();
                            $projeto = $conexao->listarPorID($value);
                            if ($projeto->id_voluntaria != $_SESSION['id_user']) {
                                echo '<div class="alert alert-danger"> Somente pessoas autorizadas </div>';
                                echo '<meta http-equiv="refresh" content="3;URL='. PATH . '/home">';
                                return;
                            }
                            ?>

                            <?php
                            if (isset($_POST['deletar'])) {

                                $id = antiInject($_POST['id']);

                                $conexao = DaoProjeto::getInstance();
                                $conexao->deletar($id);
                            }
                            ?>

                            <div class="col-lg-9">

                                <h3> Deletar Projeto </h3>

                                <br>

                                <form action="" method="post" enctype="multipart/form-data">

                                    <div class="row">

                                        <input type="hidden" name="id" value="<?php echo $projeto->id_projeto ?>">

                                        <div class="form-group col-lg-8">
                                            <label for="titulo">Título do Projeto</label>
                                            <input type="text" class="form-control" disabled id="titulo" name="titulo" value="<?php echo $projeto->titulo_projeto ?>">
                                        </div>
                                    </div>

                                    <input type="submit" name="deletar" value="Deletar" class="btn btn-primary">
                                    <a class="btn btn-default" href="<?php echo PATH ?>/projetos/list/">Cancelar</a>

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
            }?>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

