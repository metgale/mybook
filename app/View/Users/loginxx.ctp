<div class="loginform">
	<?php
	echo $this->Form->create();
	echo $this->Form->input('username');
	echo $this->Form->input('password');
	echo $this->Form->end('Login');
	?> 
</div>