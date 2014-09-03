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
        <div id="header">
                <h1>Catálogo Online</h1>
        </div>
        <div id="content">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
        </div>
        <div id="footer">
                <?php echo $this->Html->link(
                                $this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
                                'http://www.cakephp.org/',
                                array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
                        );
                ?>
        </div>
    </div>
    <?php echo $this->element('sql_dump'); ?>
</body>
</html>
