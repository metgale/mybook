<div class="row-fluid">
	<div class="span9">
		<h2><?php echo __('Category'); ?></h2>
		<dl>
			<dd>
				<?php echo h($category['Category']['name']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>

</div>

<div class="row-fluid">
	<div class="span9">
		<h3><?php echo __('Related %s', __('Writings')); ?></h3>


		<table class="table">

			<?php foreach ($writings as $writing): ?>     

				<div class="writing">
					<div class="writing-title">
						<h4><?php echo h($writing['Writing']['title']); ?></h4>
					</div>
					<p><?php echo h($writing['Writing']['description']); ?></p>
					<div class="writing-link">
						<?php
						echo $this->Html->link('Pročitaj', array(
							'controller' => 'writings',
							'action' => 'view', $writing['Writing']['id']));
						?>	
					</div>
				</div>
			<?php endforeach; ?>

		</table>
		<?php echo $this->Paginator->pagination(); ?>
	</div>

</div>
