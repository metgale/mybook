<div class="writing-view clearfix">
	<div class="page-header clearfix"

		 <h1><?php echo $this->assign('title', $book['Book']['title']); ?></h1>
		<h3 class="pull-left">
			<?php
			echo $this->html->Link('Knjige', array(
				'controller' => 'books',
				'action' => 'index'
			));
			?></h3>
		<ul class="writings-categories pull-right">
			<?php foreach ($categories as $category): ?>  
				<li><?php
					echo $this->Html->link(h($category['Category']['name']), array(
						'controller' => 'books',
						'action' => 'category', $category['Category']['id']));
					?>	</li>
			<?php endforeach; ?>
		</ul>
	</div>

	<h2 class="writing-title"><?php echo $this->Html->link(h($book['Book']['title']), array('action' => 'view', $book['Book']['id']), array('class' => 'read-more')); ?>
	</h2>	
	<div class="metadata">
		<span class="writing-author">korisnik <?php echo $this->Html->link($book['User']['username'], array('controller' => 'users', 'action' => 'view', $book['User']['id'])); ?>&nbsp;</span>
		<span class="writing-category">u kategoriji <?php echo $this->Html->link($book['Category']['name'], array('controller' => 'writings', 'action' => 'category', $book['Category']['id']));
			?>&nbsp;</span>
	</div>

	<ul class='pdfdownload'>
		<?php
		if (AuthComponent::user()):
			echo $this->Html->link('Preuzmi pdf', array('action' => 'view', $book['Book']['id'] . '.pdf'), array('class' => 'read-more'));
			echo '<br>' . $this->Html->link('Preuzmi epub', array('action' => 'epub', $book['Book']['id']), array('class' => 'read-more'));
		endif;
		?>
	</ul>

	<div class="books-writings">
		<div class="span3">
			<?php if(isset($writings)): ?>
			<?php foreach ($writings as $writing): ?>    
				<div class="book-content">
					<h4 class="writing-title"><?php
						echo $this->Html->link(h($writing['Writing']['title']), array('controller' => 'books', 'action' => 'view', $book['Book']['id'], '?' => array('writing_id' => $writing['Writing']['id'])), array('class' => 'read-more'));
						?> &rarr;</h4>
				</div>

			<?php endforeach; ?>
			<?php endif; ?>
		</div>

		<?php if ($firstwriting): ?>
			<div class="span8">
				<h2><?php echo h($firstwriting['Writing']['title']); ?></h2>
				<div class="writing-item">
					<div class="writing-description">
						<?php echo h($firstwriting['Writing']['description']); ?>
					</div>
					<div class="writing-content">
						<?php echo nl2br(($firstwriting['Writing']['content'])); ?>
					</div>
					<div class="metadata">
						<span class="writing-date">objavljeno <?php echo $this->Time->format('d.m.Y.', $firstwriting['Writing']['created']); ?>&nbsp;</span>
						<span class="writing-category">u kategoriji <?php echo $this->Html->link($firstwriting['Category']['name'], array('controller' => 'writings', 'action' => 'category', $firstwriting['Category']['id']));
						?>&nbsp;</span>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
	
	<div class="row">
		<?php if (!empty($comments)): ?>
			<div id="comments" class="span8 offset2">
				<h3>Komentari</h3>
				<ol class="comments dl-horizontal">
					<?php foreach ($comments as $comment): ?>
						<li class="comment">
							<div class="metadata">
								<strong class="comment-username"><?php echo $comment['User']['username']; ?></strong>
								<span class="comment-created"><?php echo $comment['Comment']['created']; ?></span>
							</div>
							<p class="comment-content"><?php echo h($comment['Comment']['content']); ?></p>
						</li>
					<?php endforeach; ?>
				</ol>
				
			</div>
		<?php endif; ?>
		<?php if (AuthComponent::user()): ?>
			<div class="span8 offset2">
				<?php echo $this->Form->create('Comment', array('class' => 'form-horizontal')); ?>
				<fieldset>
					<legend>Komentiraj</legend>
					<?php
					echo $this->Form->input('content', array(
						'required' => 'required',
						'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;',
						'class' => 'input-xxlarge',
						'rows' => '5',
					));
					?>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Pošalji komentar</button>
					</div>
				</fieldset>
				<?php echo $this->Form->end(); ?>
			</div>
		<?php endif; ?>
	</div>

</div>


