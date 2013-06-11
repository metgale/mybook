<?php

class HomeController extends AppController {
	
	public $uses = array('Book');
	
	public function index() {
		$this->paginate = array(
			'Book' => array('conditions' => array('Book.featured' => true),
			'limit' => 1,
			'contain' => array('User', 'Writing', 'Category')
				));
		$this->set('featuredbook', $this->paginate());
		
		$options = array(
			'order' => 'Writing.created DESC',
			'limit' => 3,
			'contain' => array('User', 'Category')
		);
		$latestwritings = $this->Book->Writing->find('all', $options);
		$this->set('latestwritings', $latestwritings);
		
		$options_ = array(
			'order' => 'Book.created DESC',
			'limit' => 5
		);
		$latestbooks = $this->Book->find('all', $options_);
		$this->set('latestbooks', $latestbooks);
		
		$options = array(
			'limit' => 1,
			'conditions' => array('User.featured' => true)
			
		);
		$featureduser = $this->Book->User->find('all', $options);
		$this->set('featureduser', $featureduser);
	}
}
?>
