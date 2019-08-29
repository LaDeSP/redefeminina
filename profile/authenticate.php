<?php
    session_start();
    ob_start();
    header('Content-Type: text/html; charset=UTF-8');
    include_once dirname(__DIR__) . '/profile/classes/autoload.php';
    if (islogado()) {
        header("Location: ". PATH . '/');
    }
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta http-equiv="Content-type" value="text/html; charset=UTF-8" />
    <title> Rede Feminina de Combate ao Câncer de Corumbá-MS </title>
    <link rel="shortcut icon" href="<?php echo PATHSITE ?>/img/themes/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Mulher conciente na luta contra o câncer de mama">
    <meta name="keywords" content="Rede Feminina Corumbá-MS, Combate ao Câncer, Outubro Rosa">
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <style>
        <?php
            echo file_get_contents(PATHSITE.'/public/css/style.min.css');
        ?>
    </style>
</head>

<body>

<div class="container login">

    <?php

    if (isset($_POST['entrar'])) {
        if (!empty($_POST['usuario']) && !empty($_POST['senha'])) {

            $usuario = antiInject($_POST['usuario']);
            $senha = antiInject($_POST['senha']);

            $conexao = DaoVoluntaria::getInstance();
            $conexao->validarLogin($usuario, $senha);

        } else {
            echo '<div class="alert alert-danger"> Preencha devidamente os campos! </div>';
        }
    }

    ?>

    <div class="col-lg-4 col-lg-offset-4">

        <div class="panel panel-default">
            <div class="panel-body">
                <form action="" method="post" enctype="multipart/form-data">

                    <img alt="Rede Feminina Corumbá-MS" src="<?php echo PATHSITE ?>/img/themes/logo.png" class="img-responsive">

                    <div class="form-group">
                        <label for="usuario">Usuário</label>
                        <input type="text" id="usuario" name="usuario" autofocus class="form-control" size="15" maxlength="15" title="Usuário" required>
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" id="senha" name="senha" class="form-control" size="20" maxlength="20" title="Senha" required>
                    </div>

                    <input type="submit" id="entrar" style="background: #f06292;color: white; font-weight: bold;" value="ENTRAR" name="entrar" class="btn btn-block">
                </form>
            </div>
        </div>

    </div>

</div>
<br>
<div class="container">
    <p class="contato-sistema"> &copy 2016 - Todos os direitos reservados. <br>
        Desenvolvido por <a href="https://br.linkedin.com/in/westerley-da-silva-reis-9140b79a" target="_brank"> Westerley Reis</a>, <a href="https://br.linkedin.com/in/bruno-pimenta-47935811a" target="_brank"> Bruno Pimenta </a> & <a href="https://br.linkedin.com/in/bruno-allison-82858a9a" target="_brank"> Bruno Santos </a>
    </p>
</div>

</body>

</html>

<?php
ob_end_flush();
?>