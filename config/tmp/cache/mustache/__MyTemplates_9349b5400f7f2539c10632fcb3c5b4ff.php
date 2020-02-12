<?php

class __MyTemplates_9349b5400f7f2539c10632fcb3c5b4ff extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . 'Helllo ';
        $value = $this->resolveValue($context->find('word'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '
';

        return $buffer;
    }
}
