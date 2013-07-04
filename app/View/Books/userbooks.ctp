<div class="mypage userbooks row-fluid">
	<div class="span9">
		<h2><div class="page-header"><?php echo __('Moje knjige'); ?></div></h2>
		<table class="table">
			<?php foreach ($books as $book): ?>
				<tr>
					<td id="title"><h4><?php echo $this->Html->link(__($book['Book']['title']), array('controller' => 'writings', 'action' => 'userwritings', $book['Book']['user_id'], '?' => array('book_id' => $book['Book']['id']))); ?>&nbsp;<?php if (!$book['Book']['published']): ?> 
							<span class="label label-important">Neobjavljeno</span>	
							<?php endif; ?></h4></td>
					<td class="actions">
						<?php echo $this->Html->link(__('Uredi'), array('action' => 'edit', $book['Book']['id']), array('class' => 'btn btn-warning')); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
		<div class="user-actions">
			<?php echo $this->Html->link(('Kreiraj novu knjigu'), array('controller' => 'books', 'action' => 'add'), array('class' => 'btn btn-success')) ?>
			<?php echo $this->Html->link(('Moji tekstovi'), array('controller' => 'writings', 'action' => 'userwritings', AuthComponent::user('id')), array('class' => 'btn btn-info')) ?>
			<?php echo $this->Paginator->pagination(); ?>
		</div>
	</div>
</div>