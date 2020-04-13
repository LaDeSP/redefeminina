<?php

class __MyTemplates_df0d7936addf867ac2308e726be4f9dd extends Mustache_Template
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
        $buffer .= $indent . '<section class="mt-5" style="height: 85%">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	<div class="container">
';
        $buffer .= $indent . '		<h1>Outubro Rosa</h1>
';
        $buffer .= $indent . '		<div class="article-body text-justify mt-4">
';
        $buffer .= $indent . '			<p>O movimento popular conhecido como Outubro Rosa é comemorado em todo o mundo. Nasceu nos Estados Unidos na década de 1990 para estimular a participação da população no controle do câncer de mama.</p>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '			<p>O Outubro Rosa é uma campanha de conscientização que tem como objetivo principal alertar as mulheres e a sociedade sobre a importância da prevenção e do diagnóstico precoce do câncer de mama. Esta campanha acontece com mais intensidade no mês de outubro e tem como símbolo o laço cor de rosa.</p>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '			NOVEMBRO AZUL
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '			<p>O Novembro Azul é uma campanha dirigida à sociedade e, em especial, aos homens, para conscientização a respeito de doenças masculinas, com ênfase na prevenção e no diagnóstico precoce do câncer de próstata.</p>
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
