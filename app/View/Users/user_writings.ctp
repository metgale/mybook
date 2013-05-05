
<div class="row-fluid">
	<div class="span9">

		<table class="table">

			<?php foreach ($writings as $writing): ?>     

				<div class="box">
					<div class="box-title">
						<h4><?php echo h($writing['Writing']['title']); ?></h4>
					</div>
					<p><?php echo h($writing['Writing']['description']); ?></p>
					<div class="box-link">
						<?php echo $this->Html->link('Pročitaj', array(
							'controller' => 'writings',
							'action' => 'view', $writing['Writing']['id'])); ?>	
					</div>
				</div>
			<?php endforeach; ?>
	</div>
	<?php
	echo $this->Paginator->pagination();
	?>
</table>


</div>


