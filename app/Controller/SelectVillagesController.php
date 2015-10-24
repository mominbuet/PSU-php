<?php

App::uses('AppController', 'Controller');

/**
 * SelectVillages Controller
 *
 * @property SelectVillage $SelectVillage
 * @property PaginatorComponent $Paginator
 */
class SelectVillagesController extends AppController {

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
        $this->SelectVillage->recursive = 0;
        $this->set('selectVillages', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->SelectVillage->exists($id)) {
            throw new NotFoundException(__('Invalid select village'));
        }
        $options = array('conditions' => array('SelectVillage.' . $this->SelectVillage->primaryKey => $id));
        $this->set('selectVillage', $this->SelectVillage->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->SelectVillage->create();
            if ($this->SelectVillage->save($this->request->data)) {
                $this->Session->setFlash(__('The select village has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The select village could not be saved. Please, try again.'));
            }
        }
        $unions = $this->SelectVillage->SelectUnion->find('list');
        $this->set(compact('unions'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->SelectVillage->exists($id)) {
            throw new NotFoundException(__('Invalid select village'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->SelectVillage->save($this->request->data)) {
                $this->Session->setFlash(__('The select village has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The select village could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('SelectVillage.' . $this->SelectVillage->primaryKey => $id));
            $this->request->data = $this->SelectVillage->find('first', $options);
        }
        $unions = $this->SelectVillage->SelectUnion->find('list');
        $this->set(compact('unions'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->SelectVillage->id = $id;
        if (!$this->SelectVillage->exists()) {
            throw new NotFoundException(__('Invalid select village'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->SelectVillage->delete()) {
            $this->Session->setFlash(__('The select village has been deleted.'));
        } else {
            $this->Session->setFlash(__('The select village could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
