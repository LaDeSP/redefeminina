<?php

class __MyTemplates_6133a1b32f0a735b5358486ac0147206 extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('nav.mustache')) {
            $buffer .= $partial->renderInternal($context);
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<!-- Parceiros -->
';
        $buffer .= $indent . '<section class=" article">
';
        $buffer .= $indent . '	<div class="container">
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
        $buffer .= $indent . '	</div>
';
        $buffer .= $indent . '</section>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('footer.mustache')) {
            $buffer .= $partial->renderInternal($context);
        }

        return $buffer;
    }
}
