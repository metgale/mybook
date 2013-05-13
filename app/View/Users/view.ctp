<div class="user-navtabs">
	<ul id="myTab" class="nav nav-tabs">
		<li class="active"><a href="#profile" data-toggle="tab">O autoru</a></li>
		<li><a href="#writings" data-toggle="tab">Izdana djela</a></li>
	</ul>
	<div id="myTabContent" class="tab-content">
		<div class="tab-pane fade in active" id="profile">
			<div class ="profile">
				<img class ="profile-picture" src="/img/profile.jpg">
			</div>			
		</div>
		<div class="tab-pane fade" id="writings">
			<div class="row-fluid">
				<div class="span9">
					<?php if (!empty($user['Writing'])): ?>
						<?php foreach ($writings as $writing): ?>
							<div class="writing-item">
								<h2 class="writing-title"><?php
									echo $this->Html->link(h($writing['Writing']['title']), array('controller' => 'writings', 'action' => 'view', $writing['Writing']['id']), array('class' => 'read-more'));
									?> &rarr;</h2>
								<div class="writing-description">
									<p><?php echo h($writing['Writing']['description']); ?></p>
								</div>
								<div class="metadata">
									<span class="writing-date"><?php echo $this->Time->timeAgoInWords($writing['Writing']['created']); ?>&nbsp;</span>
									<span class="writing-category">u kategoriji <?php echo $this->Html->link($writing['Category']['name'], array('controller' => 'writings', 'action' => 'category', $writing['Category']['id']));
									?>&nbsp;</span>
								</div>
								<?php #echo $this->Html->link('Pročitaj', array('action' => 'view', $writing['Writing']['id']), array('class' => 'read-more')); ?>	
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
					<?php ?>
				</div>
			</div>
		</div>
	</div>
</div>


	






