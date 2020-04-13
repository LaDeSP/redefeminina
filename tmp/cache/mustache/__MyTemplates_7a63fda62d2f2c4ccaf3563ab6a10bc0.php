<?php

class __MyTemplates_7a63fda62d2f2c4ccaf3563ab6a10bc0 extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        if ($partial = $this->mustache->loadPartial('acesso_publico/layouts/top_page_layout.mustache')) {
            $buffer .= $partial->renderInternal($context);
        }
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('acesso_publico/layouts/nav.mustache')) {
            $buffer .= $partial->renderInternal($context);
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<!-- Banner da página -->
';
        $buffer .= $indent . '<section class="banner">
';
        $buffer .= $indent . '	<div class="container h-100">
';
        $buffer .= $indent . '	  <div class="row h-100 justify-content-end align-items-center">
';
        $buffer .= $indent . '		<div class="col-lg-4">
';
        $buffer .= $indent . '		  <h1 class="banner-text"><strong>Rede feminina em combate contra o cancer de mama</strong></h1>
';
        $buffer .= $indent . '		  <p class="banner-text">Participe dessa luta.</p>
';
        $buffer .= $indent . '		</div>
';
        $buffer .= $indent . '	  </div>
';
        $buffer .= $indent . '	</div>
';
        $buffer .= $indent . '</section>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<!-- Área de informações -->
';
        $buffer .= $indent . '<div class="b-4" style="padding:20px">
';
        $buffer .= $indent . '	<span></span>
';
        $buffer .= $indent . '</div>
';
        $buffer .= $indent . '<section class="sec-top">
';
        $buffer .= $indent . '	<div class="container">
';
        $buffer .= $indent . '		<h1>Informações</h1>
';
        $buffer .= $indent . '		<br>
';
        $buffer .= $indent . '		<div class="row justify-content-center mt-3">
';
        $buffer .= $indent . '			<div class="col-md">
';
        $buffer .= $indent . '				<a href="/luta_contra_cancer"><img src="img/cancer.png" alt="" class="img-thumbnail mx-auto d-block m-3"></a>
';
        $buffer .= $indent . '			</div>
';
        $buffer .= $indent . '			<!--div class="col-md">
';
        $buffer .= $indent . '				<img src="';
        $value = $this->resolveValue($context->findDot('app.baseUrl'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '/img/eventos.png" alt="" class="img-thumbnail mx-auto d-block m-3">
';
        $buffer .= $indent . '			</div-->
';
        $buffer .= $indent . '			<div class="col-md">
';
        $buffer .= $indent . '				<a href="/outubro_rosa"><img src="img/outubro-rosa.png" alt="" class="img-thumbnail mx-auto d-block m-3"></a>
';
        $buffer .= $indent . '			</div>
';
        $buffer .= $indent . '			<div class="col-md">
';
        $buffer .= $indent . '				<a href="/como_ajudar"><img src="img/ajuda.png" alt="" class="img-thumbnail mx-auto d-block m-3"></a>
';
        $buffer .= $indent . '			</div>
';
        $buffer .= $indent . '		</div>
';
        $buffer .= $indent . '	</div>
';
        $buffer .= $indent . '</section>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<section class="sec-top" id="quem-somos">
';
        $buffer .= $indent . '	<div class="container">
';
        $buffer .= $indent . '		';
        $value = $this->resolveValue($context->find('quemSomos'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '
';
        $buffer .= $indent . '	</div>
';
        $buffer .= $indent . '</section>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('acesso_publico/layouts/footer.mustache')) {
            $buffer .= $partial->renderInternal($context);
        }
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('acesso_publico/layouts/bottom_page_layout.mustache')) {
            $buffer .= $partial->renderInternal($context);
        }

        return $buffer;
    }
}
