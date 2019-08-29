<?php

include_once dirname(__DIR__) . '/profile/classes/autoload.php';
include_once dirname(__DIR__) . "/profile/lib/WideImage.php";
protegeArquivo(basename(__FILE__));

if (isset($_POST['categoria']) && $_POST['categoria'] == "criar_album") {
    $nome = $_POST['nome'];
    $tag = $_POST['tag'];
    $imagem = $_POST['imagem_album'];
    $thumbImagem = WideImage::load($imagem);

    mkdir("../img/photos/galeria/{$tag}");
    mkdir("../img/photos/galeria/thumb-{$tag}");

    $redimensionar = $thumbImagem->resize(250, 200, 'fill');

    list($tipo, $dados) = explode(';', $imagem);

    list(, $tipo) = explode(':', $tipo);

    list(, $dados) = explode(',', $dados);

    $dados = base64_decode($dados);

    $nome_imagem = rand() + time();

    file_put_contents("../img/photos/galeria/{$tag}/{$nome_imagem}.jpg", $dados);
    $redimensionar->saveToFile("../img/photos/galeria/thumb-{$tag}/{$nome_imagem}.jpg");

    $administrador = DaoAdministrador::getInstance();
    $administrador->criarAlbum($nome, $tag, "{$nome_imagem}.jpg");
}


if (isset($_POST['categoria']) && $_POST['categoria'] == "upload_album") {
    $imagem = $_POST['imagem'];
    $album = $_POST['album'];
    $thumbImagem = WideImage::load($imagem);
    $redimensionar = $thumbImagem->resize(210, 200, 'fill');

    list($tipo, $dados) = explode(';', $imagem);

    list(, $tipo) = explode(':', $tipo);

    list(, $dados) = explode(',', $dados);

    $dados = base64_decode($dados);

    $nome_imagem = rand() + time();

    file_put_contents("../img/photos/galeria/{$album}/{$nome_imagem}.jpg", $dados);
    $redimensionar->saveToFile("../img/photos/galeria/thumb-{$album}/{$nome_imagem}.jpg");
}