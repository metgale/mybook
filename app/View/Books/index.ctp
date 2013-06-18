<div class="page-header clearfix">
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
<div class="books-index row clearfix">
	<div class="span12">
		<?php foreach ($books as $book): ?>    
			<div class="span4 writing-item clearfix">
				<img class ="writing-cover" src="/img/book_cover.jpg">
				<h3 class="writing-title">
					<?php
					echo $this->Html->link($book['Book']['title'], array(
						'controller' => 'books', 'action' => 'view', $book['Book']['id']));
					?> &rarr;
				</h3>
				<div class="writing-description clearfix">
					<p><?php echo h($book['Book']['description']); ?></p>
				</div>
				<div class="metadata">
					<span class="writing-author">
						Korisnik <?php
						echo $this->Html->link($book['User']['username'], array(
							'controller' => 'users', 'action' => 'view', $book['User']['id']));
						?> &rarr;
						&nbsp;</span>
					<span class="writing-date"></span>
					<span class="writing-category">&nbsp;</span>
				</div>
				<?php #echo $this->Html->link('Pročitaj', array('action' => 'view', $writing['Writing']['id']), array('class' => 'read-more')); ?>	
			</div>
		<?php endforeach; ?>
	</div>
</div>
<?php echo $this->Paginator->pagination(); ?>

