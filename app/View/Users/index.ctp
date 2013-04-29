<div class="row-fluid">
	<div class="span9">
		<h2><?php echo __('List %s', __('Users')); ?></h2>
		<?php debug($users); ?>
		<p>
			<?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'))); ?>
		</p>



		<table class="table">
			<tr>
				<th><?php echo $this->Paginator->sort('username'); ?></th>

			</tr>
			<?php foreach ($users as $user): ?>
				<tr>
					<td>
						<?php echo $this->Html->link(__($user['User']['username']), array('action' => 'view', $user['User']['id'])); ?>				
					</td>
				</tr>
			<?php endforeach; ?>
		</table>

		<?php echo $this->Paginator->pagination(); ?>
	</div>

</div>
</div