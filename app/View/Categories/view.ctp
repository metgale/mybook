

<div class="row-fluid">
	<div class="nav-left">
				<div class="dropdown">
					<a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
						Kategorije
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
						<?php foreach ($categories as $category): ?>  
						<li><?php echo $this->Html->link(h($category['Category']['name']), array(
								'controller' => 'Categories',
								'action' => 'view', $category['Category']['id'])); ?>	</li>
						<?php endforeach; ?>

					</ul>
				</div>			
			</div>


		<table class="table">

			<?php foreach ($writings as $writing): ?>     

				<div class="box">
					<div class="box-title">
						<h4><?php echo h($writing['Writing']['title']); ?></h4>
					</div>
					<p><?php echo h($writing['Writing']['description']); ?></p>
					<div class="box-link">
						<?php
						echo $this->Html->link('Pročitaj', array(
							'controller' => 'writings',
							'action' => 'view', $writing['Writing']['id']));
						?>	
					</div>
					<div class="box-date">
						<?php echo $this->Time->timeAgoInWords($writing['Writing']['created']); ?>
					</div>
				</div>
			<?php endforeach; ?>

		</table>
		<?php echo $this->Paginator->pagination(); ?>
	

</div>
