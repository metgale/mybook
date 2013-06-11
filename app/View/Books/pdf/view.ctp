<div class="pdfoutput">
	<div class="cover writing-view clearfix">
		<div class="writing-author">
			&copy;<?php echo $book['User']['username'] ?>&nbsp;
		</div>
		<div class="writing-title">
			<?php echo $book['Book']['title'] ?>
		</div>
		<div class="writing-description">
			"...<?php echo $book['Book']['description'] ?>..."
		</div>
		<div class="writing-author-location">
			<?php echo $book['User']['location'] ?>
		</div>
	</div>
</div>

<?php foreach ($book['Writing'] as $writing): ?>   
	<div class="content writing-view clearfix">
		<div class="writing-item">
			<div class="writing-title-text">
			<h2><?php echo nl2br($writing['title']); ?></h2>
			</div>
			<div class="writing-content">
				<?php echo nl2br($writing['content']); ?>
			</div>
		</div>
	</div>
<?php endforeach; ?>