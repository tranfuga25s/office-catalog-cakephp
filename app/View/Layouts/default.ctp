<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $title_for_layout; ?> : Catálogo Online</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('bootstrap.min');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
    <div class="container">
        <div class="navbar navbar-default">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Catalogo Online</a>
            </div>
            <div class="navbar-collapse collapse navbar-responsive-collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Inicio</a></li>
                <li><a href="#">Contacto</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categorias <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Categoria 1</a></li>
                    <li><a href="#">Categoria 2</a></li>
                    <li><a href="#">Categoria 3</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Cabecera de grupo</li>
                    <li><a href="#">Categoria 4</a></li>
                    <li><a href="#">Categoria 5</a></li>
                  </ul>
                </li>
              </ul>
              <form class="navbar-form navbar-right">
                <input class="form-control col-lg-8" placeholder="Buscar" type="text">
              </form>
            </div>
          </div>
        <div id="content">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
        </div>
        <div id="footer">
                <?php echo $this->Html->link(
                                $this->Html->image('cake.power.gif', array( 'border' => '0')),
                                'http://www.cakephp.org/',
                                array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
                        );
                ?>
        </div>
    </div>
    <?php echo $this->element('sql_dump'); ?>
</body>
</html>
