


<div class="row-fluid">
	<div class="span9">


		<script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
		<script type="text/javascript">
			tinymce.init({
				selector: "textarea",
				theme: "modern",
				plugins: [
					"advlist autolink lists link image charmap print preview hr anchor pagebreak",
					"searchreplace wordcount visualblocks visualchars code fullscreen",
					"insertdatetime media nonbreaking save table contextmenu directionality",
					"emoticons template paste"
				],
				toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
				toolbar2: "print preview media | forecolor backcolor emoticons",
				templates: [
					{title: 'Test template 1', content: 'Test 1'},
					{title: 'Test template 2', content: 'Test 2'}
				],
			});
		</script>




		<?php echo $this->Form->create('Writing', array('class' => 'form-horizontal')); ?>
		<fieldset>
			<legend><?php echo __('Add %s', __('Writing')); ?></legend>
			<?php
			echo $this->Form->input('category_id', array(
				'required' => 'required',
				'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;')
			);

			echo $this->Form->input('title', array(
				'required' => 'required',
				'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;')
			);
			echo $this->Form->input('description', array(
				'required' => 'required',
				'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;')
			);
			echo $this->Form->input('content', array(
				'required' => false
			));
			?>
			<?php echo $this->Form->submit(__('Submit')); ?>
		</fieldset>
		<?php echo $this->Form->end(); ?>
	</div>

</div>