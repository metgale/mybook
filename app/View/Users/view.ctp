<div class="row-fluid">
	<div class="span9">
		<h2><?php echo __('User'); ?></h2>
		<dl>


			<dt><?php echo __('Korisničko ime'); ?></dt>
			<dd>
				<?php echo h($user['User']['username']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Email'); ?></dt>
			<dd>
				<?php echo h($user['User']['email']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Član od:'); ?></dt>
			<dd>
				<?php echo h($user['User']['created']); ?>
				&nbsp;
			</dd>

		</dl>
	</div>


</div>
<?php echo $this->Html->link(__('Pregledaj sve komentare korisnika'), array('action' => 'userComments', $user['User']['id'])); ?>				
<div class="row-fluid">
	<div class="span9">
		<h3><?php echo __('Korisnikova djela'); ?></h3>
		<?php if (!empty($user['Writing'])): ?>
			<?php foreach ($writings as $writing): ?>
				<div class="writing">
					<div class="writing-title">
						<h4><?php echo h($writing['Writing']['title']); ?></h4>
					</div>
					<p><?php echo h($writing['Writing']['description']); ?></p>
					<div class="writing-link">
						<?php echo $this->Html->link('Pročitaj', array('action' => 'view', $writing['Writing']['id'])); ?>	
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>


