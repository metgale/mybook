<div class="loginform">
	<?php
	echo $this->Form->create('User', array('url' => '/users/login'));
	echo $this->Form->input('username');
	echo $this->Form->input('password');
	?> 
	<div class = "form-actions">
		<button type = "submit" class = "btn btn-success">Prijava</button>
	</div>
	
</div>