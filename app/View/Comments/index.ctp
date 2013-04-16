<div class="row-fluid">
	<div class="span9">
		<h2><?php echo __('List %s', __('Comments'));?></h2>

		
		
		<p>
			<?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>
		</p>

		<table class="table">
			<tr>
				<th><?php echo $this->Paginator->sort('id');?></th>
				<th><?php echo $this->Paginator->sort('user_id');?></th>
				<th><?php echo $this->Paginator->sort('writing_id');?></th>
				<th><?php echo $this->Paginator->sort('content');?></th>
				<th><?php echo $this->Paginator->sort('created');?></th>
				<th><?php echo $this->Paginator->sort('modified');?></th>
			</tr>
			
		<?php foreach ($comments as $comment): ?>
			<tr>
				<td><?php echo h($comment['Comment']['id']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($comment['User']['username'], array('controller' => 'users', 'action' => 'view', $comment['User']['id'])); ?>
				</td>
				<td>
					<?php echo $this->Html->link($comment['Writing']['title'], array('controller' => 'writings', 'action' => 'view', $comment['Writing']['id'])); ?>
				</td>
				<td><?php echo h($comment['Comment']['content']); ?>&nbsp;</td>
				<td><?php echo h($comment['Comment']['created']); ?>&nbsp;</td>
				<td><?php echo h($comment['Comment']['modified']); ?>&nbsp;</td>
				
			</tr>
		<?php endforeach; ?>
		</table>

		<?php echo $this->Paginator->pagination(); ?>
	</div>
	
</div>