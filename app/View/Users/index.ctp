<div class="row-fluid">
	<div class="span9">
		<table class="table">
			<?php foreach ($users as $user): ?>
				<div class="box">
					<div class="box-title">
						
						<h4><?php echo ($user['User']['username']); ?></h4>
						<?php echo $this->Html->image('profile.jpg'); ?>
						<h5><?php echo ($user['User']['writing_count']); ?> </h5>
					</div>
					<div class="box-link">
						<?php echo $this->Html->link('Detalji', array('action' => 'view', $user['User']['id'])); ?>	
					</div>
				</div>
			<?php endforeach; ?>
		</table>

		<?php echo $this->Paginator->pagination(); ?>
	</div>

</div>
</div