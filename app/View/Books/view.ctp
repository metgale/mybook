<div class="writing-view clearfix">
	<div class="page-header clearfix"
		 <h1><?php echo $this->assign('title', $book['Book']['title']); ?></h1>
		<h3 class="pull-left">
			<?php
			echo $this->html->Link('Books', array(
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
			<?php foreach ($writings as $writing): ?>    
				<div class="book-content">
					<h4 class="writing-title"><?php
						echo $this->Html->link(h($writing['Writing']['title']), array('controller' => 'books', 'action' => 'view', $book['Book']['id'], '?' => array('writing_id' => $writing['Writing']['id'])), array('class' => 'read-more'));
						?> &rarr;</h4>
				</div>

			<?php endforeach; ?>
		</div>
		
		<?php if($firstwriting):?>
		<div class="span8">
			<div class="writing-item">
				<div class="writing-description">
					<?php echo h($firstwriting['Writing']['description']); ?>
				</div>
				<div class="writing-content">
					<?php echo nl2br(($firstwriting['Writing']['content'])); ?>
				</div>
				<div class="metadata">
					<span class="writing-author">korisnik <?php echo $this->Html->link($firstwriting['User']['username'], array('controller' => 'users', 'action' => 'view', $firstwriting['User']['id'])); ?>&nbsp;</span>
					<span class="writing-date"><?php echo $this->Time->timeAgoInWords($firstwriting['Writing']['created']); ?>&nbsp;</span>
					<span class="writing-category">u kategoriji <?php echo $this->Html->link($firstwriting['Category']['name'], array('controller' => 'writings', 'action' => 'category', $firstwriting['Category']['id']));
					?>&nbsp;</span>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>
	
</div>


