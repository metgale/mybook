<div class="row-fluid">
	<div class="span9">
		<h2><?php echo __('User'); ?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($user['User']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Admin'); ?></dt>
			<dd>
				<?php echo h($user['User']['admin']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Username'); ?></dt>
			<dd>
				<?php echo h($user['User']['username']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Password'); ?></dt>
			<dd>
				<?php echo h($user['User']['password']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Email'); ?></dt>
			<dd>
				<?php echo h($user['User']['email']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Created'); ?></dt>
			<dd>
				<?php echo h($user['User']['created']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Modified'); ?></dt>
			<dd>
				<?php echo h($user['User']['modified']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>


</div>

<div class="row-fluid">
	<div class="span9">
		<h3><?php echo __('Related %s', __('Comments')); ?></h3>
		<?php if (!empty($user['Comment'])): ?>
			<table class="table">
				<tr>
					<th><?php echo __('Id'); ?></th>
					<th><?php echo __('User Id'); ?></th>
					<th><?php echo __('Writing Id'); ?></th>
					<th><?php echo __('Content'); ?></th>
					<th><?php echo __('Created'); ?></th>
					<th><?php echo __('Modified'); ?></th>

				</tr>
				<?php foreach ($user['Comment'] as $comment): ?>
					<tr>
						<td><?php echo $comment['id']; ?></td>
						<td><?php echo $comment['user_id']; ?></td>
						<td><?php echo $comment['writing_id']; ?></td>
						<td><?php echo $comment['content']; ?></td>
						<td><?php echo $comment['created']; ?></td>
						<td><?php echo $comment['modified']; ?></td>

					</tr>
				<?php endforeach; ?>
			</table>
		<?php endif; ?>

	</div>

</div>
<div class="row-fluid">
	<div class="span9">
		<h3><?php echo __('Related %s', __('Writings')); ?></h3>
		<?php if (!empty($user['Writing'])): ?>
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

				</tr>
				<?php foreach ($user['Writing'] as $writing): ?>
					<tr>
						<td><?php echo $writing['id']; ?></td>
						<td><?php echo $writing['category_id']; ?></td>
						<td><?php echo $writing['user_id']; ?></td>
						<td><?php echo $writing['title']; ?></td>
						<td><?php echo $writing['description']; ?></td>
						<td><?php echo $writing['content']; ?></td>
						<td><?php echo $writing['created']; ?></td>
						<td><?php echo $writing['modified']; ?></td>

					</tr>
				<?php endforeach; ?>
			</table>
		<?php endif; ?>

	</div>

</div>
