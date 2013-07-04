<div class="page-header writings-index clearfix">
	<h3 class="pull-left">
		<?php echo $this->html->Link('Tekstovi', array(
         			'controller' => 'writings',
         			'action' => 'index'
				)); ?></h3>
	<ul class="writings-categories pull-right">
		<?php foreach ($categories as $category): ?>  
		<li><?php echo $this->Html->link(h($category['Category']['name']), array(
				'controller' => 'writings',
				'action' => 'category', $category['Category']['id'])); ?>	</li>
		<?php endforeach; ?>

	</ul>
</div>

<div class="row">

    <div class="span12">
		<?php foreach ($writings as $writing): ?>    
			<div class="writing-item">
				<h2 class="writing-title"><?php 
					echo $this->Html->link(h($writing['Writing']['title']), array('action' => 'view', $writing['Writing']['id']), array('class' => 'read-more'));
				?> &rarr;</h2>
				<div class="writing-description">
					<p><?php echo h($writing['Writing']['description']); ?></p>
				</div>
				<div class="metadata">
					<span class="writing-author">korisnik <?php echo $this->Html->link($writing['User']['username'], array('controller' => 'users', 'action' => 'view', $writing['User']['id'])); ?>&nbsp;</span>
					<span class="writing-date">objavljeno <?php echo $this->Time->format('d.m.Y.', $writing['Writing']['created']); ?>&nbsp;</span>
					<span class="writing-category">u kategoriji <?php echo $this->Html->link($writing['Category']['name'], 
					array('controller' => 'writings', 'action' => 'category', $writing['Category']['id'])); ?>&nbsp;</span>	
					<span class="writing-book">
						<?php if($writing['Book']['id'] == null): ?>
						Kratki tekst
						<?php else: ?>
						Tekst u knjizi:					
						<?php endif; ?>
						<?php echo $this->Html->link($writing['Book']['title'], array('controller' => 'books','action' => 'view',	$writing['Book']['id']))
						?>&nbsp;
					</span>
				</div>
		<?php #echo $this->Html->link('Pročitaj', array('action' => 'view', $writing['Writing']['id']), array('class' => 'read-more')); ?>	
			</div>
		<?php endforeach; ?>
	</div>
</div>

<?php echo $this->Paginator->pagination(); ?>

