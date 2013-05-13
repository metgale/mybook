<div class="page-header writings-index clearfix">
	<h3 class="pull-left">
		<?php
		echo $this->html->Link('Korisnici', array(
			'controller' => 'users',
			'action' => 'index'
		));
		?></h3>
</div>
<div class="row">
	<div class="span12">
		<?php foreach ($users as $user): ?>
			<div class="user-item">
					<img class ="user-profilethumb" src="/img/profilethumb.jpg">
				<h2 class="user-username">
					<?php echo $this->Html->Link(($user['User']['username']), array('action' => 'view', $user['User']['id']), array('class' => 'read-more')); ?>&rarr;
				</h2>
				<div class="user-about">
					<blockquote>
						<?php echo $user['User']['about'] ?>	
					</blockquote>
				</div>
				<div class="metadata">
					<span class="user-registered">Registriran <?php
						App::uses('CakeTime', 'Utility');
						echo CakeTime::timeAgoInWords(($user['User']['created']), array('accuracy' => array('month' => 'month'), 'end' => '1 year'));
						?>&nbsp;</span>
					<span class="user-pubcount">Objavio <?php echo $user['User']['writing_count'] ?> djela </span>
				</div>
			</div>
		<?php endforeach; ?>
		<?php echo $this->Paginator->pagination(); ?>
	</div>
</div>