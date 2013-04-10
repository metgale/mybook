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
	public function index() {
		$this->Writing->recursive = 0;
        $writings = $this->Writing->find('all');
        $this->set('writings', $writings);
		$this->set('writings', $this->paginate());
	}
	
/**
 * index method
 *
 * @return void
 */
	public function category($id) {
		$this->Writing->recursive = 0;
        $writings = $this->Writing->find('all', array(
			'conditions' => array(
				'Writing.category_id' => $id
			),
			'order' => 'Writing.created DESC',
			'limit' => 10
		));
       $this->set('writings', $this->paginate());
	   $this->set('category', $this->Writing->Category->findById($id));
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
		$options = array('conditions' => array('Writing.id' => $id));
		$this->set('writing', $this->Writing->find('first', $options));
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
 */
	public function edit($id = null) {
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
		$this->Writing->recursive = 0;
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
		$options = array('conditions' => array('Writing.' . $this->Writing->primaryKey => $id));
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
