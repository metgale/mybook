<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>
			<?php echo __('CakePHP: the rapid development php framework:'); ?>
			<?php
			echo $title_for_layout;
			echo $this->fetch('title');
			?>
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Le styles -->

		<link rel="stylesheet" href="http://localhost/css/mybookpdf.css">
		<?php //echo $this->Html->css(array('bootstrap', 'mybook')); ?>
		<?php //echo $this->Html->css('mybookpdf'); ?>
		<?php
		echo $this->fetch('meta');
		echo $this->fetch('css');
		?>	
	</head>


	<body>
		<div class="container">
			<?php echo $this->fetch('content'); ?>
		</div> <!-- /container -->


	</body>
</html>
