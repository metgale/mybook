<div class="row-fluid">
	<div class="span9">
		<?php echo $this->Form->postLink(__('Izbriši'), array('action' => 'delete', $book['Book']['id']), array('class' => 'btn btn-danger'), null, __('Are you sure you want to delete # %s?', $book['Book']['id'])); ?>

		<?php echo $this->Form->create('Book', array('class' => 'form-horizontal', 'type' => 'file')); ?>
		<fieldset>
			<legend><?php echo __('Uredi knjigu'); ?></legend>
			<?php
			echo $this->Form->input('title', array('label' => 'Naslov'));
			echo $this->Form->input('description', array('label' => 'O knjizi'));
			echo $this->Form->input('category_id', array('label' => 'Kategorija', 'required' => 'required'));
			echo $this->Form->hidden('id');
			echo $this->Form->input('image', array('type' => 'file', 'label' => 'Slika'));
			echo $this->Form->input('published', array(
				'label' => 'Objavi'
			));
			?>
			<?php echo $this->Form->submit(__('Potvrdi'), array('class' => 'btn btn-success')); ?>

		</fieldset>
		<?php echo $this->Form->end(); ?>
	</div>
</div>