<?php

class __MyTemplates_91d6a0ad0d60c6f05d84092bc7d7c5b8 extends Mustache_Template
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
        $buffer .= $indent . '		  <h1 class="banner-text">Rede feminina em combate contra o cancer de mama</h1>
';
        $buffer .= $indent . '		  <p class="banner-text"> Ipsum lorem de la eroe</p>
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
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<h1>Area dos admins</h1>
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
