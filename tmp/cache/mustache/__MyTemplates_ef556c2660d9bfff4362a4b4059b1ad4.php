<?php

class __MyTemplates_ef556c2660d9bfff4362a4b4059b1ad4 extends Mustache_Template
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
        $buffer .= $indent . '<!-- Parceiros -->
';
        $buffer .= $indent . '<section class="sec-top" style="height: 85%; overflow: scroll">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '		<div class="row justify-content-center">
';
        $buffer .= $indent . '			<div class="col-md col-md-3">
';
        $buffer .= $indent . '				<img src="';
        $value = $this->resolveValue($context->findDot('app.baseUrl'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '/img/1.png" alt="" class="img-thumbnail mx-auto d-block m-3">
';
        $buffer .= $indent . '			</div>
';
        $buffer .= $indent . '			<div class="col-md col-md-3">
';
        $buffer .= $indent . '				<img src="';
        $value = $this->resolveValue($context->findDot('app.baseUrl'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '/img/2.png" alt="" class="img-thumbnail mx-auto d-block m-3">
';
        $buffer .= $indent . '			</div>
';
        $buffer .= $indent . '			<div class="col-md col-md-3">
';
        $buffer .= $indent . '				<img src="';
        $value = $this->resolveValue($context->findDot('app.baseUrl'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '/img/3.png" alt="" class="img-thumbnail mx-auto d-block m-3">
';
        $buffer .= $indent . '			</div>
';
        $buffer .= $indent . '			<div class="col-md col-md-3">
';
        $buffer .= $indent . '				<img src="';
        $value = $this->resolveValue($context->findDot('app.baseUrl'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '/img/4.png" alt="" class="img-thumbnail mx-auto d-block m-3">
';
        $buffer .= $indent . '			</div>
';
        $buffer .= $indent . '			<div class="col-md col-md-3">
';
        $buffer .= $indent . '				<img src="';
        $value = $this->resolveValue($context->findDot('app.baseUrl'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '/img/5.png" alt="" class="img-thumbnail mx-auto d-block m-3">
';
        $buffer .= $indent . '			</div>
';
        $buffer .= $indent . '			<div class="col-md col-md-3">
';
        $buffer .= $indent . '				<img src="';
        $value = $this->resolveValue($context->findDot('app.baseUrl'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '/img/6.png" alt="" class="img-thumbnail mx-auto d-block m-3">
';
        $buffer .= $indent . '			</div>
';
        $buffer .= $indent . '			<div class="col-md col-md-3">
';
        $buffer .= $indent . '				<img src="';
        $value = $this->resolveValue($context->findDot('app.baseUrl'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '/img/7.png" alt="" class="img-thumbnail mx-auto d-block m-3">
';
        $buffer .= $indent . '			</div>
';
        $buffer .= $indent . '			<div class="col-md col-md-3">
';
        $buffer .= $indent . '				<img src="';
        $value = $this->resolveValue($context->findDot('app.baseUrl'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '/img/8.png" alt="" class="img-thumbnail mx-auto d-block m-3">
';
        $buffer .= $indent . '			</div>
';
        $buffer .= $indent . '			<div class="col-md col-md-3">
';
        $buffer .= $indent . '				<img src="';
        $value = $this->resolveValue($context->findDot('app.baseUrl'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '/img/9.png" alt="" class="img-thumbnail mx-auto d-block m-3">
';
        $buffer .= $indent . '			</div>
';
        $buffer .= $indent . '			<div class="col-md col-md-3">
';
        $buffer .= $indent . '				<img src="';
        $value = $this->resolveValue($context->findDot('app.baseUrl'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '/img/10.png" alt="" class="img-thumbnail mx-auto d-block m-3">
';
        $buffer .= $indent . '			</div>
';
        $buffer .= $indent . '			<div class="col-md col-md-3">
';
        $buffer .= $indent . '				<img src="';
        $value = $this->resolveValue($context->findDot('app.baseUrl'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '/img/11.png" alt="" class="img-thumbnail mx-auto d-block m-3">
';
        $buffer .= $indent . '			</div>
';
        $buffer .= $indent . '			<div class="col-md col-md-3">
';
        $buffer .= $indent . '				<img src="';
        $value = $this->resolveValue($context->findDot('app.baseUrl'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '/img/12.png" alt="" class="img-thumbnail mx-auto d-block m-3">
';
        $buffer .= $indent . '			</div>
';
        $buffer .= $indent . '		</div>
';
        $buffer .= $indent . '</section>
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
