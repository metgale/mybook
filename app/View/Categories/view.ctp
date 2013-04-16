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
				
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>

	</div>
	
</div>
