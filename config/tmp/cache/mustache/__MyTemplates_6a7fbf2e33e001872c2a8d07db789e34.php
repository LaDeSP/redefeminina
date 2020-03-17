<?php

class __MyTemplates_6a7fbf2e33e001872c2a8d07db789e34 extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        if ($partial = $this->mustache->loadPartial('acesso_publico/layouts/top_page_layout.mustache')) {
            $buffer .= $partial->renderInternal($context);
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	<section class="main-section">
';
        $buffer .= $indent . '		<div class="container">
';
        $buffer .= $indent . '			<div class="row justify-content-center">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '				<div class="col-lg-4 mt-5">
';
        $buffer .= $indent . '					<div class="card form">
';
        $buffer .= $indent . '						<div class="card-body">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '							<form method="POST" action="/loginUser">
';
        $buffer .= $indent . '								<div class="form-group">
';
        $buffer .= $indent . '									<label for="usuario">Usuário</label>
';
        $buffer .= $indent . '									<input type="text" class="form-control" name="username" id="usuario" placeholder="Usuario">
';
        $buffer .= $indent . '								</div>
';
        $buffer .= $indent . '								<div class="form-group">
';
        $buffer .= $indent . '									<label for="senha">Senha</label>
';
        $buffer .= $indent . '									<input type="password" class="form-control" id="senha" placeholder="Senha">
';
        $buffer .= $indent . '								</div>
';
        $buffer .= $indent . '								<input type="hidden" name="';
        $value = $this->resolveValue($context->findDot('csrf.nameKey'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '" value="';
        $value = $this->resolveValue($context->findDot('csrf.name'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '">
';
        $buffer .= $indent . '       							<input type="hidden" name="';
        $value = $this->resolveValue($context->findDot('csrf.valueKey'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '" value="';
        $value = $this->resolveValue($context->findDot('csrf.value'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '">
';
        $buffer .= $indent . '								<button type="submit" class="btn btn-pink">Login</button>
';
        $buffer .= $indent . '							</form>
';
        $buffer .= $indent . '						</div>
';
        $buffer .= $indent . '					</div>
';
        $buffer .= $indent . '				</div>
';
        $buffer .= $indent . '			</div>
';
        $buffer .= $indent . '		</div>
';
        $buffer .= $indent . '	</section>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('acesso_publico/layouts/bottom_page_layout.mustache')) {
            $buffer .= $partial->renderInternal($context);
        }

        return $buffer;
    }
}
