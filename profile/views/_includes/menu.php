<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo PATH ?>/"> Rede Feminina de Combate ao Câncer </a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> <?php if ($_SESSION['username']) { echo $_SESSION['user'];} ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="<?php echo PATH ?>/voluntaria/edit/<?php echo $_SESSION['id_user'];  ?>"><i class="glyphicon glyphicon-user"></i> Perfil </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="<?php echo PATH ?>/logout"><i class="glyphicon glyphicon-off"></i> Sair </a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="active">
                <a href="<?php echo PATH ?>/"><i class="glyphicon glyphicon-th"></i> Inicío </a>
            </li>
            <li>
                <a href="<?php echo PATH ?>/paciente/list"><i class="glyphicon glyphicon-heart"></i> Pacientes </a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="glyphicon glyphicon-resize-vertical"></i> Áreas <i class="caret"></i></a>
                <ul id="demo" class="collapse">
                    <li>
                        <a href="<?php echo PATH ?>/assistente/list"> Assistente Social </a>
                    </li>
                    <li>
                        <a href="<?php echo PATH ?>/nutricionista/list"> Nutricionista </a>
                    </li>
                    <li>
                        <a href="<?php echo PATH ?>/fisioterapeuta/list"> Fisioterapeuta </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?php echo PATH ?>/financeiro"><i class="glyphicon glyphicon-signal"></i> Financeiro </a>
            </li>
            <li>
                <a href="<?php echo PATH ?>/produtos/listar"><i class="glyphicon glyphicon-shopping-cart"></i> Produtos </a>
            </li>
            <li>
                <a href="<?php echo PATH ?>/gerenciar/listarNome"><i class="glyphicon glyphicon-indent-left"></i> Gerenciar Cestas </a>
            </li>
            <li>
                <a href="<?php echo PATH ?>/voluntaria/list"><i class="glyphicon glyphicon-star-empty"></i> Voluntária </a>
            </li>
            <li>
                <a href="<?php echo PATH ?>/projetos/list"><i class="glyphicon glyphicon-gift"></i> Projetos </a>
            </li>
            <li>
                <a href="<?php echo PATH ?>/administrador"> <i class="glyphicon glyphicon-wrench"></i>Administrador </a>
            </li>
            <li>
                <a href="<?php echo PATH ?>/ajuda"><i class="glyphicon glyphicon-send"></i> Ajuda </a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>