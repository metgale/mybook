<div class="row-fluid">
	<div class="span9">
		<?php echo $this->Form->create('Comment', array('class' => 'form-horizontal'));?>
			<fieldset>
				<legend><?php echo __('Add %s', __('Comment')); ?></legend>
				<?php
				echo $this->Form->input('user_id', array(
					'required' => 'required',
					'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;')
				);
				echo $this->Form->input('writing_id', array(
					'required' => 'required',
					'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;')
				);
				echo $this->Form->input('content', array(
					'required' => 'required',
					'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;')
				);
				?>
				<?php echo $this->Form->submit(__('Submit'));?>
			</fieldset>
		<?php echo $this->Form->end();?>
	</div>
	
	</div>
</div>