<div class="row-fluid">
    <div class="span9">
		
        <div class="row-fluid">

			<div class="nav-left">
				<div class="dropdown">
					<a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
						Kategorije
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
						<?php foreach ($categories as $category): ?>  
						<p><?php echo $this->Html->link(h($category['Category']['name']), array(
								'controller' => 'Categories',
								'action' => 'view', $category['Category']['id'])); ?>	</p>
						
						<?php endforeach; ?>

					</ul>
				</div>			
			</div>


			<?php foreach ($writings as $writing): ?>     

				<div class="writing">
					<div class="writing-title">
						<h4><?php echo h($writing['Writing']['title']); ?></h4>
					</div>
					<p><?php echo h($writing['Writing']['description']); ?></p>
					<div class="writing-link">
						<?php echo $this->Html->link('Pročitaj', array('action' => 'view', $writing['Writing']['id'])); ?>	
					</div>
				</div>
			<?php endforeach; ?>
        </div>
		<?php
		echo $this->Paginator->pagination();
		?>
	</div>
</div>


