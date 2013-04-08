<?php

App::uses('AppController', 'Controller');

/**
 * Posts Controller
 *
 * @property Post $Post
 */
class PostsController extends AppController {

    /**
     *  Layout
     *
     * @var string
     */
    public $layout = 'bootstrap';

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

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Post->recursive = 0;
        $this->set('posts', $this->paginate());
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Post->id = $id;
        if (!$this->Post->exists()) {
            throw new NotFoundException(__('Invalid %s', __('post')));
        }
        $this->set('post', $this->Post->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Post->create();
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(
                        __('The %s has been saved', __('post')), 'alert', array(
                    'plugin' => 'TwitterBootstrap',
                    'class' => 'alert-success'
                        )
                );
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(
                        __('The %s could not be saved. Please, try again.', __('post')), 'alert', array(
                    'plugin' => 'TwitterBootstrap',
                    'class' => 'alert-error'
                        )
                );
            }
        }
        $users = $this->Post->User->find('list');
        $this->set(compact('users'));
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Post->id = $id;
        if (!$this->Post->exists()) {
            throw new NotFoundException(__('Invalid %s', __('post')));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(
                        __('The %s has been saved', __('post')), 'alert', array(
                    'plugin' => 'TwitterBootstrap',
                    'class' => 'alert-success'
                        )
                );
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(
                        __('The %s could not be saved. Please, try again.', __('post')), 'alert', array(
                    'plugin' => 'TwitterBootstrap',
                    'class' => 'alert-error'
                        )
                );
            }
        } else {
            $this->request->data = $this->Post->read(null, $id);
        }
        $users = $this->Post->User->find('list');
        $this->set(compact('users'));
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
        $this->Post->id = $id;
        if (!$this->Post->exists()) {
            throw new NotFoundException(__('Invalid %s', __('post')));
        }
        if ($this->Post->delete()) {
            $this->Session->setFlash(
                    __('The %s deleted', __('post')), 'alert', array(
                'plugin' => 'TwitterBootstrap',
                'class' => 'alert-success'
                    )
            );
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(
                __('The %s was not deleted', __('post')), 'alert', array(
            'plugin' => 'TwitterBootstrap',
            'class' => 'alert-error'
                )
        );
        $this->redirect(array('action' => 'index'));
    }

}
