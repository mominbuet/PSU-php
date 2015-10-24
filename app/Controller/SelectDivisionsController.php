<?php

App::uses('AppController', 'Controller');

/**
 * SelectDivisions Controller
 *
 * @property SelectDivision $SelectDivision
 * @property PaginatorComponent $Paginator
 */
class SelectDivisionsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->SelectDivision->recursive = 0;
        $this->set('selectDivisions', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->SelectDivision->exists($id)) {
            throw new NotFoundException(__('Invalid select division'));
        }
        $options = array('conditions' => array('SelectDivision.' . $this->SelectDivision->primaryKey => $id));
        $this->set('selectDivision', $this->SelectDivision->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->SelectDivision->create();
            if ($this->SelectDivision->save($this->request->data)) {
                $this->Session->setFlash(__('The select division has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The select division could not be saved. Please, try again.'));
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
        if (!$this->SelectDivision->exists($id)) {
            throw new NotFoundException(__('Invalid select division'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->SelectDivision->save($this->request->data)) {
                $this->Session->setFlash(__('The select division has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The select division could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('SelectDivision.' . $this->SelectDivision->primaryKey => $id));
            $this->request->data = $this->SelectDivision->find('first', $options);
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
        $this->SelectDivision->id = $id;
        if (!$this->SelectDivision->exists()) {
            throw new NotFoundException(__('Invalid select division'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->SelectDivision->delete()) {
            $this->Session->setFlash(__('The select division has been deleted.'));
        } else {
            $this->Session->setFlash(__('The select division could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
