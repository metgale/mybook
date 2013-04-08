<div class="row-fluid">
	<div class="span9">
		<h2><?php echo __('List %s', __('Writings'));?></h2>

		<p>
			<?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>
		</p>

		<table class="table">
			<tr>
				<th><?php echo $this->Paginator->sort('id');?></th>
				<th><?php echo $this->Paginator->sort('category_id');?></th>
				<th><?php echo $this->Paginator->sort('user_id');?></th>
				<th><?php echo $this->Paginator->sort('title');?></th>
				<th><?php echo $this->Paginator->sort('description');?></th>
				<th><?php echo $this->Paginator->sort('content');?></th>
				<th><?php echo $this->Paginator->sort('created');?></th>
				<th><?php echo $this->Paginator->sort('modified');?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($writings as $writing): ?>
			<tr>
				<td><?php echo h($writing['Writing']['id']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($writing['Category']['id'], array('controller' => 'categories', 'action' => 'view', $writing['Category']['id'])); ?>
				</td>
				<td>
					<?php echo $this->Html->link($writing['User']['id'], array('controller' => 'users', 'action' => 'view', $writing['User']['id'])); ?>
				</td>
				<td><?php echo h($writing['Writing']['title']); ?>&nbsp;</td>
				<td><?php echo h($writing['Writing']['description']); ?>&nbsp;</td>
				<td><?php echo  nl2br(h($writing['Writing']['content'])); ?>&nbsp;</td>
				<td><?php echo h($writing['Writing']['created']); ?>&nbsp;</td>
				<td><?php echo h($writing['Writing']['modified']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $writing['Writing']['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $writing['Writing']['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $writing['Writing']['id']), null, __('Are you sure you want to delete # %s?', $writing['Writing']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>

		<?php echo $this->Paginator->pagination(); ?>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('New %s', __('Writing')), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Categories')), array('controller' => 'categories', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Category')), array('controller' => 'categories', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Users')), array('controller' => 'users', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('User')), array('controller' => 'users', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Comments')), array('controller' => 'comments', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Comment')), array('controller' => 'comments', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>