<div class="row-fluid">
	<div class="span9">
		<h2><?php echo $writing['Writing']['title'] ?></h2>
		<dl>
			<dt><?php echo __('Kategorija'); ?></dt>
			<dd>
				<?php echo $this->Html->link($writing['Category']['category'], array('controller' => 'categories', 'action' => 'view', $writing['Category']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Objavio:'); ?></dt>
			<dd>
				<?php echo $this->Html->link($writing['User']['username'], array('controller' => 'users', 'action' => 'view', $writing['User']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Naslov'); ?></dt>
			<dd>
				<?php echo h($writing['Writing']['title']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Opis'); ?></dt>
			<dd>
				<?php echo h($writing['Writing']['description']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Sadržaj'); ?></dt>
			<dd>
				<?php echo h($writing['Writing']['content']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Objavljeno'); ?></dt>
			<dd>
				<?php echo h($writing['Writing']['created']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>

	<?php echo $this->Form->create('Comment', array('class' => 'form-horizontal')); ?>
	<fieldset>
		<legend><?php echo __('Add %s', __('Comment')); ?></legend>
		<?php
		echo $this->Form->input('content', array(
			'required' => 'required',
			'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;')
		);
		?>
		<?php echo $this->Form->submit(__('Submit')); ?>
	</fieldset>

	<div class="row-fluid">
		<div class="span9">

			<?php if (!empty($writing['Comment'])): ?>
				<table class="table">
					<tr>
						<th><?php echo __('User Id'); ?></th>
						<th><?php echo __('Writing Id'); ?></th>
						<th><?php echo __('Content'); ?></th>
						<th><?php echo __('Created'); ?></th>
						<th><?php echo __('Modified'); ?></th>

					</tr>
					<?php foreach ($writing['Comment'] as $comment): ?>
						<tr>
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
