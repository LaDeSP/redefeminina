<?php

class __MyTemplates_937fa09f4f329348a8a50097c3e84e23 extends Mustache_Template
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
        $buffer .= $indent . '<!-- Área de informações -->
';
        $buffer .= $indent . '<section>
';
        $buffer .= $indent . '	<div class="container">
';
        $buffer .= $indent . '		<h1>Informações</h1>
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
        $buffer .= $indent . '				<a href="/site/outubro_rosa"><img src="img/outubro-rosa.png" alt="" class="img-thumbnail mx-auto d-block m-3"></a>
';
        $buffer .= $indent . '			</div>
';
        $buffer .= $indent . '			<div class="col-md">
';
        $buffer .= $indent . '				<a href="/site/como-ajudar"><img src="img/ajuda.png" alt="" class="img-thumbnail mx-auto d-block m-3"></a>
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
        $buffer .= $indent . '<section class="mt-5" id="quem-somos">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	<div class="container">
';
        $buffer .= $indent . '		<h1>Quem somos</h1>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '		<div class="article-body text-justify mt-3">
';
        $buffer .= $indent . '			<p>A Rede Feminina de Combate ao Câncer de Corumbá (RFCCC) é uma entidade civil de direito privado e sem fins lucrativos, que desenvolve um papel de grande relevância social no município por meio de ações e programas de combate ao câncer, além de apoiar as atividades governamentais que visam à promoção da saúde e cuidados preventivos contra essa doença.</p>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '			<p>A Instituição, fundada em março de 2006, tem como missão precípua prestar assistência a pacientes com câncer, sejam homens ou mulheres, dando suporte aos doentes e a seus familiares.</p>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '			<p>Os recursos utilizados são adquiridos por meio de parcerias, doações e ações promocionais. A busca por parcerias é uma preocupação constante para manter a continuidade dos trabalhos com enfoque na Campanha de Prevenção.</p>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '			<p>Certificados : Utilidade Pública Estadual e Utilidade Pública Municipal</p>
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
