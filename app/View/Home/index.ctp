<div class="homepage">
	
	
		<!-- Main hero unit for a primary marketing message or call to action -->
		<div class="hero-unit">
				<h1 id="big">MyBook</h1>
				<a href="users/login">Prijavi se</a>  ili  <a href="users/register">Registriraj</a>
		</div>

		<!-- Example row of columns -->
		
		<div class="row">
			<?php foreach($latestwritings as $latestwriting):?>
			<div class="span4">
				<h2><?php echo $latestwriting['Writing']['title']?></h2>
				<p><?php echo $latestwriting['Writing']['description'] ?> </p>
				<p><a class="btn" href="#">View details &raquo;</a></p>
			</div>
			<?php endforeach ?>
		</div>	
</div>


