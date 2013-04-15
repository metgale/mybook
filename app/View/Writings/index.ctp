<div class="row-fluid">
    <div class="span9">
        <div class="row-fluid">
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
        </div>

		<?php echo $this->Paginator->pagination(); ?>

		<p>
			<?php echo $this->Paginator->counter(array(
				'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'))); ?>
        </p>

    </div>


