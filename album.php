<?php include_once dirname(__FILE__) . '/profile/classes/autoload.php' ?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-type" value="text/html; charset=UTF-8" />
    <title> Rede Feminina de Combate ao Câncer de Corumbá-MS </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo PATHSITE ?>/img/themes/favicon.ico" />
    <meta name="description" content="A Rede Feminina de Combate ao Câncer de Corumbá é uma entidade civil sem fins lucrativos,
	que desenvolve um papel de grande relevância social no município por meio de ações de combate ao câncer.">
    <meta name="keywords" content="Rede Feminina Corumbá-MS, Combate ao Câncer, Outubro Rosa">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <style>
        <?php
            echo file_get_contents(PATHSITE.'/public/css/style.min.css');
            echo file_get_contents(PATHSITE.'/public/css/fotos.min.css');
            echo file_get_contents(PATHSITE.'/public/css/lightbox.min.css');
        ?>
    </style>
</head>

<body>

<header class="container">
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <a class="navbar-brand" id="nome-logo" href="index.php">
                Rede Feminina de Combate ao Câncer
            </a>
            <a class="navbar-brand" id="logo" href="index.php">
                <img alt="Rede Feminina Corumbá-MS" src="img/themes/logo.png" class="img-responsive">
            </a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li> <a href="index.php#home"> Home </a> </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Sobre a Rede <i class="caret"> </i> </a>
                    <ul class="dropdown-menu">
                        <li> <a href="index.php#quem-somos"> Quem Somos </a> </li>
                        <li> <a href="index.php#parceiros"> Parceiros </a> </li>
                        <li> <a href="<?php echo PATHSITE ?>/album.php"> Galeria de Fotos </a> </li>
                    </ul>
                <li> <a href="index.php#depoimentos"> Depoimentos </a> </li>
                <li> <a href="index.php#contato"> Contato </a> </li>
            </ul>
        </div>
    </nav>
</header>

<div id="divi-rosa"> </div>

<section>
    <div class="container">
        <div class="row">

            <h2 class="section-titulo"> GALERIA DE FOTOS </h2>
            <div class="divisoria"> <img src="img/themes/divisoria-rosa.png"> </div>

            <div class="sobre">

                <?php

                    $diretorio = "img/photos/galeria";

                    if (isset($_GET["a"]) && $_GET["a"] != '') {
                        $a = $_GET["a"];
                        $diretorio = "img/photos/galeria/$a";
                        if (is_dir($diretorio)) {
                            listarSubDiretorio($a);
                        } else {
                            echo "<h3 class='text-center'> Nenhum álbum encontrado!!! </h3>";
                        }
                    } else {
                        echo "<h3 id='title-album'> Selecione um Álbum </h3>";
                        listarDiretorio($diretorio);
                    }

                    //Lista os albuns do site
                    function listarDiretorio ($caminho) {
                        $diretorio = $caminho;
                        $ponteiro  = opendir($diretorio);

                        while ($nome_itens = readdir($ponteiro)) {
                            $itens[] = $nome_itens;
                        }

                        foreach ($itens as $listar) {
                            if ($listar != "." && $listar != ".." ){
                                $arquivos[] = $listar;
                            }
                        }
                        include_once dirname(__FUNCTION__) . '/profile/classes/conexao.class.php';
                        include_once dirname(__FUNCTION__) . '/profile/classes/daoadministrador.class.php';
                        $conexao = DaoAdministrador::getInstance();
                        $administrador = $conexao->listarAlbum();

                        if ($arquivos != "") {
                           echo "<ul id='album'>";
                           foreach ($administrador as $adm) {
                                   echo "  <li>
                                               <a href='?a=$adm->tag_album&pag=1'>
                                                   <img src='$diretorio/thumb-$adm->tag_album/$adm->imagem_album' title='$adm->nome_album' class='img-responsive'>
                                                   <span> <h4> $adm->nome_album </h4> ".contarImagens('img/photos/galeria/'.$adm->tag_album)." Fotos </span>
                                               </a>
                                           </li>";
                           }
                           echo "</ul>";
                        }

                    }

                    //Lista as imagens do album
                    function listarSubDiretorio ($tag) {
                        $diretorio = "img/photos/galeria/thumb-$tag";
                        $ponteiro  = opendir($diretorio);
                        $total = contarImagens($diretorio); // Conta o total de registros
                        $registros = 16; //Numero de registro que será exibido
                        $pagina = $_GET['pag'] ?? 1; //Pega a pagina vinda da URL
                        $numPaginas = ceil($total / $registros);
                        $inicio = ($registros * $pagina) - $registros;

                        while ($nome_itens = readdir($ponteiro)) {
                            $itens[] = $nome_itens;
                        }

                        foreach ($itens as $listar) {
                            if ($listar != "." && $listar != ".."){
                                $arquivos[] = $listar;
                            }
                        }

                        if ($arquivos != "") {
                            echo "<ul id='album-img'>";
                                    for ($i = $inicio; $i < $inicio + $registros && $i < $total; $i++) {
                                        echo "  <li>
                                                    <a data-lightbox='roadtrip' href='img/photos/galeria/$tag/$arquivos[$i]'>
                                                        <img src='$diretorio/$arquivos[$i]' class='img-responsive'>
                                                    </a>
                                                </li>";
                                    }
                            echo "</ul>";

                            if ($numPaginas > 1) {
                                ?>
                                <nav class="col-lg-offset-5">
                                    <ul class="pagination">
                                        <li>
                                            <a href="<?php echo '?a='.$_GET["a"].'&pag='; if ($pagina >  1) {echo $pagina - 1;} else {echo $pagina = 1;} ?>" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <?php
                                        for ($i = 1; $i < $numPaginas + 1; $i++) {
                                            echo '<li> <a href="?a='.$_GET["a"].'&pag='. $i . '">'.$i.'</a> </li>';
                                        }
                                        ?>
                                        <li>
                                            <a href="<?php echo '?a='.$_GET["a"].'&pag='; if ($pagina < $numPaginas) {echo $pagina + 1;} else {echo $pagina = 1;} ?>" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                                <?php
                            }
                        }
                    }

                ?>

            </div>

        </div>

    </div>

</section>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="<?php echo PATHSITE ?>/public/js/script.min.js"> </script>
<script src="<?php echo PATHSITE ?>/public/js/lightbox.min.js"> </script>

</body>

</html>