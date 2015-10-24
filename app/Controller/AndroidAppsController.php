<?php

App::uses('AppController', 'Controller');

/**
 * AndroidApps Controller
 *
 * @property AndroidApp $AndroidApp
 * @property PaginatorComponent $Paginator
 * @property AclComponent $Acl
 * @property SessionComponent $Session
 */
class AndroidAppsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Acl', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->AndroidApp->recursive = -1;
        $this->set('AndroidApps', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->AndroidApp->exists($id)) {
            throw new NotFoundException(__('Invalid device'));
        }
        $options = array('conditions' => array('AndroidApp.' . $this->AndroidApp->primaryKey => $id));
        $this->set('AndroidApp', $this->AndroidApp->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->AndroidApp->create();
            $this->request->data['AndroidApp']['created_by'] = $this->Session->read('Auth.User.User.id');
            if ($this->AndroidApp->save($this->request->data)) {
                $this->Session->setFlash(__('The version has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The version could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->AndroidApp->exists($id)) {
            throw new NotFoundException(__('Invalid version'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->AndroidApp->save($this->request->data)) {
                $this->Session->setFlash(__('The version has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The version could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('AndroidApp.' . $this->AndroidApp->primaryKey => $id));
            $this->request->data = $this->AndroidApp->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->AndroidApp->id = $id;
        if (!$this->AndroidApp->exists()) {
            throw new NotFoundException(__('Invalid version'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->AndroidApp->delete()) {
            $this->Session->setFlash(__('The device has been deleted.'));
        } else {
            $this->Session->setFlash(__('The device could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
