<?php echo $this->assign('title', $writing['Writing']['title']); ?>
<div class="row-fluid">


	<div class="span9">

		<h2><?php echo $writing['Writing']['title'] ?></h2>
		<dl>
			<dt><?php echo __('Kategorija'); ?></dt>
			<dd>
				<?php echo $this->Html->link($writing['Category']['name'], array('controller' => 'categories', 'action' => 'view', $writing['Category']['id'])); ?>
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
				<?php echo ($writing['Writing']['content']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Objavljeno'); ?></dt>
			<dd>
				<?php echo h($writing['Writing']['created']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>



	<div class="row-fluid">
		<div id="comments" class="span9">

			<?php if (!empty($comments)): ?>
				<table class="table">
					<tr>
						<th><?php echo __('User Id'); ?></th>
						<th><?php echo __('Content'); ?></th>
						<th><?php echo __('Created'); ?></th>
						<th><?php echo __('Modified'); ?></th>

					</tr>
					<?php foreach ($comments as $comment): ?>
						<tr>
							<td><?php echo $comment['User']['username']; ?></td>
							<td><?php echo $comment['Comment']['content']; ?></td>
							<td><?php echo $comment['Comment']['created']; ?></td>
							<td><?php echo $comment['Comment']['modified']; ?></td>
						</tr>
					<?php endforeach; ?>
				</table>
			<?php endif; ?>
			<?php echo $this->Paginator->pagination(); ?>
		</div>
	</div>
	
		<div class="row-fluid">
			<div class="span9">
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
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
</div>


