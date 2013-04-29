
<div class="row-fluid">
	<div class="span9">

		<table class="table">
				
			<?php foreach ($comments as $comments): ?>
				<tr>
					<td><?php echo $comments['Comment']['content']; ?></td>
					<td><?php echo $comments['Comment']['created']; ?></td>
				</tr>
			<?php endforeach; ?>
		</table>


	</div>


