<?php

class __MyTemplates_b6ca302d3346f32cbf60148b36897ce7 extends Mustache_Template
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
        $buffer .= $indent . '	<section class="main-section">
';
        $buffer .= $indent . '		<div class="container">
';
        $buffer .= $indent . '			<div class="row justify-content-center">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '				<div class="col-lg-6 mt-4">
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
        $buffer .= $indent . '								<div class="form-row">
';
        $buffer .= $indent . '									<div class="form-group col-md-6">
';
        $buffer .= $indent . '										<label for="inputEmail4">Email</label>
';
        $buffer .= $indent . '										<input type="email" class="form-control" id="inputEmail4" placeholder="Email">
';
        $buffer .= $indent . '									</div>
';
        $buffer .= $indent . '									<div class="form-group col-md-6">
';
        $buffer .= $indent . '										<label for="inputPassword4">Password</label>
';
        $buffer .= $indent . '										<input type="password" class="form-control" id="inputPassword4" placeholder="Password">
';
        $buffer .= $indent . '									</div>
';
        $buffer .= $indent . '								</div>
';
        $buffer .= $indent . '								<div class="form-group">
';
        $buffer .= $indent . '									<label for="inputAddress">Address</label>
';
        $buffer .= $indent . '									<input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
';
        $buffer .= $indent . '								</div>
';
        $buffer .= $indent . '								<div class="form-group">
';
        $buffer .= $indent . '									<label for="inputAddress2">Address 2</label>
';
        $buffer .= $indent . '									<input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
';
        $buffer .= $indent . '								</div>
';
        $buffer .= $indent . '								<div class="form-row">
';
        $buffer .= $indent . '									<div class="form-group col-md-6">
';
        $buffer .= $indent . '										<label for="inputCity">City</label>
';
        $buffer .= $indent . '										<input type="text" class="form-control" id="inputCity">
';
        $buffer .= $indent . '									</div>
';
        $buffer .= $indent . '									<div class="form-group col-md-4">
';
        $buffer .= $indent . '										<label for="inputState">State</label>
';
        $buffer .= $indent . '										<select id="inputState" class="form-control">
';
        $buffer .= $indent . '											<option selected>Choose...</option>
';
        $buffer .= $indent . '											<option>...</option>
';
        $buffer .= $indent . '										</select>
';
        $buffer .= $indent . '									</div>
';
        $buffer .= $indent . '									<div class="form-group col-md-2">
';
        $buffer .= $indent . '										<label for="inputZip">Zip</label>
';
        $buffer .= $indent . '										<input type="text" class="form-control" id="inputZip">
';
        $buffer .= $indent . '									</div>
';
        $buffer .= $indent . '								</div>
';
        $buffer .= $indent . '								<div class="form-group">
';
        $buffer .= $indent . '									<div class="form-check">
';
        $buffer .= $indent . '										<input class="form-check-input" type="checkbox" id="gridCheck">
';
        $buffer .= $indent . '										<label class="form-check-label" for="gridCheck">
';
        $buffer .= $indent . '											Check me out
';
        $buffer .= $indent . '										</label>
';
        $buffer .= $indent . '									</div>
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
