<div class="row-fluid">
	<div class="span9">
		
		<?php echo $this->Form->create('User', array('class' => 'form-horizontal', 'type' => 'file')); ?>
		<fieldset>
			<legend><?php echo __('Uredi podatke'); ?></legend>
			<?php
			
			echo $this->Form->input('about', array(
				'empty' => true,
				'required' => 'required')
			);
			
			echo $this->Form->input('image', array('type' => 'file', 'label' => 'Slika'));
			echo $this->Form->hidden('id');
			?>
			<?php echo $this->Form->submit(__('Submit')); ?>
		</fieldset>
		<?php echo $this->Form->end(); ?>
	</div>
</div>