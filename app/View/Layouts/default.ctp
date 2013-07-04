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
		<?php echo $this->Html->css(array('bootstrap', 'bootstrap-responsive.min', 'mybook')); ?>

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
	<wrap>
		<div class="navigation navbar navbar-inverse navbar-fixed-top">
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
							<li><a href="/books/index">Knjige</a></li>
							<li><a href="/writings/index">Tekstovi</a></li>
							<li><a href="/users/index">Autori</a></li>

						</ul>
						<?php if (!AuthComponent::user()) { ?>
							<ul class="nav user-nav pull-right">
								<ul class="nav nav-tabs">
									<li class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#">
											Prijava
											<b class="caret"></b>
										</a>
										<ul class="dropdown-menu">
											<?php echo $this->Element('users/login') ?>
											<li><a href="/users/register">Registracija</a></li>
										<?php } ?>
									</ul>
								</li>
							</ul>
						</ul>

						<?php if (AuthComponent::user()) { ?>
							<ul class="nav user-nav pull-right">
								<ul class="nav nav-tabs">
									<li class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#">
											<?php echo AuthComponent::user('username'); ?>
											<b class="caret"></b>
										</a>
										<ul class="dropdown-menu">
											<li><?php echo $this->Html->link('Profil', array('controller' => 'users', 'action' => 'profile', AuthComponent::user('id'))) ?></li>
											<li> <?php echo $this->Html->link('Moje knjige', array('controller' => 'books', 'action' => 'userbooks', AuthComponent::user('id'))) ?></li>
											<li> <?php echo $this->Html->link('Moji tekstovi', array('controller' => 'writings', 'action' => 'userwritings', AuthComponent::user('id'))) ?></li>
											<li class="divider"></li>
											<li><a href="/users/logout">Odjava</a></li>
										<?php } ?>
									</ul>
								</li>
							</ul>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
		<?php echo $this->Html->script('bootstrap.min'); ?>
		<?php echo $this->Html->script('mybookjs'); ?>
		<?php echo $this->fetch('script'); ?>
	</wrap>
	<div class="footer">
			<a href="/books/index">Knjige</a>
			<a href="/writings/index">Tekstovi</a>
			<a href="/users/index">Autori</a>
			<p>&copy; <?php echo date('Y'); ?> MyBooks </p>
			<a class="onTop" href="#top">Na vrh	 &uarr;</a>
	</div>
</body>
</html>