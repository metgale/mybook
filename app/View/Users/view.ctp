

<p> <?php
	echo $this->Html->link('Sva korisnikova djela', array(
		'controller' => 'users',
		'action' => 'userWritings', $user['User']['id']));
	?> </p>

<?php echo $this->Html->link(__('Pregledaj sve komentare korisnika'), array('action' => 'userComments', $user['User']['id'])); ?>				

<div class="row-fluid">
	<div class="span9">
		<h3><?php echo __('Najnoviji tekstovi korisnika'); ?></h3>
		<?php if (!empty($user['Writing'])): ?>
			<?php foreach ($writings as $writing): ?>
				<div class="box">
					<div class="box-title">
						<h4><?php echo $this->Html->link($writing['Writing']['title'], array(
							'controller' => 'writings',
							'action' => 'view', $writing['Writing']['id']));
						?>	</h4>
					</div>
					<p><?php echo h($writing['Writing']['user_id']); ?></p>
					
					<div class="box-date">
						<?php echo $this->Time->timeAgoInWords($writing['Writing']['created']); ?>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
		<?php
		?>
	</div>
</div>


