<?php

App::uses('AppController', 'Controller');
App::uses('CakePdf', 'CakePdf.Pdf');

/**
 * Books Controller
 *
 * @property Book $Book
 */
class BooksController extends AppController {

	/**
	 * Helpers
	 *
	 * @var array
	 */
	public $helpers = array('TwitterBootstrap.BootstrapHtml', 'TwitterBootstrap.BootstrapForm', 'TwitterBootstrap.BootstrapPaginator');
	

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Session');

	public function epub($book_id) {
		$this->autoRender = false;
		$CakePdf = new CakePdf(Configure::read('CakePdf'));
		$html = $this->requestAction(
				array('controller' => 'books', 'action' => 'view', 'ext' => 'pdf', $book_id), array('return', 'bare' => FALSE)
		);
		$pdfFile = TMP . $book_id . '.pdf';
		$epubFile = TMP . $book_id . '.epub';

		file_put_contents($pdfFile, $html);
		exec("C:\www\calibre\ebook-convert.exe $pdfFile $epubFile");

		unlink($pdfFile);
		$this->response->disableCache();
		$this->response->type('application/epub');
		$this->response->download($book_id . '.epub');
		$this->response->body(file_get_contents($epubFile));

		unlink($epubFile);
	}

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
			'contain' => array('User', 'Category'),
		);
		$this->set('books', $this->paginate());
		$categories = $this->Book->Category->find('all');
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
		$this->set('category', $this->Book->Category->findById($id));
		$this->index(array('Book.category_id' => $id));
	}

	public function userbooks($id) {
		if (!($id == $this->Auth->User('id'))) {
			throw new NotFoundException(__('Invalid writing'));
		}
		$this->paginate = array(
			'conditions' => array('Book.user_id' => $id),
			'limit' => 6,
			'order' => 'Book.created DESC',
			'contain' => array('User', 'Category', 'Writing'),
		);
		$this->set('books', $this->paginate());
		$this->set('category', $this->Book->Category->findById($id));
		$categories = $this->Book->Category->find('all');
		$this->set('categories', $categories);
	}

	public function user($id) {
		$this->paginate = array(
			'conditions' => array('Book.user_id' => $id),
			'order' => 'Book.created DESC',
			'contain' => array('User', 'Category', 'Writing'),
		);
		$this->set('books', $this->paginate());
		$this->set('category', $this->Book->Category->findById($id));
		$categories = $this->Book->Category->find('all');
		$this->set('categories', $categories);
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this->Book->id = $id;
		if (!$this->Book->exists()) {
			throw new NotFoundException(__('Invalid %s', __('book')));
		}
		$options = array(
			'conditions' => array('Book.' . $this->Book->primaryKey => $id),
			'contain' => array('Category', 'User', 'Writing'));
		$this->set('book', $this->Book->find('first', $options));
		$categories = $this->Book->Category->find('all');
		$this->set('categories', $categories);

		$writings = $this->Book->Writing->find('all', array(
			'conditions' => array(
				'Writing.book_id' => $id
			),
			'order' => 'Writing.sort ASC'
		));
		$this->set('writings', $writings);

		if ($this->request->query('writing_id')) {
			$firstwriting = $this->Book->Writing->find('first', array(
				'contain' => array('User', 'Category'),
				'order' => 'Writing.sort ASC',
				'conditions' => array(
					'Writing.id' => $this->request->query('writing_id')
				)
			));
			$this->set('firstwriting', $firstwriting);
		} else {

			$firstwriting = $this->Book->Writing->find('first', array(
				'contain' => array('User', 'Category'),
				'order' => 'Writing.sort ASC',
				'conditions' => array(
					'Writing.book_id' => $id
				)
			));
			$this->set('firstwriting', $firstwriting);
		}
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Book->create();
			$this->request->data['Book']['user_id'] = $this->Auth->user('id');
			if ($this->Book->save($this->request->data)) {
				$this->Session->setFlash(
						__('The %s has been saved', __('book')), 'alert', array(
					'plugin' => 'TwitterBootstrap',
					'class' => 'alert-success'
						)
				);
				$this->redirect(array('action' => 'userbooks', $this->Auth->user('id')));
			} else {
				$this->Session->setFlash(
						__('The %s could not be saved. Please, try again.', __('book')), 'alert', array(
					'plugin' => 'TwitterBootstrap',
					'class' => 'alert-error'
						)
				);
			}
		}
		$users = $this->Book->User->find('list');
		$categories = $this->Book->Category->find('list');
		$this->set(compact('users', 'categories'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this->Book->id = $id;

		$book = $this->Book->findById($id);
		$this->set('book', $book);
		if (!$book) {
			throw new NotFoundException(__('Invalid %s', __('book')));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Book->save($this->request->data)) {
				$this->Session->setFlash(
						__('The %s has been saved', __('book')), 'alert', array(
					'plugin' => 'TwitterBootstrap',
					'class' => 'alert-success'
						)
				);
				$this->redirect(array('action' => 'userbooks', $book['Book']['user_id']));
			} else {
				$this->Session->setFlash(
						__('The %s could not be saved. Please, try again.', __('book')), 'alert', array(
					'plugin' => 'TwitterBootstrap',
					'class' => 'alert-error'
						)
				);
			}
		} else {
			$this->request->data = $this->Book->read(null, $id);
		}

		$users = $this->Book->User->find('list');
		$categories = $this->Book->Category->find('list');
		$this->set(compact('users', 'categories'));
	}

	/**
	 * delete method
	 *
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Book->id = $id;
		if (!$this->Book->exists()) {
			throw new NotFoundException(__('Invalid %s', __('book')));
		}
		if ($this->Book->delete()) {
			$this->Session->setFlash(
					__('The %s deleted', __('book')), 'alert', array(
				'plugin' => 'TwitterBootstrap',
				'class' => 'alert-success'
					)
			);
			$this->redirect(array('action' => 'userbooks', $this->Auth->user('id')));
		}
		$this->Session->setFlash(
				__('The %s was not deleted', __('book')), 'alert', array(
			'plugin' => 'TwitterBootstrap',
			'class' => 'alert-error'
				)
		);
		$this->redirect(array('action' => 'index'));
	}

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this->Book->recursive = 0;
		$this->set('books', $this->paginate());
	}

	/**
	 * admin_view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		$this->Book->id = $id;
		if (!$this->Book->exists()) {
			throw new NotFoundException(__('Invalid %s', __('book')));
		}
		$this->set('book', $this->Book->read(null, $id));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Book->create();
			if ($this->Book->save($this->request->data)) {
				$this->Session->setFlash(
						__('The %s has been saved', __('book')), 'alert', array(
					'plugin' => 'TwitterBootstrap',
					'class' => 'alert-success'
						)
				);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(
						__('The %s could not be saved. Please, try again.', __('book')), 'alert', array(
					'plugin' => 'TwitterBootstrap',
					'class' => 'alert-error'
						)
				);
			}
		}
		$users = $this->Book->User->find('list');
		$categories = $this->Book->Category->find('list');
		$this->set(compact('users', 'categories'));
	}

	/**
	 * admin_edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {
		$this->Book->id = $id;
		if (!$this->Book->exists()) {
			throw new NotFoundException(__('Invalid %s', __('book')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Book->save($this->request->data)) {
				$this->Session->setFlash(
						__('The %s has been saved', __('book')), 'alert', array(
					'plugin' => 'TwitterBootstrap',
					'class' => 'alert-success'
						)
				);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(
						__('The %s could not be saved. Please, try again.', __('book')), 'alert', array(
					'plugin' => 'TwitterBootstrap',
					'class' => 'alert-error'
						)
				);
			}
		} else {
			$this->request->data = $this->Book->read(null, $id);
		}
		$users = $this->Book->User->find('list');
		$categories = $this->Book->Category->find('list');
		$this->set(compact('users', 'categories'));
	}

	/**
	 * admin_delete method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Book->id = $id;
		if (!$this->Book->exists()) {
			throw new NotFoundException(__('Invalid %s', __('book')));
		}
		if ($this->Book->delete()) {
			$this->Session->setFlash(
					__('The %s deleted', __('book')), 'alert', array(
				'plugin' => 'TwitterBootstrap',
				'class' => 'alert-success'
					)
			);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(
				__('The %s was not deleted', __('book')), 'alert', array(
			'plugin' => 'TwitterBootstrap',
			'class' => 'alert-error'
				)
		);
		$this->redirect(array('action' => 'index'));
	}

}
