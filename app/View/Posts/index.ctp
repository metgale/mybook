<div class="row-fluid">
	<div class="span9">
		<h2><?php echo __('List %s', __('Posts'));?></h2>

		<p>
			<?php echo $this->BootstrapPaginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>
		</p>

		<table class="table">
			<tr>
				<th><?php echo $this->BootstrapPaginator->sort('id');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('user_id');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('title');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('content');?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($posts as $post): ?>
			<tr>
				<td><?php echo h($post['Post']['id']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($post['User']['id'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
				</td>
				<td><?php echo h($post['Post']['title']); ?>&nbsp;</td>
				<td><?php echo h($post['Post']['content']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $post['Post']['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $post['Post']['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $post['Post']['id']), null, __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>

		<?php echo $this->BootstrapPaginator->pagination(); ?>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('New %s', __('Post')), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Users')), array('controller' => 'users', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('User')), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>