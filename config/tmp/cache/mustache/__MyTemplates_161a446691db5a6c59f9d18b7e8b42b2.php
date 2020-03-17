<?php

class __MyTemplates_161a446691db5a6c59f9d18b7e8b42b2 extends Mustache_Template
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
        $buffer .= $indent . '<h1>';
        $value = $this->resolveValue($context->findDot('post.username'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '</h1>
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
