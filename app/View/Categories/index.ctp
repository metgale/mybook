<div class="row-fluid">
	<div class="span9">
		<h2><?php echo __('List %s', __('Categories'));?></h2>

		<?php debug($categories); ?>
		<?php foreach ($categories as $category): ?>
		<?php echo $this->Html->link($category['Category']['name'], array('action' => 'view', $category['Category']['id'])); ?> 
		<?php endforeach; ?>
		</table>

		<?php echo $this->Paginator->pagination(); ?>
	</div>
	
</div>