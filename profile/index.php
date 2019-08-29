<?php
    session_start();
    ob_start();
    header('Content-Type: text/html; charset=UTF-8');
    include_once dirname(__DIR__) . '/profile/classes/autoload.php';

    redireciona();

    expirarSessao();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-type" value="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo PATHSITE ?>/img/themes/favicon.ico" />
    <meta name="description" content="Mulher conciente na luta contra o câncer de mama">

    <title> Rede Feminina de Combate ao Câncer de Corumbá-MS </title>
    <link rel="shortcut icon" href="<?php echo PATHSITE ?>/img/themes/favicon.ico" />

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        <?php
            echo file_get_contents(VIEWS.'/_font/css/w3.min.css');
            echo file_get_contents(VIEWS.'/_font/css/jquery.dataTables.min.css');
            echo file_get_contents(VIEWS.'/_font/css/dataTables.bootstrap.min.css');
            echo file_get_contents(VIEWS.'/_font/css/sb-admin.min.css');
            echo file_get_contents(VIEWS.'/_font/css/Jcrop.min.css');
        ?>
    </style>

    <!-- CKeditor -->
    <script src="<?php echo PATH ?>/cms/ckeditor/ckeditor.js"></script>

</head>

<body>

    <div id="wrapper">

        <div id="page-wrapper">

            <?php
                include_once dirname(__DIR__) . "/profile/views/_includes/menu.php";
            ?>

            <div class="container-fluid">

                <?php
                    if($_GET){


                    $url = strip_tags($_GET['url']) ?? '';
                    $parametros = explode("/", $url);

                    /**
                     * $controller - Arquivo que sera chamado (ex.: voluntaria, administrador, ajuda)
                     * $action - Ação que sera realizada (ex.: add, del, edit, list)
                     * $value - caso tenha um id que será passada para a ação (ex.: 1, 2, 3)
                     * EXEMPLO - redefemininacorumba/profile/voluntaria/edit/3
                     */

                    $controller = antiInject($parametros[0]);
                    $action = antiInject($parametros[1]);
                    $value = antiInject($parametros[2]);
                    $paginas_permitidas = array("administrador", "ajuda", "cestabasica", "estoque", "financeiro", "nutricionista", "projetos", "assistente", "voluntaria", "paciente", "consult", "addConsult", "fisioterapeuta", "gerenciar", "produtos");
                    }

                    if (isset($controller)) {
                        if ($controller == 'index' || $controller == ''){
                            include_once dirname(__DIR__) . "/profile/views/sistema/home.php";
                        } else if ($controller == 'logout') {
                            logout();
                        }
                        else if (in_array($controller, $paginas_permitidas)) {
                            include_once dirname(__DIR__) . "/profile/views/sistema/" . $controller . ".php";
                        }
                        else {
                            include_once dirname(__DIR__) . "/profile/views/sistema/home.php";
                        }
                    }

                ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- CSS Air-datepicker -->
    <link href="<?php echo VIEWS ?>/_font/css/datepicker.min.css" rel="stylesheet" type="text/css">

    <!-- Custom Fonts -->
    <link href="<?php echo VIEWS ?>/_font/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <!-- Strength Password -->
    <script src="<?php echo VIEWS ?>/_font/js/pstrength.min.js"></script>

    <!-- Jquery DataTable -->
    <script src="<?php echo VIEWS ?>/_font/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo VIEWS ?>/_font/js/dataTables.bootstrap.min.js"></script>

    <!-- JQuery Plugin masked input-->
    <script src="<?php echo VIEWS ?>/_font/js/maskedinput.min.js"></script>

    <!-- JQuery air-datepicker-->
    <script src="<?php echo VIEWS ?>/_font/js/datepicker.min.js"></script>

    <!-- script-->
    <script src="<?php echo VIEWS ?>/_font/js/script.min.js"></script>
    <script src="<?php echo VIEWS ?>/_font/js/canvas-to-blob.min.js"></script>
    <script src="<?php echo VIEWS ?>/_font/js/resize.js"></script>
    <script src="<?php echo VIEWS ?>/_font/js/album.js"></script>

    <!-- Jcrop -->
    <script src="<?php echo VIEWS ?>/_font/js/Jcrop.min.js"></script>

</body>

</html>

<?php
ob_end_flush();
?>