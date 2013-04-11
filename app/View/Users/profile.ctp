<div class="row-fluid">
	<div class="span9">
		<?php echo $this->Form->create('User', array('class' => 'form-horizontal'));?>
			<fieldset>
				<legend><?php echo AuthComponent::user('username') ?></legend>
			</fieldset>
	</div>
</div>