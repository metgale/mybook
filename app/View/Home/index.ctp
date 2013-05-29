<div class="home container-narrow homepage">
	<div class="jumbotron">
        <h1>Dobrodošli na myBook.hr!</h1>
        <p class="lead"></p>

		<div class="row-fluid ">	
			<div class="span12">
				<p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
			</div>
		</div>
		<a class="btn btn-large btn-primary" href="#">Saznaj više</a>
	</div>
	<div class="homepagetab">
		<ul id="myTab" class="nav nav-tabs">
			<li class="active"><a href="#latestwritings" data-toggle="tab">Najnovije objave</a></li>
			<li><a href="#latestauthors" data-toggle="tab">Najnoviji autori</a></li>
			<li><a href="#topwritings" data-toggle="tab">Najčitanije objave</a></li>
		</ul>
		<div id="myTabContent" class="tab-content">
			<div class="tab-pane fade in active" id="latestwritings">
			<div class="row">
    <div class="span12">
		<?php foreach ($latestWritings as $writing): ?>    
			<div class="writing-item">
				<img class ="writing-cover" src="/img/book_cover.jpg">
				<h2 class="writing-title"><?php 
					echo $this->Html->link(h($writing['Writing']['title']), array('action' => 'view', $writing['Writing']['id']), array('class' => 'read-more'));
				?> &rarr;</h2>
				<div class="writing-description">
					<p><?php echo h($writing['Writing']['description']); ?></p>
				</div>
				<div class="metadata">
					<span class="writing-author">korisnik <?php echo $this->Html->link($writing['User']['username'], array('controller' => 'users', 'action' => 'view', $writing['User']['id'])); ?>&nbsp;</span>
					<span class="writing-date"><?php echo $this->Time->timeAgoInWords($writing['Writing']['created']); ?>&nbsp;</span>
					<span class="writing-category">u kategoriji <?php echo $this->Html->link($writing['Category']['name'], 
					array('controller' => 'writings', 'action' => 'category', $writing['Category']['id'])); ?>&nbsp;</span>
				</div>
				<?php #echo $this->Html->link('Pročitaj', array('action' => 'view', $writing['Writing']['id']), array('class' => 'read-more')); ?>	
			</div>
		<?php endforeach; ?>
	</div>
</div>
			</div>
			<div class="tab-pane fade in" id="latestauthors">
			<ul><?php foreach ($latestWritings as $writing) { ?>
				<li><?php echo $writing['Writing']['title']; ?></li>
					<?php } ?>
			</ul>
			</div>
			<div class="tab-pane fade in" id="topwritings">
			<ul><?php foreach ($latestWritings as $writing) { ?>
				<li><?php echo $writing['Writing']['title']; ?></li>
					<?php } ?>
			</ul>
			</div>
		</div>
	</div>
</div>
