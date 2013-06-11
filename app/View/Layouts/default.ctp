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
							<li><a href="/users/index">autori</a></li>
							<li><a href="/writings/index">samostalne objave</a></li>
							<li><a href="/books/index">sabrana djela</a></li>

						</ul>
						<?php if (!AuthComponent::user()) { ?>
							<ul class="prijava pull-right"><li><?php echo $this->Html->link('Prijava', array('controller' => 'users', 'action' => 'login')) ?></li></ul>
						<?php } ?>
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
											<li> <?php echo $this->Html->link('Moje objave', array('controller' => 'writings', 'action' => 'userwritings', AuthComponent::user('id'))) ?></li>
											<li><a href="/users/logout">Odjava</a></li>
										<?php } ?>
									</ul>
								</li>
							</ul>



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
