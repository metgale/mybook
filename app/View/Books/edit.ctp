<div class="row-fluid">
	<div class="span9">
		<?php echo $this->Form->create('Book', array('class' => 'form-horizontal')); ?>
		<fieldset>
			<legend><?php echo __('Uredi knjigu'); ?></legend>
			<?php
			echo $this->Form->input('title', array('label' => 'Naslov')
				);
				echo $this->Form->input('description', array('label' => 'O knjizi'));
				echo $this->Form->input('category_id', array('label' => 'Kategorija','required' => 'required'));
			echo $this->Form->hidden('id');
			?>
			<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-success')); ?>
			
		</fieldset>
		<?php echo $this->Form->end(); ?>
	</div>
</div>