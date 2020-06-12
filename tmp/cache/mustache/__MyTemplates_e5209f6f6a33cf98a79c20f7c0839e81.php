<?php

class __MyTemplates_e5209f6f6a33cf98a79c20f7c0839e81 extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<!-- Barra de navegação da página -->
';
        $buffer .= $indent . '<nav class="navbar navbar-expand-lg navbar-light">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	<a class="navbar-brand" href="/">
';
        $buffer .= $indent . '		<img src="';
        $value = $this->resolveValue($context->findDot('app.baseUrl'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '/img/logo2.png" width="60" height="30" class="d-inline-block align-top" alt="">
';
        $buffer .= $indent . '		Rede Feminina
';
        $buffer .= $indent . '	</a>
';
        $buffer .= $indent . '	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
';
        $buffer .= $indent . '		<span class="navbar-toggler-icon"></span>
';
        $buffer .= $indent . '	</button>
';
        $buffer .= $indent . '	<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
';
        $buffer .= $indent . '		<ul class="navbar-nav text-center">
';
        $buffer .= $indent . '			<li class="nav-item">
';
        $buffer .= $indent . '				<a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
';
        $buffer .= $indent . '			</li>
';
        $buffer .= $indent . '			<li class="nav-item">
';
        $buffer .= $indent . '				<a class="nav-link" href="/post/depoimentos">Depoimentos</a>
';
        $buffer .= $indent . '			</li>
';
        $buffer .= $indent . '			<li class="nav-item">
';
        $buffer .= $indent . '				<a class="nav-link" href="/contato">Contato</a>
';
        $buffer .= $indent . '			</li>
';
        $buffer .= $indent . '		</ul>
';
        $buffer .= $indent . '	</div>
';
        $buffer .= $indent . '</nav>
';

        return $buffer;
    }
}
