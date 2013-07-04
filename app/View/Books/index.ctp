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
<div class="books row">
    <div class="span12 clearfix">  
		<?php foreach ($books as $book): ?>
			<div class="media">
				<?php if ($book['AttachmentImage']['filename']) { ?>
					<a class="pull-left" href="#">
						<img class ="media-object" src="/img/covers/thumb.<?php echo $book['AttachmentImage']['filename'] ?>">
					</a>
				<?php } ?>

				<?php if (!$book['Book']['cover']) { ?>
					<a class="pull-left" href="#">
						<img class ="media-object" src="/img/missing_cover.jpg">
					</a>
				<?php } ?>
				<div class="media-body">
					<div class="media-heading">
						<h2 class="writing-title"><?php
							echo $this->Html->link(h($book['Book']['title']), array('action' => 'view', $book['Book']['id']), array('class' => 'read-more'));
							?> &rarr;</h2>
						<p><?php echo $book['Book']['description'] ?> </p>
						<div class="metadata">
							<span class="writing-author">korisnik <?php echo $this->Html->link($book['User']['username'], array('controller' => 'users', 'action' => 'view', $book['User']['id'])); ?>&nbsp;</span>
							<span class="writing-date">objavljeno <?php echo $this->Time->format('d.m.Y.', $book['Book']['created']); ?>&nbsp;</span>
							<span class="writing-category">u kategoriji <?php echo $this->Html->link($book['Category']['name'], array('controller' => 'writings', 'action' => 'category', $book['Category']['id']));
							?>&nbsp;</span>	
						</div>
					</div>
				</div>
			</div>
		<?php endforeach ?>
	</div>
</div>
</div>
<?php echo $this->Paginator->pagination(); ?>

