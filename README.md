<h1>Rede Feminina</h1>

<p>O projeto atual está sendo feito com o framework YII2 (<a href="https://www.yiiframework.com/doc/guide/2.0/pt-br">link</a>) e utiliza o composer localmente para gerenciar as dependências. O arquivo composer.phar é o executavel e para utilizá-lo, basicamente abra um terminal no diretório do projeto e execute : php composer.phar "comando"</p>

<p>O comando mais utilizado será o "update". Esse comando irá carregar as dependencias do projeto. Sempre que os comandos git clone ou pull forem utilizados, recomenda-se rodar "php composer.phar update" para verificar se alguma dependencia foi adicionada ao projeto e evitar erros por falta das mesmas.</p>

<p>Porém, antes de rodar o comando "update" do composer, verifique se a pasta "vendor" existe na raiz do projeto. Esse diretório armazena as dependecias carregadas pelo composer e se caso ele não exista o comando update irá falhar.</p>
