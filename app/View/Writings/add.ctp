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
			<?php if ($book): ?>
			<legend>Dodavanje teksta u knjizi "<?php echo $book['Book']['title']?>"</legend>
			<?php endif; ?>
			<?php
			echo $this->Form->input('category_id', array(
				'label' => 'Kategorija',
				'required' => 'required',
				'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;')
			);
			if (!$book){
			echo $this->Form->input('book_id', 
					array('options' => $userbooks,'label' => 'Odaberite knjigu','empty' => true));
			}
			echo $this->Form->input('title', array(
				'label' => 'Naslov',
				'required' => 'required',
				'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;')
			);
			echo $this->Form->input('description', array(
				'label' => 'Opis',
				'required' => 'required',
				'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;')
			);
			
			echo $this->Form->input('sort', array(
				'empty' => true,
				'label' => 'Poglavlje',
				'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;')
			);
			
			echo $this->Form->input('content', array(
				'label' => 'Sadržaj',
				'required' => false
			));
			?>
			<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-success')); ?>
		</fieldset>
		<?php echo $this->Form->end(); ?>
	</div>

</div>