<?php

App::uses('AppController', 'Controller');

/**
 * SelectDistricts Controller
 *
 * @property SelectDistrict $SelectDistrict
 * @property PaginatorComponent $Paginator
 */
class SelectDistrictsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Search.Prg');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->SelectDistrict->recursive = 0;
        $this->Prg->commonProcess();
        $this->Paginator->settings['conditions'] = $this->SelectDistrict->parseCriteria($this->Prg->parsedParams());
        $this->Paginator->settings['order']=array('district_name'=>'asc'); 
        $this->set('selectDistricts', $this->Paginator->paginate());
        $divisions = $this->SelectDistrict->SelectDivision->find('list');
        $this->set(compact('divisions'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->SelectDistrict->exists($id)) {
            throw new NotFoundException(__('Invalid select district'));
        }
        $options = array('conditions' => array('SelectDistrict.' . $this->SelectDistrict->primaryKey => $id));
        $this->set('selectDistrict', $this->SelectDistrict->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->SelectDistrict->create();
            if ($this->SelectDistrict->save($this->request->data)) {
                $this->Session->setFlash(__('The select district has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The select district could not be saved. Please, try again.'));
            }
        }
        $divisions = $this->SelectDistrict->SelectDivision->find('list');
        $this->set(compact('divisions'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->SelectDistrict->exists($id)) {
            throw new NotFoundException(__('Invalid select district'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->SelectDistrict->save($this->request->data)) {
                $this->Session->setFlash(__('The select district has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The select district could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('SelectDistrict.' . $this->SelectDistrict->primaryKey => $id));
            $this->request->data = $this->SelectDistrict->find('first', $options);
        }
        $divisions = $this->SelectDistrict->SelectDivision->find('list');
        $this->set(compact('divisions'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->SelectDistrict->id = $id;
        if (!$this->SelectDistrict->exists()) {
            throw new NotFoundException(__('Invalid select district'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->SelectDistrict->delete()) {
            $this->Session->setFlash(__('The select district has been deleted.'));
        } else {
            $this->Session->setFlash(__('The select district could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
