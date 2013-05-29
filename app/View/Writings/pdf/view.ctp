<div class="writing-view clearfix cover">
	<div class="writing-author">
		<?php echo $writing['User']['username'] ?>&nbsp;
	</div>
	<div class="writing-title">
		<?php echo $writing['Writing']['title'] ?>
	</div>

</div>

<div class="writing-view clearfix">
	<div class="writing-item">
		<div class="writing-content">
			<?php echo nl2br($writing['Writing']['content']); ?>
		</div>
	</div>
</div>