<?php

class HomeController extends AppController {
	
	public $uses = array('Writing');
	
	public function index() {
		$this->paginate = array(
			'Writing' => array(
					'order' => 'Writing.created DESC',
					'limit' => 5,
					'contain' => array('User', 'Category')
				));
		$writings = $this->paginate('Writing');
		$this->set('latestWritings', $writings);
		$users = $this->Writing->User->find('all');
		$this->set('users', $users);
	}
}

?>
