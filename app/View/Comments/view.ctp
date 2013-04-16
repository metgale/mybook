<div class="row-fluid">
	<div class="span9">
		<h2><?php  echo __('Comment');?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($comment['Comment']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('User'); ?></dt>
			<dd>
				<?php echo $this->Html->link($comment['User']['id'], array('controller' => 'users', 'action' => 'view', $comment['User']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Writing'); ?></dt>
			<dd>
				<?php echo $this->Html->link($comment['Writing']['title'], array('controller' => 'writings', 'action' => 'view', $comment['Writing']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Content'); ?></dt>
			<dd>
				<?php echo h($comment['Comment']['content']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Created'); ?></dt>
			<dd>
				<?php echo h($comment['Comment']['created']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Modified'); ?></dt>
			<dd>
				<?php echo h($comment['Comment']['modified']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	
</div>

