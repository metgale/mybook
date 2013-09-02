<div class="row-fluid">
	<div class="span9">
		<?php echo $this->Form->create('User', array('class' => 'form-horizontal', 'type' => 'file')); ?>
		<fieldset>
			<legend><?php echo __('Registriraj se na myBook!'); ?></legend>
			<?php
			echo $this->Form->input('username', array(
				'required' => 'required',
				'label' => 'Korisničko ime'
			));
			echo $this->Form->input('password', array(
				'required' => 'required',
				'label' => 'Lozinka'
			));
			echo $this->Form->input('email', array(
				'required' => 'required',
				'label' => 'E-mail'
			));
			echo $this->Form->input('image', array('type' => 'file', 'label' => 'Slika'));
		
			?>
			<?php
			echo $this->Form->submit(__('Submit'), array(
				'class' => 'btn btn-primary'
					)
			);
			?>
		</fieldset>
		<?php echo $this->Form->end(); ?>

	</div>
</div>