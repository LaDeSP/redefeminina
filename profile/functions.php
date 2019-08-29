<?php

include_once dirname(__DIR__) . '/profile/classes/autoload.php';
protegeArquivo(basename(__FILE__));

function criptografar(string $pass) : string {
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    return $hash;
}

//Verifica se o usuário esta logado
function islogado () : bool {
    if (isset($_SESSION['id_user']) && isset($_SESSION['user']) && isset($_SESSION['username'])
        && isset($_SESSION['ip_user']) && ($_SESSION['ip_user'] == $_SERVER['REMOTE_ADDR'])) {
        return true;
    } else {
        return false;
    }
}

//Desloga do sistema
function logout() {
    if (islogado()) {
        session_destroy();
        echo '<meta http-equiv="refresh" content="0;URL=authenticate.php">';
    }
}

//Verifica se o usuário logado estiver inativo por mais de 30 minutos
function expirarSessao() {
    if (isset($_SESSION['time_sessao'])) {
        $segundos = time() - $_SESSION['time_sessao'];
        if ($segundos > 1800) {
            session_destroy();
        } else {
            $_SESSION['time_sessao'] = time();
        }
    }
}

//Verifica se o usuario logado é Administrador
function isAdmin () : bool {
    $conexao = DaoVoluntaria::getInstance();
    $voluntaria = $conexao->listarPorID($_SESSION['id_user']);
    if ($voluntaria->nivel_acesso == 'Presidência'){
        return true;
    } else {
        return false;
    }
}

//Verifica se o usuario logado é Assistente Social
function isAssistente () : bool {
    $conexao = DaoVoluntaria::getInstance();
    $voluntaria = $conexao->listarPorID($_SESSION['id_user']);
    if ($voluntaria->nivel_acesso == 'Assistente Social'){
        return true;
    } else {
        return false;
    }
}

//Verifica se o usuario logado é Nutricionista
function isNutricionista () : bool {
    $conexao = DaoVoluntaria::getInstance();
    $voluntaria = $conexao->listarPorID($_SESSION['id_user']);
    if ($voluntaria->nivel_acesso == 'Nutricionista'){
        return true;
    } else {
        return false;
    }
}

//Verifica se o usuario logado é Fisioterapeuta
function isFisioterapeuta () : bool {
    $conexao = DaoVoluntaria::getInstance();
    $voluntaria = $conexao->listarPorID($_SESSION['id_user']);
    if ($voluntaria->nivel_acesso == 'Fisioterapeuta'){
        return true;
    } else {
        return false;
    }
}

//Verifica se o usuario logado é Secretaria
function isSecretaria () : bool {
    $conexao = DaoVoluntaria::getInstance();
    $voluntaria = $conexao->listarPorID($_SESSION['id_user']);
    if ($voluntaria->nivel_acesso == 'Secretária'){
        return true;
    } else {
        return false;
    }
}

//Verifica se o usuario logado é Tesoureira
function isTesoureira () : bool {
    $conexao = DaoVoluntaria::getInstance();
    $voluntaria = $conexao->listarPorID($_SESSION['id_user']);
    if ($voluntaria->nivel_acesso == 'Tesoureira'){
        return true;
    } else {
        return false;
    }
}

//Redireciona a pagina caso nao esteje logado
function redireciona() {
    if (!islogado()) {
        header("Location: " . PATH . '/authenticate.php');
    }
}

//Protege as páginas contra acesso direto
function protegeArquivo (string $nomeArquivo) {
    $url = $_SERVER["PHP_SELF"];
    if (preg_match("/$nomeArquivo/i", $url)) {
        redireciona();
    }
}

//Limita a exibição de texto do site (COMO SER VOLUNTARIA, COMO AJUDAR)
function limitarTexto(string $texto, int $limite) : string {
    $caminho = PATHINFO;
    $contador = strlen($texto);
    if ( $contador >= $limite ) {
        $texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . ' ... <a href="'.$caminho.'/ajuda.php" class="limita_texto"> Saiba mais </a>';
        return $texto;
    }
    else{
        return $texto;
    }
}

//Função para remover excesso de espaços em branco, tags (HTML, PHP) e palavras que contenham sintaxe sql
function antiInject($string) : string {
    $string = preg_replace("/(from|select|insert|delete|where|drop table|show tables|\*|--|\\\\)/i","", $string);
    $string = trim($string);
    $string = strip_tags($string);

    return $string;
}

//Função para excluir a pasta do album
function rrmdir(string $src) {
    $dir = opendir($src);
    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            $full = $src . '/' . $file;
            if ( is_dir($full) ) {
                rrmdir($full);
            }
            else {
                unlink($full);
            }
        }
    }
    closedir($dir);
    rmdir($src);
}

//Função para contar a quantidade de Imagens dentro do album
function contarImagens (string $caminho) : int {
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

    return count($arquivos);

}