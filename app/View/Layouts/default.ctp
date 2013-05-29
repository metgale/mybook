<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>
			<?php echo __('CakePHP: the rapid development php framework:'); ?>
			<?php echo $title_for_layout; ?>
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Le styles -->
		<?php echo $this->Html->css(array('bootstrap', 'mybook')); ?>


		<style>
			body {
				padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
			}
		</style>
		<?php //echo $this->Html->css('bootstrap-responsive.min'); ?>

		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->


		<link rel="shortcut icon" href="/ico/favicon.ico">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="/ico/apple-touch-icon-57-precomposed.png">

		<?php
		echo $this->fetch('meta');
		echo $this->fetch('css');
		?>
	</head>
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>

					<a class="brand" href="/"><?php echo __('myBook'); ?></a>
					<div class="nav-collapse">
						<ul class="nav">
							<li><a href="/users/index">autori</a></li>
							<li><a href="/writings/index">tekstovi</a></li>
							<li><a href="/writings/add">objavi tekst</a></li>
						</ul>
						<ul class="nav user-nav pull-right">
							<?php if (!AuthComponent::user()): ?>
								<li><a href="#myModal" data-toggle="modal">Prijava</a></li>
								<li><a href="/users/register" data-toggle="modal">Registracija</a></li>
							<?php elseif (AuthComponent::user()): ?>
								<li><a href="/users/view/<?php echo AuthComponent::user('id'); ?>"><?php echo AuthComponent::user('username'); ?></a></li>
								<li><a href="/users/logout">Odjava</a></li>
							<?php endif ?>
					</div>
				</div>
			</div>
		</div>

		<div id="myModal" class="modal hide fade pull-right" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">myBook prijava</h3>
			</div>
			<div class="modal-body">
				<?php echo $this->Element('Users/login'); ?>
			</div>
		</div>


		<div class="container">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div class="footer"></div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
		<?php echo $this->Html->script('bootstrap.min'); ?>
		<?php echo $this->Html->script('mybookjs'); ?>
		<?php echo $this->fetch('script'); ?>
	</body>
</html>
