<div class="row-fluid">
	<div class="span9">
		<?php echo $this->Form->create('User', array('class' => 'form-horizontal')); ?>
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