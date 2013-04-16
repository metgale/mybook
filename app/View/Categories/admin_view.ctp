<div class="row-fluid">
	<div class="span9">
		<h2><?php  echo __('Category');?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($category['Category']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Category'); ?></dt>
			<dd>
				<?php echo h($category['Category']['name']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('Edit %s', __('Category')), array('action' => 'edit', $category['Category']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete %s', __('Category')), array('action' => 'delete', $category['Category']['id']), null, __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Categories')), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Category')), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Writings')), array('controller' => 'writings', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Writing')), array('controller' => 'writings', 'action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>

<div class="row-fluid">
	<div class="span9">
		<h3><?php echo __('Related %s', __('Writings')); ?></h3>
	<?php if (!empty($category['Writing'])):?>
		<table class="table">
			<tr>
				<th><?php echo __('Id'); ?></th>
				<th><?php echo __('Category Id'); ?></th>
				<th><?php echo __('User Id'); ?></th>
				<th><?php echo __('Title'); ?></th>
				<th><?php echo __('Description'); ?></th>
				<th><?php echo __('Content'); ?></th>
				<th><?php echo __('Created'); ?></th>
				<th><?php echo __('Modified'); ?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($category['Writing'] as $writing): ?>
			<tr>
				<td><?php echo $writing['id'];?></td>
				<td><?php echo $writing['category_id'];?></td>
				<td><?php echo $writing['user_id'];?></td>
				<td><?php echo $writing['title'];?></td>
				<td><?php echo $writing['description'];?></td>
				<td><?php echo $writing['content'];?></td>
				<td><?php echo $writing['created'];?></td>
				<td><?php echo $writing['modified'];?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'writings', 'action' => 'view', $writing['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'writings', 'action' => 'edit', $writing['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'writings', 'action' => 'delete', $writing['id']), null, __('Are you sure you want to delete # %s?', $writing['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>

	</div>
	<div class="span3">
		<ul class="nav nav-list">
			<li><?php echo $this->Html->link(__('New %s', __('Writing')), array('controller' => 'writings', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
