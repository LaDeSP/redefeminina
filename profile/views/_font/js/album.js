// Iniciando biblioteca
var resize = new window.resize();
resize.init();

var imagens;
var imagem_atual;

$(function ($) {

    // Quando selecionado as imagens
    $('#imagem').on('change', function () {
        enviar();
    });

    // Quando enviado o formulário
    $('#criar_album').submit(function(e) {
        e.preventDefault();
        criarAlbum();
    });

});

function enviar()
{
    // Verificando se o navegador tem suporte aos recursos para redimensionamento
    if (!window.File || !window.FileReader || !window.FileList || !window.Blob) {
        alert('O navegador não suporta os recursos utilizados pelo aplicativo');
        return;
    }

    // Alocando imagens selecionadas
    imagens = $('#imagem')[0].files;
    album = $('#album').val();

    // Se selecionado pelo menos uma imagem
    if (imagens.length > 0)
    {
        // Definindo progresso de carregamento
        $('.progress').show();
        $('#progresso').attr('aria-valuenow', 0).css('width', '0%');

        // Escondendo campo de imagem
        $('#upload_album').hide();

        // Iniciando redimensionamento
        imagem_atual = 0;
        redimensionar();
    }
}

/*
 Redimensiona uma imagem e passa para a próxima recursivamente
 */
function redimensionar()
{
    // Se redimensionado todas as imagens
    if (imagem_atual > imagens.length)
    {
        // Definindo progresso de finalizado
        $('#progresso').html('Imagen(s) enviada(s) com sucesso');

        // Limpando imagens
        limpar();

        // Exibindo campo de imagem
        $('.progress').hide();
        $('#upload_album').show();

        // Finalizando
        return;
    }

    // Se não for um arquivo válido
    if ((typeof imagens[imagem_atual] !== 'object') || (imagens[imagem_atual] == null))
    {
        // Passa para a próxima imagem
        imagem_atual++;
        redimensionar();
        return;
    }

    // Redimensionando
    resize.photo(imagens[imagem_atual], 800, 'dataURL', function (imagem) {

        // Salvando imagem no servidor
        $.post('../../ajax.php', {categoria: "upload_album", imagem: imagem, album: album}, function() {

            // Definindo porcentagem
            var porcentagem = (imagem_atual + 1) / imagens.length * 100;

            // Atualizando barra de progresso
            $('#progresso').text(Math.round(porcentagem) + '%').attr('aria-valuenow', porcentagem).css('width', porcentagem + '%');

            // Aplica delay de 1 segundo
            setTimeout(function () {
                // Passa para a próxima imagem
                imagem_atual++;
                redimensionar();
            }, 1000);

        });

    });
}

/*
 Limpa os arquivos selecionados
 */
function limpar()
{
    var input = $("#imagem");
    input.replaceWith(input.val('').clone(true));
}

function criarAlbum()
{

    if (!window.File || !window.FileReader || !window.FileList || !window.Blob) {
        alert('O navegador não suporta os recursos utilizados pelo aplicativo');
        return;
    }

    nome = $('#nome').val();
    tag = $('#tag').val();
    imagens = $('#capa_imagem_add')[0].files;

    if (imagens.length > 0)
    {
        imagem_atual = 0;
        redimensionarAlbum();
    }
}

function redimensionarAlbum()
{

    if (imagem_atual > imagens.length)
    {
        limpar();
        return;
    }

    if ((typeof imagens[imagem_atual] !== 'object') || (imagens[imagem_atual] == null))
    {
        imagem_atual++;
        redimensionarAlbum();
        return;
    }

    resize.photo(imagens[imagem_atual], 800, 'dataURL', function (imagem) {

        $.post('../../ajax.php', {categoria: "criar_album", nome: nome, tag: tag, imagem_album: imagem}, function () {
            $("#result_album").html("<div class='alert alert-success'> Inserido com sucesso </div>");
        });

    });
}