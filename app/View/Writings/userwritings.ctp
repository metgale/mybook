<div class="userwritings row-fluid">
	<div class="span9">
		<?php $bookid = null; ?>
		<h2><?php echo __('Moji tekstovi'); ?></h2>
		<?php if (isset($book)) { ?>
			<?php $bookid = $book['Book']['id']; ?>
			<h2>U knjizi "<?php echo $book['Book']['title'] ?>"</h2>
		<?php } ?>
		<table class="table">
			<tr id="sort">
				<th></th>
				<?php if (!isset($book)) { ?>
					<th><?php echo $this->Paginator->sort('book_id', 'U knjizi '); ?>&darr;</th>
				<?php } ?>
			</tr>
			<?php foreach ($writings as $writing): ?>
				<tr>
					<td id="title"><h4>
							<?php echo $this->Html->link(__($writing['Writing']['title']), array('action' => 'view', $writing['Writing']['id'])); ?>
							&nbsp;<?php if (!$writing['Writing']['published']): ?> 
							<span class="label label-important">Neobjavljeno</span>	
							<?php endif; ?></h4></td>
					<?php if (!isset($book)) { ?>
						<td id="title"><?php echo $this->Html->link(__($writing['Book']['title']), array('controller' => 'writings', 'action' => 'userwritings', $writing['User']['id'], '?' => array('book_id' => $writing['Book']['id']))); ?>
							&nbsp;</td>
					<?php } ?>
					<td class="actions">
						<?php echo $this->Html->link(__('Uredi'), array('action' => 'edit', $writing['Writing']['id']), array('class' => 'btn btn-warning')); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
		<div class="user-actions">
			<?php echo $this->Html->link(('Kreiraj novi tekst'), array('controller' => 'writings', 'action' => 'add', '?' => array('book_id' => $bookid)), array('class' => 'btn btn-success')) ?>
			<?php echo $this->Html->link(('Moje knjige'), array('controller' => 'books', 'action' => 'userbooks', AuthComponent::user('id')), array('class' => 'btn btn-info')) ?>
			<?php echo $this->Paginator->pagination(); ?>
		</div>
	</div>

</div>