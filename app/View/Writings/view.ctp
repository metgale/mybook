<div class="writing-view clearfix">
	<div class="page-header clearfix">
		<h1><?php echo $this->assign('title', $writing['Writing']['title']); ?></h1>
		<h3 class="pull-left">
			<?php
			echo $this->html->Link('Tekstovi', array(
				'controller' => 'writings',
				'action' => 'index'
			));
			?></h3>
		<ul class="writings-categories pull-right">
			<?php foreach ($categories as $category): ?>  
				<li><?php
					echo $this->Html->link(h($category['Category']['name']), array(
						'controller' => 'writings',
						'action' => 'category', $category['Category']['id']));
					?>	</li>
			<?php endforeach; ?>
		</ul>
	</div>

	<h2 class="writing-title"><?php
		echo $this->Html->link(h($writing['Writing']['title']), array('action' => 'view', $writing['Writing']['id']), array('class' => 'read-more'));
		?></h2>
		
		(<?php if($allowComments):?>Objavljeno u knjizi:<?php else: ?>Neobjavljeni tekst u knjizi: <?php endif;?><?php echo $this->Html->link(h($writing['Book']['title']), array('controller' => 'books', 'action' => 'view', $writing['Book']['id'])) ?>)
	
	<ul class="uredi pull-right">
		<?php
		if (AuthComponent::user('id') == $writing['Writing']['user_id']):
			echo $this->Html->link('Uredi tekst', array(
				'controller' => 'writings',
				'action' => 'edit', $writing['Writing']['id']));
		endif;
		?>
	</ul>
	<ul class='pdfdownload'>
		<?php
		if (AuthComponent::user()):
			echo $this->Html->link('Preuzmi pdf', array('action' => 'view', $writing['Writing']['id'] . '.pdf'), array('class' => 'read-more'));
			echo '<br>' . $this->Html->link('Preuzmi epub', array('action' => 'epub', $writing['Writing']['id']), array('class' => 'read-more'));
		endif;
		?>
	</ul>
	<div class="writing-item">
		<div class="writing-description">
			<?php echo h($writing['Writing']['description']); ?>
		</div>
		<div class="writing-content">
			<?php echo nl2br(($writing['Writing']['content'])); ?>
		</div>
		<div class="metadata">
			<span class="writing-author">korisnik <?php echo $this->Html->link($writing['User']['username'], array('controller' => 'users', 'action' => 'view', $writing['User']['id'])); ?>&nbsp;</span>
			<span class="writing-date">objavljeno <?php echo $this->Time->format('d.m.Y.', $writing['Writing']['created']); ?>&nbsp;</span>
			<span class="writing-category">u kategoriji <?php echo $this->Html->link($writing['Category']['name'], array('controller' => 'writings', 'action' => 'category', $writing['Category']['id']));
			?>&nbsp;</span>
		</div>
	</div>
	<div class="row">
		<div id="related-writings" class="span8 offset2">	
			<h3>Povezane objave</h3>
			<?php foreach ($related as $related): ?>    
				<h5 class="writing-title"><?php
				echo $this->Html->link(h($related['Writing']['title']), array('action' => 'view', $related['Writing']['id']), array('class' => 'read-more'));
				?> &rarr;</h5>
					<?php #echo $this->Html->link('Pročitaj', array('action' => 'view', $writing['Writing']['id']), array('class' => 'read-more')); ?>	
			<?php endforeach; ?>

		</div>
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
				<?php echo $this->Paginator->pagination(); ?>
			</div>
		<?php endif; ?>
		<?php if (AuthComponent::user() && $allowComments): ?>
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


