<?php

App::uses('AppController', 'Controller');
App::uses('CakePdf', 'CakePdf.Pdf');

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
	public function epub($writing_id) {
		$this->autoRender = false;
		$CakePdf = new CakePdf(Configure::read('CakePdf'));
		$html = $this->requestAction(
				array('controller' => 'writings', 'action' => 'view', 'ext' => 'pdf', $writing_id), array('return', 'bare' => FALSE)
		);
		$pdfFile = TMP . $writing_id . '.pdf';
		$epubFile = TMP . $writing_id . '.epub';

		file_put_contents($pdfFile, $html);
		exec("C:\www\calibre\ebook-convert.exe $pdfFile $epubFile");

		unlink($pdfFile);
		$this->response->disableCache();
		$this->response->type('application/epub');
		$this->response->download($writing_id . '.epub');
		$this->response->body(file_get_contents($epubFile));

		unlink($epubFile);
	}

	public function index() {

		$this->paginate = array(
			'limit' => 6,
			'order' => 'Writing.created DESC',
			'contain' => array('User', 'Category', 'Book'),
			'conditions' => array('Writing.published' => 1)
		);
		$this->set('writings', $this->paginate());
		$categories = $this->Writing->Category->find('all');
		$this->set('categories', $categories);
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function category($id) {

		$this->paginate = array(
			'conditions' => array('Writing.category_id' => $id),
			'limit' => 6,
			'order' => 'Writing.created DESC',
			'contain' => array('User', 'Category', 'Book'),
		);
		$this->set('writings', $this->paginate());

		$this->set('category', $this->Writing->Category->findById($id));
		$categories = $this->Writing->Category->find('all');
		$this->set('categories', $categories);
	}

	public function userwritings($id) {
		if ($id != $this->Auth->User('id')) {
			throw new NotFoundException(__('Invalid writing'));
		}

		$conditions = array('Writing.user_id' => $id);
		if ($this->request->query('book_id')) {
			$conditions = $conditions + array('Writing.book_id' => $this->request->query('book_id'));
			$this->set('book', $this->Writing->Book->findById($this->request->query('book_id')));
		}

		$this->paginate = array(
			'conditions' => $conditions,
			'limit' => 6,
			'order' => 'Writing.book_id DESC',
			'contain' => array('User', 'Category', 'Book'),
		);
		$this->set('writings', $this->paginate());

		$this->set('category', $this->Writing->Category->findById($id));
		$categories = $this->Writing->Category->find('all');
		$this->set('categories', $categories);
	}

	public function user($id) {

		$this->paginate = array(
			'conditions' => array('Writing.user_id' => $id, 'Writing.published' => 1),
			'order' => 'Writing.created DESC',
			'contain' => array('User', 'Category', 'Book'),
		);
		$this->set('writings', $this->paginate());

		$this->set('category', $this->Writing->Category->findById($id));
		$categories = $this->Writing->Category->find('all');
		$this->set('categories', $categories);
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id) {
		$this->set('allowComments', 1);
		if (!$this->Writing->exists($id)) {
			throw new NotFoundException(__('Invalid writing'));
		}
		$options = array(
			'conditions' => array('Writing.id' => $id),
			'contain' => array('Category', 'User', 'Book')
		);
		$writing = $this->Writing->find('first', $options);
		
		if($writing['Writing']['published'] == 0){
				if($writing['Writing']['user_id'] != $this->Auth->user('id')){
					throw new NotFoundException(__('Invalid writing'));
				}
				$this->set('allowComments', 0);
		}
		
		
		$this->set('writing', $writing);

		$bookid = $writing['Writing']['book_id'];
		$this->paginate = array(
			'Writing' => array(
				'conditions' => array(
					'Writing.book_id' => $bookid,
					'Writing.id !=' => $id,
					'Writing.book_id !=' => '0'
				),
				'contain' => array('User', 'Category'),
		));
		$related = $this->paginate('Writing');
		$this->set('related', $related);

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
			$this->Session->setFlash(
					('Hvala na komentaru :)'), 'alert', array(
				'plugin' => 'TwitterBootstrap',
				'class' => 'alert-success'
					)
			);
			$this->redirect(array('controller' => 'writings', 'action' => 'view', $id, '#' => 'comments'));
		}
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		$this->set('book', null);
		if ($this->request->query('book_id')) {
			$this->set('book', $this->Writing->Book->findById($this->request->query('book_id')));
			$this->request->data['Writing']['book_id'] = $this->request->query('book_id');
		}

		if ($this->request->is('post')) {
			$this->Writing->create();
			$this->request->data['Writing']['user_id'] = $this->Auth->user('id');
			if ($this->Writing->save($this->request->data)) {
				$this->Session->setFlash(
						('Writing has been saved'), 'alert', array(
					'plugin' => 'TwitterBootstrap',
					'class' => 'alert-success'
						)
				);
				$this->redirect(array('action' => 'userwritings', $this->Auth->user('id')));
			} else {
				$this->Session->setFlash(__('The writing could not be saved. Please, try again.'));
			}
		}
		$user_id = $this->Auth->user('id');
		$userbooks = $this->Writing->Book->find('list', array(
			'conditions' => array(
				'Book.user_id' => $user_id)
		));
		$this->set(compact('userbooks'));

		$categories = $this->Writing->Category->find('list');
		$users = $this->Writing->User->find('list');
		$books = $this->Writing->Book->find('list');
		$this->set(compact('categories', 'users', 'books'));
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
		if (!($writing['Writing']['user_id'] == $this->Auth->User('id'))) {
			throw new NotFoundException(__('Invalid writing'));
		}

		$writing = $this->Writing->findById($id);
		$this->set('writing', $writing);

		$user_id = $writing['Writing']['user_id'];
		$userbooks = $this->Writing->Book->find('list', array(
			'conditions' => array(
				'Book.user_id' => $user_id)
		));
		$this->set(compact('userbooks'));

		$this->request->data['Writing']['user_id'] = $this->Auth->user('id');
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Writing->save($this->request->data)) {
				$this->Session->setFlash(__('The writing has been saved'));
				$this->redirect(array('action' => 'userwritings', $this->Auth->user('id')));
			} else {
				$this->Session->setFlash(__('The writing could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Writing.' . $this->Writing->primaryKey => $id));
			$this->request->data = $this->Writing->find('first', $options);
		}
		$categories = $this->Writing->Category->find('list');
		$this->set(compact('categories'));
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
			$this->redirect(array('action' => 'userwritings', $this->Auth->user('id')));
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
