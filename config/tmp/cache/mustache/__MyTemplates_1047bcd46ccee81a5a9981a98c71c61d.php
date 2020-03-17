<?php

class __MyTemplates_1047bcd46ccee81a5a9981a98c71c61d extends Mustache_Template
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
        $buffer .= $indent . '							<form method="POST" action="/login">
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
