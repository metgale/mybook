<div class="pdfoutput">

	<div class="cover writing-view clearfix">
		<div class="writing-author">
			&copy;<?php echo $writing['User']['username'] ?>&nbsp;
		</div>
		<div class="writing-title">
			<?php echo $writing['Writing']['title'] ?>
		</div>
		<div class="writing-description">
			"...<?php echo $writing['Writing']['description'] ?>..."
		</div>
		<div class="writing-author-location">
			<?php echo $writing['User']['location'] ?>
		</div>

	</div>

	<div class="writing-view clearfix">
		<div class="writing-item">
			<div class="writing-content">
				<?php echo nl2br($writing['Writing']['content']); ?>
			</div>
		</div>
	</div>
</div>