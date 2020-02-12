<?php

class __MyTemplates_937956f1a48ef0afe5ad62b54f264276 extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        if ($partial = $this->mustache->loadPartial('layouts/top_page_layout.mustache')) {
            $buffer .= $partial->renderInternal($context);
        }
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('layouts/nav.mustache')) {
            $buffer .= $partial->renderInternal($context);
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<section class="article">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	<div class="container">
';
        $buffer .= $indent . '	
';
        $buffer .= $indent . '		<h1>Depoimentos</h1>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	<div class="article-body text-justify mt-4">
';
        $buffer .= $indent . '		<blockquote class="blockquote">
';
        $buffer .= $indent . '		  <p class="mb-0">A Rede Feminina para mim é o meu segundo lar, considero as voluntárias a minha segunda familia. Aqui o contato com cada uma delas é mais que amizade, podemos contar com um ombro amigo, conseguimos através delas remédios que não temos condições de comprar, frutas, cereais e cesta básica que nos ajuda e muito. Aqui nós pacientes somos muito bem acolhidos, onde me sinto muito bem, minha vida mudou muito depois que passei a freguentar a casa da Rede Feminina, mudou para melhor, hoje sou uma pessoa feliz. </p>
';
        $buffer .= $indent . '		  <footer class="blockquote-footer">Josiane Maciel</footer>
';
        $buffer .= $indent . '		</blockquote>
';
        $buffer .= $indent . '		<hr>
';
        $buffer .= $indent . '	</div>
';
        $buffer .= $indent . '	
';
        $buffer .= $indent . '	<div class="article-body text-justify mt-5">
';
        $buffer .= $indent . '		<blockquote class="blockquote">
';
        $buffer .= $indent . '		  <p class="mb-0">LA Rede Feminina de Combate ao Câncer junto às voluntárias desenvolvem um trabalho de recuperação da saúde e da autoestima dos pacientes. Aqui os pacientes se sentem como se estivessem em sua própria casa, aqui eu recuperei a minha saúde, amo muito tudo isso.
';
        $buffer .= $indent . '</p>
';
        $buffer .= $indent . '		  <footer class="blockquote-footer">Joana Domingues</footer>
';
        $buffer .= $indent . '		</blockquote>
';
        $buffer .= $indent . '		<hr>
';
        $buffer .= $indent . '	</div>
';
        $buffer .= $indent . '	
';
        $buffer .= $indent . '	<div class="article-body text-justify mt-5">
';
        $buffer .= $indent . '		<blockquote class="blockquote">
';
        $buffer .= $indent . '		  <p class="mb-0">A Rede Feminina significa muito para mim, foi onde encontrei ajuda de todas as voluntárias, sempre todas atenciosas e com uma palavra amiga. Foi na Rede Feminina que encontrei forças para lutar contra a minha enfermidade e hoje estou curada, tenho só que agradecer por essas pessoas maravilhosas que tenho um imenso carinho.
';
        $buffer .= $indent . 'Só Deus para recompensar o que cada uma delas fizeram e fazem por mim, Deus abençoe todas!</p>
';
        $buffer .= $indent . '		  <footer class="blockquote-footer"> Elga</footer>
';
        $buffer .= $indent . '		</blockquote>
';
        $buffer .= $indent . '		<hr>
';
        $buffer .= $indent . '	</div>
';
        $buffer .= $indent . '	
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</section>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('layouts/footer.mustache')) {
            $buffer .= $partial->renderInternal($context);
        }
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('layouts/bottom_page_layout.mustache')) {
            $buffer .= $partial->renderInternal($context);
        }

        return $buffer;
    }
}
