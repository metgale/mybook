<div id="profile" class="row-fluid">
	<ul class="leftinfo span3">
		<img class ="profilepicture" src="/img/profile.jpg">
		<ul class="profile-nav">
			<li><?php echo $this->Html->link('Uredi podatke', array('controller' => 'users', 'action' => 'edit', $user['User']['id'])); ?></li>
			<li><?php echo $this->Html->link('Moje knjige', array('controller' => 'books', 'action' => 'userbooks', $user['User']['id'])); ?></li>
			<li><?php echo $this->Html->link('Moje objave', array('controller' => 'writings', 'action' => 'userwritings', $user['User']['id'])); ?></li>
		</ul>
	</ul>
	<div id='rightinfo' class="span9">
		<h2>Pozdrav, ja sam <?php echo $user['User']['username'] ?></h2>
		<?php App::uses('CakeTime', 'Utility'); ?>
		<p>Registriran <?php echo CakeTime::timeAgoInWords(($user['User']['created']), array('accuracy' => array('month' => 'month'), 'end' => '1 year'));
		?></p>
		<blockquote> <?php echo $user['User']['about']; ?> </blockquote>	
		<ul>
			<li>Lokacija <h4><?php echo $user['User']['location']; ?></h4> </li>
		</ul>
		<a> <?php
			echo $this->Html->link('Samostalne objave', array(
				'controller' => 'writings',
				'action' => 'user',
				$user['User']['id']
			))
			?></a>
		<a> <?php
			echo $this->Html->link('Sabrana djela', array(
				'controller' => 'books',
				'action' => 'user',
				$user['User']['id']
			))
			?></a>

	</div>	
</div>
