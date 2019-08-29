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
                    Administrador
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="glyphicon glyphicon-th"></i>  <a href="<?php echo PATH ?>/">Inicío</a>
                    </li>
                    <li class="active">
                        <i class="glyphicon glyphicon-wrench"></i> Administrador
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <a href="<?php echo PATH ?>/administrador/eventos/list" class="btn btn-info"> Eventos </a>
                <a href="<?php echo PATH ?>/administrador/quemsomos" class="btn btn-info"> Quem somos </a>
                <a href="<?php echo PATH ?>/administrador/depoimento/list" class="btn btn-info"> Depoimentos </a>
                <a href="<?php echo PATH ?>/administrador/cancer" class="btn btn-info"> Câncer </a>
                <a href="<?php echo PATH ?>/administrador/outubrorosa" class="btn btn-info"> Outubro Rosa </a>
                <a href="<?php echo PATH ?>/administrador/voluntario" class="btn btn-info"> Ser Voluntário </a>
                <a href="<?php echo PATH ?>/administrador/ajudar" class="btn btn-info"> Como Ajudar </a>
                <a href="<?php echo PATH ?>/administrador/album/list" class="btn btn-info"> Álbum </a>
            </div>
        </div>

        <br>

        <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Atenção! Todas as alterações serão afetadas diretamente no site.
        </div>

        <br>

        <?php
            switch ($action) {
                case 'eventos' :
                    if ($value == 'list') {
                        ?>

                        <h3> Eventos </h3>

                        <br>

                        <a href="<?php echo PATH ?>/administrador/eventos/add" class="btn btn-primary"> Adicionar Evento </a>

                        <br> <br>

                        <div class="row">

                            <div class="col-lg-12">

                                <table cellspacing="0" class="table table-hover table-responsive" width="100%" id="tabela">
                                    <thead>
                                        <tr>
                                            <th> Nome </th>
                                            <th> Data / Hora </th>
                                            <th> Informações </th>
                                            <th> Ações </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $conexao = DaoAdministrador::getInstance();
                                        $administrador = $conexao->listarEventos();
                                        foreach ($administrador as $adm) {
                                            ?>
                                            <tr>
                                                <td> <?php echo $adm->nome_evento ?> </td>
                                                <td> <?php echo $adm->data_evento . '-' . $adm->hora_evento ?> </td>
                                                <td> <?php echo $adm->informacao_evento ?> </td>
                                                <td>
                                                    <a href="<?php echo PATH ?>/administrador/eventos/edit/<?php echo $adm->id_evento ?>"
                                                       class="btn btn-primary"
                                                       title="Editar Evento"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span> </a>
                                                    <a href="<?php echo PATH ?>/administrador/eventos/del/<?php echo $adm->id_evento ?>"
                                                       class="btn btn-danger"
                                                       title="Deletar Evento"> <span class="glyphicon glyphicon-remove" aria-hidden="true"> </span> </a>
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
                    } else if ($value == 'add') {
                        ?>

                        <?php
                        if (isset($_POST['adicionar'])) {
                            $nome = antiInject($_POST['nome']);
                            $data = antiInject($_POST['data']);
                            $hora = antiInject($_POST['hora']);
                            $endereco = antiInject($_POST['endereco']);
                            $informacao = antiInject($_POST['informacao']);

                            if (empty($nome) || empty($data) || empty($informacao) || empty($hora) || empty($endereco)){
                                echo '<div class="alert alert-warning"> Os campos marcados com * são obrigatórios </div>';
                            } else {
                                $administrador = DaoAdministrador::getInstance();
                                $administrador->addEvento($nome, $data, $informacao, $hora, $endereco);
                            }
                        }
                        ?>

                        <div class="col-lg-9">

                            <h3> Adicionar Evento </h3>

                            <br>

                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="form-group col-lg-8">
                                        <label for="nome">Nome </label> <span class="campo_obrigatorio"> *</span>
                                        <input type="text" class="form-control" id="nome" name="nome" size="40" maxlength="40" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-8">
                                        <label for="endereco">Endereço </label> <span class="campo_obrigatorio"> *</span>
                                        <input type="text" class="form-control" id="endereco" name="endereco" size="40" maxlength="40" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="data">Data </label> <span class="campo_obrigatorio"> *</span>
                                        <input type="text" class="form-control data" id="data" name="data" required>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="hora">Hora </label> <span class="campo_obrigatorio"> *</span>
                                        <input type="time" class="form-control" id="hora" name="hora" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="informacao">Informações </label> <span class="campo_obrigatorio"> *</span>
                                    <textarea id="informacao" name="informacao" class="form-control" rows="40" required></textarea>
                                    <script>
                                        CKEDITOR.replace( 'informacao' );
                                    </script>
                                </div>

                                <input type="submit" name="adicionar" value="Adicionar" class="btn btn-primary">
                                <a class="btn btn-default" href="<?php echo PATH ?>/administrador">Cancelar</a>

                            </form>
                        </div>

                        <?php
                    } else if ($value == 'del') {
                        ?>

                        <?php
                        if (isset($_POST['deletar'])) {
                            $id = antiInject($_POST['id']);

                            $administrador = DaoAdministrador::getInstance();
                            $administrador->deletarEvento($id);

                        }
                        ?>

                        <?php
                        if (isset($parametros[3]) && is_numeric($parametros[3])) {
                            $administrador = DaoAdministrador::getInstance();
                            $adm = $administrador->listarEventoPorID(antiInject($parametros[3]));
                            ?>

                            <div class="col-lg-9">

                                <h3> Deletar Evento </h3>

                                <br>

                                <form action="" method="post" enctype="multipart/form-data">

                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $adm->id_evento ?>">

                                    <div class="row">
                                        <div class="form-group col-lg-8">
                                            <label for="nome">Nome </label>
                                            <input type="text" class="form-control" id="nome" name="nome" disabled value="<?php echo $adm->nome_evento ?>">
                                        </div>
                                    </div>

                                    <input type="submit" name="deletar" value="Deletar" class="btn btn-primary">
                                    <a class="btn btn-default" href="<?php echo PATH ?>/administrador">Cancelar</a>

                                </form>
                            </div>
                            <?php
                        } else {
                            echo '<div class="alert alert-danger"> Deve-se passar um ID </div>';
                        }
                        ?>

                        <?php
                    } else if ($value == 'edit') {
                        ?>

                        <?php
                        if (isset($_POST['alterar'])) {
                            $id = antiInject($_POST['id']);
                            $nome = antiInject($_POST['nome']);
                            $data = antiInject($_POST['data']);
                            $hora = antiInject($_POST['hora']);
                            $endereco = antiInject($_POST['endereco']);
                            $informacao = antiInject($_POST['informacao']);

                            if (empty($nome) || empty($data) || empty($informacao) || empty($hora) || empty($endereco)){
                                echo '<div class="alert alert-warning"> Os campos marcados com * são obrigatórios </div>';
                            } else {
                                $administrador = DaoAdministrador::getInstance();
                                $administrador->alterarEvento($id, $nome, $data, $informacao, $hora, $endereco);
                            }
                        }
                        ?>

                        <?php
                        if (isset($parametros[3]) && is_numeric($parametros[3])) {
                            $administrador = DaoAdministrador::getInstance();
                            $adm = $administrador->listarEventoPorID(antiInject($parametros[3]));
                            ?>

                            <div class="col-lg-9">

                                <h3> Editar Evento </h3>

                                <br>

                                <form action="" method="post" enctype="multipart/form-data">

                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $adm->id_evento ?>">
                                    <div class="row">
                                        <div class="form-group col-lg-8">
                                            <label for="nome">Nome </label> <span class="campo_obrigatorio"> *</span>
                                            <input type="text" class="form-control" id="nome" name="nome" size="40" maxlength="40"
                                                   value="<?php echo $adm->nome_evento ?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-8">
                                            <label for="endereco">Endereço </label> <span class="campo_obrigatorio"> *</span>
                                            <input type="text" class="form-control" id="endereco" name="endereco" size="40" maxlength="40"
                                                   value="<?php echo $adm->endereco_evento ?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label for="data">Data </label> <span class="campo_obrigatorio"> *</span>
                                            <input type="text" class="form-control data" id="data" name="data" value="<?php echo $adm->data_evento ?>" required>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="hora">Hora </label> <span class="campo_obrigatorio"> *</span>
                                            <input type="time" class="form-control" id="hora" name="hora" value="<?php echo $adm->hora_evento ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="informacao">Informações </label> <span
                                            class="campo_obrigatorio"> *</span>
                                        <textarea id="informacao" name="informacao" class="form-control" rows="40" required><?php echo $adm->informacao_evento ?></textarea>
                                        <script>
                                            CKEDITOR.replace('informacao');
                                        </script>
                                    </div>

                                    <input type="submit" name="alterar" value="Alterar" class="btn btn-primary">
                                    <a class="btn btn-default" href="<?php echo PATH ?>/administrador">Cancelar</a>

                                </form>
                            </div>
                            <?php
                        } else {
                            echo '<div class="alert alert-danger"> Deve-se passar um ID </div>';
                        }
                        ?>

                        <?php
                    }
                break;
                case 'quemsomos' :
                    ?>
                    <div class="row">

                        <?php
                        if (isset($_POST['alterar'])) {
                            $categoria = antiInject($_POST['categoria']);
                            $conteudo = trim($_POST['conteudo']);

                            if (empty($categoria) || empty($conteudo)) {
                                echo '<div class="alert alert-warning"> Os campos marcados com * são obrigatórios </div>';
                            } else {
                                $administrador = DaoAdministrador::getInstance();
                                //ID = 1 PARA CATEGORIA "QUEM SOMOS"
                                $administrador->categoriaSite(1, strtoupper($categoria), $conteudo);
                            }
                        }
                        ?>

                        <?php
                            $administrador = DaoAdministrador::getInstance();
                            $adm = $administrador->listarPorID(1);
                        ?>

                        <div class="col-lg-9">

                            <h3> Quem somos </h3>

                            <br>

                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="form-group col-lg-8">
                                        <label for="categoria">Categoria </label> <span class="campo_obrigatorio"> *</span>
                                        <input type="text" class="form-control" pattern="[a-zA-Zà-úÀ-Ú\s]+$" title="Não são permitidos números e simbolos"
                                               size="24" maxlength="24" required id="categoria" name="categoria" value="<?php echo $adm->categoria ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="conteudo">Conteúdo </label> <span class="campo_obrigatorio"> *</span>
                                    <textarea id="conteudo" name="conteudo" required class="form-control" rows="10"><?php echo $adm->conteudo ?></textarea>
                                    <script>
                                        CKEDITOR.replace( 'conteudo' );
                                    </script>
                                </div>

                                <input type="submit" name="alterar" value="Alterar" class="btn btn-primary">
                                <a class="btn btn-default" href="<?php echo PATH ?>/administrador">Cancelar</a>

                            </form>

                        </div>

                    </div>

                    <?php
                break;
                case 'depoimento' :

                if ($value == 'list') {
                    ?>

                    <h3> Depoimentos </h3>

                    <br>

                    <div class="row">

                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th> Nome </th>
                                        <th width=650"> Conteúdo </th>
                                        <th> Ações </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $conexao = DaoAdministrador::getInstance();
                                    $administrador = $conexao->listarDepoimentos();
                                    foreach ($administrador as $adm) {
                                        ?>
                                        <tr>
                                            <td> <?php echo $adm->nome ?> </td>
                                            <td> <?php echo $adm->conteudo ?> </td>
                                            <td>
                                                <a href="<?php echo PATH ?>/administrador/depoimento/edit/<?php echo $adm->id  ?>"
                                                   class="btn btn-primary"
                                                   title="Editar depoimento"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span> </a>
                                                <a href="<?php echo PATH ?>/administrador/depoimento/image/<?php echo $adm->id  ?>"
                                                   class="btn btn-default"
                                                   title="Alterar Imagem"> <span class="glyphicon glyphicon-camera" aria-hidden="true"> </span> </a>
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
                <?php } else if ($value == 'edit') { ?>

                    <h3> Depoimentos </h3>

                    <br>

                    <div class="row">

                        <?php
                        if (isset($_POST['alterar'])) {
                            $id = antiInject($_POST['id']);
                            $nome = antiInject($_POST['nome']);
                            $conteudo = trim($_POST['conteudo']);

                            if (empty($nome) || empty($conteudo)) {
                                echo '<div class="alert alert-warning"> Os campos marcados com * são obrigatórios </div>';
                            } else {
                                $administrador = DaoAdministrador::getInstance();
                                $administrador->depoimento($id, $nome, $conteudo);
                            }

                        }
                        ?>

                        <?php
                        if (isset($parametros[3]) && is_numeric($parametros[3])) {
                            $administrador = DaoAdministrador::getInstance();
                            $adm = $administrador->listarDepoimentoPorID(antiInject($parametros[3]));
                            ?>

                            <div class="col-lg-9">

                                <br>

                                <form action="" method="post" enctype="multipart/form-data">

                                    <div class="row">
                                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $adm->id ?>">
                                        <input type="hidden" name="nome_imagem" value="<?php echo $adm->imagem ?>">
                                        <div class="form-group col-lg-8">
                                            <label for="nome">Nome </label> <span class="campo_obrigatorio"> *</span>
                                            <input type="text" class="form-control" pattern="[a-zA-Zà-úÀ-Ú\s]+$" title="Não são permitidos números e simbolos"
                                                   required id="nome" name="nome" value="<?php echo $adm->nome ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="conteudo">Conteúdo </label> <span class="campo_obrigatorio"> *</span>
                                        <textarea id="conteudo" name="conteudo" required class="form-control" rows="10"><?php echo $adm->conteudo ?></textarea>
                                        <script>
                                            CKEDITOR.replace('conteudo');
                                        </script>
                                    </div>

                                    <input type="submit" name="alterar" value="Alterar" class="btn btn-primary">
                                    <a class="btn btn-default" href="<?php echo PATH ?>/administrador">Cancelar</a>

                                </form>

                            </div>

                    </div>
                            <?php
                        } else {
                            echo '<div class="alert alert-danger"> Deve-se passar um ID </div>';
                        }
                } else if ($value == 'image') { ?>

                    <h3> Depoimentos </h3>

                    <br>

                    <div class="row">

                    <?php
                    if (isset($_POST['alterarImagem'])) {
                        $id = antiInject($_POST['id']);

                        if (empty($_FILES['img'])) {
                            echo '<div class="alert alert-warning"> O campos marcados com * são obrigatórios </div>';
                        } else {

                            //INFO IMAGEM
                            $file = $_FILES['img'];
                            $numFile = count(array_filter($file['name']));

                            //PASTA
                            $folder = "../img/photos/depoimentos";

                            //REQUISITOS
                            $permite = array('image/jpeg', 'image/png', 'image/jpg');
                            $maxSize = 1024 * 1024 * 5;

                            //MENSAGENS
                            $msg = array();
                            $errorMsg = array(
                                1 => 'O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini.',
                                2 => 'O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário HTML',
                                3 => 'o upload do arquivo foi feito parcialmente',
                                4 => 'Não foi feito o upload do arquivo'
                            );

                            if ($numFile <= 0) {
                                echo '<div class="alert alert-danger">
                                                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                     Selecione uma imagem!
                                                 </div>';
                            } else if ($numFile >= 2) {
                                echo '<div class="alert alert-danger">
                                                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                     Você ultrapassou o limite de upload.
                                                  </div>';
                            } else {
                                for ($i = 0; $i < $numFile; $i++) {
                                    $name = $file['name'][$i];
                                    $type = $file['type'][$i];
                                    $size = $file['size'][$i];
                                    $error = $file['error'][$i];
                                    $tmp = $file['tmp_name'][$i];

                                    $extensao = @end(explode('.', $name));
                                    $novoNome = rand() . ".$extensao";

                                    if ($error != 0)
                                        $msg[] = "<b>$name :</b> " . $errorMsg[$error];
                                    else if (!in_array($type, $permite))
                                        $msg[] = "<b>$name :</b> Erro imagem não suportada!";
                                    else if ($size > $maxSize)
                                        $msg[] = "<b>$name :</b> Erro imagem ultrapassa o limite de 5MB";
                                    else {

                                        if (move_uploaded_file($tmp, $folder."/".$novoNome)) {

                                            $administrador = DaoAdministrador::getInstance();
                                            $administrador->depoimentoImage($id, $novoNome);

                                            if (file_exists("../img/photos/depoimentos/".$_POST['nome_imagem']))
                                                unlink("../img/photos/depoimentos/".$_POST['nome_imagem']);

                                        } else {
                                            echo '<div class="alert alert-danger">
                                                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                                  $name : Desculpe! Ocorreu um erro...
                                                              </div>';
                                        }

                                    }
                                }

                            }
                        }

                    }
                    ?>

                    <?php
                    if (isset($parametros[3]) && is_numeric($parametros[3])) {
                        $administrador = DaoAdministrador::getInstance();
                        $adm = $administrador->listarDepoimentoPorID(antiInject($parametros[3]));
                        ?>

                        <div class="col-lg-9">

                            <br>

                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="row">
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $adm->id ?>">
                                    <input type="hidden" name="nome_imagem" value="<?php echo $adm->imagem ?>">
                                    <div class="form-group col-lg-8">
                                        <label for="nome">Nome </label> <span class="campo_obrigatorio"> *</span>
                                        <input type="text" class="form-control" disabled id="nome" name="nome" value="<?php echo $adm->nome ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <img width="100" height="100" src="<?php echo PATHPHOTOS . '/depoimentos/' . $adm->imagem ?>">
                                </div>

                                <div class="form-group">
                                    <label for="img"> Carregar Imagem </label> <span class="campo_obrigatorio"> *</span>
                                    <input type="file" id="img" name="img[]" value="<?php echo $adm->imagem ?>" required>
                                </div>

                                <input type="submit" name="alterarImagem" value="Alterar" class="btn btn-primary">
                                <a class="btn btn-default" href="<?php echo PATH ?>/administrador">Cancelar</a>

                            </form>

                        </div>

                        </div>
                        <?php
                    } else {
                        echo '<div class="alert alert-danger"> Deve-se passar um ID </div>';
                    }
                }
                break;
                case 'cancer' :
                    ?>
                    <div class="row">

                        <?php
                        if (isset($_POST['alterar'])) {
                            $categoria = antiInject($_POST['categoria']);
                            $conteudo = trim($_POST['conteudo']);

                            if (empty($categoria) || empty($conteudo)) {
                                echo '<div class="alert alert-warning"> Os campos marcados com * são obrigatórios </div>';
                            } else {
                                $administrador = DaoAdministrador::getInstance();
                                //ID = 2 PARA CATEGORIA "SOBRE O CÂNCER"
                                $administrador->categoriaSite(2, strtoupper($categoria), $conteudo);
                            }
                        }
                        ?>

                        <?php
                            $administrador = DaoAdministrador::getInstance();
                            $adm = $administrador->listarPorID(2);
                        ?>

                        <div class="col-lg-9">

                            <h3> Câncer </h3>

                            <br>

                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="form-group col-lg-8">
                                        <label for="categoria">Categoria </label> <span class="campo_obrigatorio"> *</span>
                                        <input type="text" class="form-control" pattern="[a-zA-Zà-úÀ-Ú\s]+$" title="Não são permitidos números e simbolos"
                                               size="24" maxlength="24" required id="categoria" name="categoria" value="<?php echo $adm->categoria ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="conteudo">Conteúdo </label> <span class="campo_obrigatorio"> *</span>
                                    <textarea id="conteudo" name="conteudo" required class="form-control" rows="10"><?php echo $adm->conteudo ?></textarea>
                                    <script>
                                        CKEDITOR.replace( 'conteudo' );
                                    </script>
                                </div>

                                <input type="submit" name="alterar" value="Alterar" class="btn btn-primary">
                                <a class="btn btn-default" href="<?php echo PATH ?>/administrador">Cancelar</a>

                            </form>

                        </div>

                    </div>

                    <?php
                break;
                case 'outubrorosa' :
                    ?>
                    <div class="row">

                        <?php
                        if (isset($_POST['alterar'])) {
                            $categoria = antiInject($_POST['categoria']);
                            $conteudo = trim($_POST['conteudo']);

                            if (empty($categoria) || empty($conteudo)) {
                                echo '<div class="alert alert-warning"> Os campos marcados com * são obrigatórios </div>';
                            } else {
                                $administrador = DaoAdministrador::getInstance();
                                //ID = 3 PARA CATEGORIA "OUTUBRO ROSA"
                                $administrador->categoriaSite(3, strtoupper($categoria), $conteudo);
                            }
                        }
                        ?>

                        <?php
                        $administrador = DaoAdministrador::getInstance();
                        $adm = $administrador->listarPorID(3);
                        ?>

                        <div class="col-lg-9">

                            <h3> Outubro Rosa </h3>

                            <br>

                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="form-group col-lg-8">
                                        <label for="categoria">Categoria </label> <span class="campo_obrigatorio"> *</span>
                                        <input type="text" class="form-control" pattern="[a-zA-Zà-úÀ-Ú\s]+$" title="Não são permitidos números e simbolos"
                                               size="24" maxlength="24" id="categoria" required name="categoria" value="<?php echo $adm->categoria ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="conteudo">Conteúdo </label> <span class="campo_obrigatorio"> *</span>
                                    <textarea id="conteudo" name="conteudo" class="form-control" required rows="20" cols="80"><?php echo $adm->conteudo ?></textarea>
                                    <script>
                                        CKEDITOR.replace( 'conteudo' );
                                    </script>
                                </div>

                                <input type="submit" name="alterar" value="Alterar" class="btn btn-primary">
                                <a class="btn btn-default" href="<?php echo PATH ?>/administrador">Cancelar</a>

                            </form>

                        </div>

                    </div>

                    <?php
                break;
                case 'voluntario' :
                    ?>
                    <div class="row">

                        <?php
                        if (isset($_POST['alterar'])) {
                            $categoria = antiInject($_POST['categoria']);
                            $conteudo = trim($_POST['conteudo']);

                            if (empty($categoria) || empty($conteudo)) {
                                echo '<div class="alert alert-warning"> Os campos marcados com * são obrigatórios </div>';
                            } else {
                                $administrador = DaoAdministrador::getInstance();
                                //ID = 4 PARA CATEGORIA "COMO SER VOLUNTARIO"
                                $administrador->categoriaSite(4, strtoupper($categoria), $conteudo);
                            }
                        }
                        ?>

                        <?php
                        $administrador = DaoAdministrador::getInstance();
                        $adm = $administrador->listarPorID(4);
                        ?>

                        <div class="col-lg-9">

                            <h3> Como ser Voluntário </h3>

                            <br>

                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="form-group col-lg-8">
                                        <label for="categoria">Categoria </label> <span class="campo_obrigatorio"> *</span>
                                        <input type="text" class="form-control" pattern="[a-zA-Zà-úÀ-Ú\s]+$" title="Não são permitidos números e simbolos"
                                               size="24" maxlength="24" required id="categoria" name="categoria" value="<?php echo $adm->categoria ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="conteudo">Conteúdo </label> <span class="campo_obrigatorio"> *</span>
                                    <textarea id="conteudo" name="conteudo" required class="form-control" rows="10"><?php echo $adm->conteudo ?></textarea>
                                    <script>
                                        CKEDITOR.replace( 'conteudo' );
                                    </script>
                                </div>

                                <input type="submit" name="alterar" value="Alterar" class="btn btn-primary">
                                <a class="btn btn-default" href="<?php echo PATH ?>/administrador">Cancelar</a>

                            </form>

                        </div>

                    </div>

                    <?php
                    break;
                case 'ajudar' :
                    ?>
                    <div class="row">

                        <?php
                        if (isset($_POST['alterar'])) {
                            $categoria = antiInject($_POST['categoria']);
                            $conteudo = trim($_POST['conteudo']);

                            if (empty($categoria) || empty($conteudo)) {
                                echo '<div class="alert alert-warning"> Os campos marcados com * são obrigatórios </div>';
                            } else {
                                $administrador = DaoAdministrador::getInstance();
                                //ID = 5 PARA CATEGORIA "COMO SER AJUDAR"
                                $administrador->categoriaSite(5, strtoupper($categoria), $conteudo);
                            }
                        }
                        ?>

                        <?php
                        $administrador = DaoAdministrador::getInstance();
                        $adm = $administrador->listarPorID(5);
                        ?>

                        <div class="col-lg-9">

                            <h3> Como Ajudar </h3>

                            <br>

                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="form-group col-lg-8">
                                        <label for="categoria">Categoria </label> <span class="campo_obrigatorio"> *</span>
                                        <input type="text" class="form-control" pattern="[a-zA-Zà-úÀ-Ú\s]+$" title="Não são permitidos números e simbolos"
                                               size="24" maxlength="24" required id="categoria" name="categoria" value="<?php echo $adm->categoria ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="conteudo">Conteúdo </label> <span class="campo_obrigatorio"> *</span>
                                    <textarea id="conteudo" name="conteudo" required class="form-control" rows="10"><?php echo $adm->conteudo ?></textarea>
                                    <script>
                                        CKEDITOR.replace( 'conteudo' );
                                    </script>
                                </div>

                                <input type="submit" name="alterar" value="Alterar" class="btn btn-primary">
                                <a class="btn btn-default" href="<?php echo PATH ?>/administrador">Cancelar</a>

                            </form>

                        </div>

                    </div>

                    <?php
                    break;
                case 'album' :
                    if ($value == 'list') {
                        ?>

                        <h3> Álbum de Fotos </h3>

                        <br>

                        <a href="<?php echo PATH ?>/administrador/album/add" class="btn btn-primary"> Adicionar Álbum </a>

                        <a href="<?php echo PATH ?>/administrador/album/upload" class="btn btn-info"> Upload Galeria </a>

                        <br> <br>

                        <div class="row">

                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th width="330"> Nome do álbum </th>
                                            <th> Tag Imagem </th>
                                            <th> Ações </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $conexao = DaoAdministrador::getInstance();
                                        $administrador = $conexao->listaralbum();
                                        foreach ($administrador as $adm) {
                                            ?>
                                            <tr>
                                                <td> <?php echo $adm->nome_album ?> </td>
                                                <td> <?php echo $adm->tag_album ?> </td>
                                                <td>
                                                    <a href="<?php echo PATH ?>/administrador/album/edit/<?php echo $adm->id_album ?>"
                                                       class="btn btn-primary"
                                                       title="Editar Álbum"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span> </a>
                                                    <a href="<?php echo PATH ?>/administrador/album/del/<?php echo $adm->id_album ?>"
                                                       class="btn btn-danger"
                                                       title="Deletar Álbum"> <span class="glyphicon glyphicon-remove" aria-hidden="true"> </span> </a>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    <?php } else if ($value == 'edit') { ?>

                        <h3> Editar Álbum </h3>

                        <br>


                        <div class="row">

                            <?php
                            if (isset($_POST['alterar'])) {
                                $id = antiInject($_POST['id']);
                                $nome = antiInject($_POST['nome']);
                                $tag = antiInject($_POST['tag']);

                                if (empty($nome) || empty($tag)) {
                                    echo '<div class="alert alert-warning"> Os campos marcados com * são obrigatórios </div>';
                                } else {
                                    $administrador = DaoAdministrador::getInstance();
                                    $administrador->alterarAlbum($id, $nome, $tag);
                                }

                            }
                            ?>

                            <?php
                            if (isset($parametros[3]) && is_numeric($parametros[3])) {
                                $administrador = DaoAdministrador::getInstance();
                                $adm = $administrador->listarAlbumoPorID(antiInject($parametros[3]));
                                ?>

                                <div class="col-lg-9">

                                    <br>

                                    <form action="" method="post" enctype="multipart/form-data">

                                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $adm->id_album ?>">

                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label for="nome">Nome </label> <span class="campo_obrigatorio"> *</span>
                                                <input type="text" class="form-control" id="nome"  size="22" maxlength="22"
                                                       name="nome" value="<?php echo $adm->nome_album ?>" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label for="tag">Tag álbum </label> <span class="campo_obrigatorio"> *</span>
                                                <input type="text" class="form-control" id="tag" pattern="[a-z0-9]+" name="tag" value="<?php echo $adm->tag_album ?>" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <img width="100" height="100" src="<?php echo PATHPHOTOS . '/galeria/' . $adm->tag_album . '/' . $adm->imagem_album ?>">
                                        </div>

                                        <input type="submit" name="alterar" value="Alterar" class="btn btn-primary">
                                        <a class="btn btn-default" href="<?php echo PATH ?>/administrador">Cancelar</a>

                                    </form>

                                </div>
                                <?php
                            } else {
                                echo '<div class="alert alert-danger"> Deve-se passar um ID </div>';
                            }?>

                        </div>

                        <?php
                    } else if ($value == 'upload') { ?>

                        <h3> Selecionar Imagens para a Galeria </h3>

                        <br>

                        <div class="row">

                            <div class="col-lg-9">

                                <br>

                                <?php
                                $conexao = DaoAdministrador::getInstance();
                                $administrador = $conexao->listaralbum();
                                if (count($administrador) > 0) {
                                ?>

                                    <div class="progress" style="display: none;">
                                        <div id="progresso" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0"
                                             aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                                    </div>

                                <form id="upload_album" action="" method="post" >

                                    <div class="row">
                                        <div class="form-group col-lg-5">
                                            <label> Selecione o Álbum </label> <span class="campo_obrigatorio"> *</span>
                                            <select class="form-control" id="album">
                                                <?php
                                                    foreach ($administrador as $adm) {
                                                        echo '<option id="'.$adm->tag_album.'" value="'.$adm->tag_album.'">'.$adm->nome_album.'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="row">
                                        <div class="form-group col-lg-5">
                                            <label for="imagem"> Escolher Imagens </label> <span class="campo_obrigatorio"> *</span>
                                            <input id="imagem" type="file" accept="image/*" multiple/>
                                        </div>
                                    </div>

                                    <a class="btn btn-primary" href="<?php echo PATH ?>/administrador">Voltar</a>

                                </form>

                                <?php } else {
                                    echo "<h4> Para realizar o upload é preciso adicionar um album à galeria. </h4>";
                                } ?>

                            </div>

                        </div>

                        <?php
                    } else if ($value == 'add') {
                        ?>
                        <h3> Criar Álbum </h3>

                        <br>

                        <div class="row">

                            <div class="col-lg-9">

                                <br>

                                <div id="result_album"> </div>

                                <form id="criar_album" method="post" >

                                    <div class="row">
                                        <div class="form-group col-lg-8">
                                            <label for="nome">Nome </label> <span class="campo_obrigatorio"> *</span>
                                            <input type="text" class="form-control" id="nome" name="nome" size="22" maxlength="22" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-8">
                                            <label for="tag">Tag álbum </label> <span class="campo_obrigatorio"> *</span>
                                            <input type="text" class="form-control" pattern="[a-z0-9]+" id="tag" name="tag" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-5">
                                            <label for="imagem"> Capa do Álbum </label> <span class="campo_obrigatorio"> *</span>
                                            <input id="capa_imagem_add" type="file" accept="image/*" required/>
                                        </div>
                                    </div>

                                    <input type="submit" name="adicionar" value="Adicionar" class="btn btn-primary">
                                    <a class="btn btn-default" href="<?php echo PATH ?>/administrador">Cancelar</a>

                                </form>

                            </div>

                            <div class="col-lg-3">
                                <div class="alert alert-warning">
                                    <h5>Tag álbum <span class="campo_obrigatorio"> *</span></h5>
                                    <p>
                                    Ao criar o álbum, o mesmo deve ser adicionado de acordo com a última tag do álbum criado.
                                    Ex.: Se a última tag do álbum for "album02", então o próximo deverá ser "album03" (Sem acentuações).
                                    </p>
                                </div>
                            </div>

                        </div>
                        <?php
                    } else if ($value == 'del') { ?>

                        <h3> Deletar Álbum </h3>

                        <br>

                        <div class="row">

                            <?php
                                if (isset($_POST['deletar'])) {
                                    $id = antiInject($_POST['id']);
                                    $administrador = DaoAdministrador::getInstance();
                                    $administrador->deletarAlbum($id);

                                    if (is_dir("../img/photos/galeria/".$_POST['tag_album'])) {
                                        rrmdir("../img/photos/galeria/" . $_POST['tag_album']);
                                        rrmdir("../img/photos/galeria/thumb-" . $_POST['tag_album']);
                                    }
                                }
                            ?>

                            <?php
                            if (isset($parametros[3]) && is_numeric($parametros[3])) {
                                $administrador = DaoAdministrador::getInstance();
                                $adm = $administrador->listarAlbumoPorID(antiInject($parametros[3]));
                            ?>

                                <div class="col-lg-9">

                                    <br>

                                    <form action="" method="post" enctype="multipart/form-data">

                                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $adm->id_album ?>">
                                        <input type="hidden" name="tag_album" value="<?php echo $adm->tag_album ?>">
                                        <div class="row">
                                            <div class="form-group col-lg-8">
                                                <label for="nome">Nome </label>
                                                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $adm->nome_album ?>" disabled>
                                            </div>
                                        </div>

                                        <input type="submit" name="deletar" value="Deletar" class="btn btn-primary">
                                        <a class="btn btn-default" href="<?php echo PATH ?>/administrador">Cancelar</a>

                                    </form>

                                </div>
                                <?php
                            } else {
                                echo '<div class="alert alert-danger"> Deve-se passar um ID </div>';
                            }?>

                        </div>

                        <?php
                    }

                    break;
            }
                    ?>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->




