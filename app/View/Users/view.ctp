<div id="profile" class="row-fluid">
	<ul class="leftinfo span1">
	<?php if ($user['AttachmentImage']['filename']) { ?>
			<img class ="user-profilethumb" src="/img/covers/<?php echo $user['AttachmentImage']['filename'] ?>">
		<?php } ?>
		<?php if (!$user['AttachmentImage']['filename']) { ?>
			<img class ="user-profilethumb" src="/img/missing.jpg">
		<?php } ?>
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
			echo $this->Html->link('Tekstovi', array(
				'controller' => 'writings',
				'action' => 'user',
				$user['User']['id']
			))
			?></a>
		<a> <?php
			echo $this->Html->link('Knjige', array(
				'controller' => 'books',
				'action' => 'user',
				$user['User']['id']
			))
			?></a>
	</div>	
</div>












