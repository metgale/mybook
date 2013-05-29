<?php

App::uses('AppController', 'Controller');

/**
 * Writings Controller
 *
 * @property Writing $Writing
 */
class WritingsController extends AppController {
	/**
	 * index method
	 *
	 * @return void
	 */
	public function index($conditions = array()) {
		$default_conditions = array();
		$conditions = array_merge($default_conditions, $conditions);

		$this->paginate = array(
			'conditions' => $conditions,
			'limit' => 6,
			'order' => 'Writing.created DESC',
			'contain' => array('User', 'Category'),
		);
		$this->set('writings', $this->paginate());
		$categories = $this->Writing->Category->find('all');
		$this->set('categories', $categories);
		$this->render('index');
	}
	/**
	 * index method
	 *
	 * @return void
	 */
	public function category($id) {
		$this->autoRender = false;
		$this->set('category', $this->Writing->Category->findById($id));
		$this->index(array('Writing.category_id' => $id));
	}
	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id) {
		if (!$this->Writing->exists($id)) {
			throw new NotFoundException(__('Invalid writing'));
		}
		$options = array(
			'conditions' => array('Writing.id' => $id),
			'contain' => array('Category', 'User')
		);
		$writing = $this->Writing->find('first', $options);
		$this->set('writing', $writing);
		$this->paginate = array(
			'Comment' => array(
				'conditions' => array(
					'Comment.writing_id' => $id),
				'order' => 'Comment.created DESC',
				'contain' => array('User'),
				'limit' => 10
		));
		$comments = $this->paginate('Comment');
		$this->set('comments', $comments);

		$categories = $this->Writing->Category->find('all');
		$this->set('categories', $categories);

		$this->pdfConfig = array(
			'filename' => Inflector::slug($writing['Writing']['title'])
		);
		if (!$this->request->is('post')) {
			return false;
		}
		if (empty($this->request->data)) {
			$this->Session->setFlash('Niste unijeli komentar');
			return false;
		}
		$this->request->data['Comment']['user_id'] = $this->Auth->user('id');
		$this->request->data['Comment']['writing_id'] = $id;
		if ($this->Writing->Comment->save($this->request->data)) {
			$this->Session->setFlash('ok');
			$this->redirect(array('controller' => 'writings', 'action' => 'view', $id, '#' => 'comments'));
		}
	}
	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Writing->create();
			$this->request->data['Writing']['user_id'] = $this->Auth->user('id');
			if ($this->Writing->save($this->request->data)) {
				$this->Session->setFlash(__('The writing has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The writing could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Writing->Category->find('list');
		$users = $this->Writing->User->find('list');
		$this->set(compact('categories', 'users'));
	}
	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 *
	 * 
	 * @param string $id
	 * @throws NotFoundException
	 */
	public function edit($id = null) {
		if (!$this->Writing->exists($id)) {
			throw new NotFoundException(__('Invalid writing'));
		}
		$writing = $this->Writing->findById($id);
		if(!($writing['Writing']['user_id'] == $this->Auth->User('id'))){
			throw new NotFoundException(__('Invalid writing'));
		}
			if ($this->request->is('post') || $this->request->is('put')) {
				if ($this->Writing->save($this->request->data)) {
					$this->Session->setFlash(__('The writing has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The writing could not be saved. Please, try again.'));
				}
			} else {
				$options = array('conditions' => array('Writing.' . $this->Writing->primaryKey => $id));
				$this->request->data = $this->Writing->find('first', $options);
			}
			$categories = $this->Writing->Category->find('list');
			$users = $this->Writing->User->find('list');
			$this->set(compact('categories', 'users'));
		}
	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @throws MethodNotAllowedException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		$this->Writing->id = $id;
		if (!$this->Writing->exists()) {
			throw new NotFoundException(__('Invalid writing'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Writing->delete()) {
			$this->Session->setFlash(__('Writing deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Writing was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this->paginate = array(
			'limit' => 6,
			'contain' => array('Category', 'User'));
		$this->set('writings', $this->paginate());
	}

	/**
	 * admin_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		if (!$this->Writing->exists($id)) {
			throw new NotFoundException(__('Invalid writing'));
		}
		$options = array(
			'conditions' => array('Writing.' . $this->Writing->primaryKey => $id),
			'contain' => array('Category', 'User', 'Comment'));
		$this->set('writing', $this->Writing->find('first', $options));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Writing->create();
			if ($this->Writing->save($this->request->data)) {
				$this->Session->setFlash(__('The writing has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The writing could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Writing->Category->find('list');
		$users = $this->Writing->User->find('list');
		$this->set(compact('categories', 'users'));
	}

	/**
	 * admin_edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {
		if (!$this->Writing->exists($id)) {
			throw new NotFoundException(__('Invalid writing'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Writing->save($this->request->data)) {
				$this->Session->setFlash(__('The writing has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The writing could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Writing.' . $this->Writing->primaryKey => $id));
			$this->request->data = $this->Writing->find('first', $options);
		}
		$categories = $this->Writing->Category->find('list');
		$users = $this->Writing->User->find('list');
		$this->set(compact('categories', 'users'));
	}

	/**
	 * admin_delete method
	 *
	 * @throws NotFoundException
	 * @throws MethodNotAllowedException
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null) {
		$this->Writing->id = $id;
		if (!$this->Writing->exists()) {
			throw new NotFoundException(__('Invalid writing'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Writing->delete()) {
			$this->Session->setFlash(__('Writing deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Writing was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
