<?php

class HomeController extends AppController {
	
	public $uses = array('Book');
	
	public function index() {
		$options = array(
			'order' => 'Writing.created DESC',
			'limit' => 6,
			'contain' => array('User', 'Category'),
			'conditions' => array('Writing.published' => 1)
		);
		$latestwritings = $this->Book->Writing->find('all', $options);
		$this->set('latestwritings', $latestwritings);
		
		$options_ = array(
			'order' => 'Book.created DESC',
			'limit' => 6,
			'contain' => array('User', 'AttachmentImage'),
			'conditions' => array('Book.published' => 1)			
		);
		$latestbooks = $this->Book->find('all', $options_);
		$this->set('latestbooks', $latestbooks);
	}
}
?>
