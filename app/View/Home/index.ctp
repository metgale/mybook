<div class="homepage">
	<!-- Main hero unit for a primary marketing message or call to action -->
	
	<?php if(!AuthComponent::user()) {?>
	<div class="hero-unit">
		<h1 id="big">MyBook</h1>
		<ul>
			<h4>Kreiraj i objavi tekst</h4>
			<h4>Preuzmi elektroničku knjigu</h4>
		</ul>
		
		<a href="users/login" class="btn btn-primary">Prijava</a>    <a class="btn btn-success" href="users/register">Registracija</a>
	</div>
	<?php } ?>
	

	<!-- Example row of columns -->
	<div class="home row-fluid">
		<div class="span6">
			<small>Posljednje knjige</small>
			<?php foreach ($latestbooks as $latestbook): ?>
				<div class="media">
					<?php if ($latestbook['AttachmentImage']['filename']) { ?>
					<a class="pull-left" href="#">
						<img class ="media-object" src="/img/covers/<?php echo $latestbook['AttachmentImage']['filename'] ?>">
					</a>
				<?php } ?>
					<div class="media-body">
						<div class="media-heading">
							<h2><?php echo $this->Html->link($latestbook['Book']['title'], array('controller' => 'books', 'action' => 'view', $latestbook['Book']['id'])); ?> <small>by <?php echo $this->Html->link($latestbook['User']['username'], array('controller' => 'users', 'action' => 'view', $latestbook['User']['id']));  ?></small></h2>
							<p><?php echo $latestbook['Book']['description'] ?> </p>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
		<div class="span6">
			<small>Posljednji tekstovi</small>
			<?php foreach ($latestwritings as $latestwriting): ?>
				<div class="media">
					<a class="pull-left" href="#">
					</a>
					<div class="media-body">
						<div class="media-heading">
							<h2><?php  echo $this->Html->link($latestwriting['Writing']['title'], array('controller' => 'writings', 'action' => 'view', $latestwriting['Writing']['id']));  ?> <small>by <?php echo $this->Html->link($latestwriting['User']['username'], array('controller' => 'users', 'action' => 'view', $latestwriting['User']['id'])); ?></small></h2>
							<p><?php echo $latestwriting['Writing']['description'] ?> </p>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>


