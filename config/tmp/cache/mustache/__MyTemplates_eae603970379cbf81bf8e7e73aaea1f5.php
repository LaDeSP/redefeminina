<?php

class __MyTemplates_eae603970379cbf81bf8e7e73aaea1f5 extends Mustache_Template
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
        $buffer .= $indent . '							<h5 class="card-title">Special title treatment</h5>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '							<form>
';
        $buffer .= $indent . '								<div class="form-group">
';
        $buffer .= $indent . '									<label for="usuario">Usuário</label>
';
        $buffer .= $indent . '									<input type="text" class="form-control" id="usuario" placeholder="Usuario">
';
        $buffer .= $indent . '								</div>
';
        $buffer .= $indent . '								<div class="form-group">
';
        $buffer .= $indent . '									<label for="senha">Password</label>
';
        $buffer .= $indent . '									<input type="password" class="form-control" id="senha" placeholder="Senha">
';
        $buffer .= $indent . '								</div>
';
        $buffer .= $indent . '								<button type="submit" class="btn btn-primary">Save</button>
';
        $buffer .= $indent . '							</form>
';
        $buffer .= $indent . '						</div>
';
        $buffer .= $indent . '					</div>
';
        $buffer .= $indent . '				</div>
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
