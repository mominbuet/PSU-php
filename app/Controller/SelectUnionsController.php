<?php

App::uses('AppController', 'Controller');

/**
 * SelectUnions Controller
 *
 * @property SelectUnion $SelectUnion
 * @property PaginatorComponent $Paginator
 */
class SelectUnionsController extends AppController {

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
        $this->SelectUnion->recursive = 0;
        $this->Prg->commonProcess();
        $this->Paginator->settings['order'] = array('union_name' => 'asc');
        $this->Paginator->settings['fields'] = array('SelectUnion.union_name', 'SelectDistrict.district_id', 'SelectUpzilla.upzilla_name',
            'SelectDistrict.district_name', 'SelectUnion.union_id', 'SelectUnion.union_code', 'SelectUpzilla.upzilla_id');
        $this->Paginator->settings['joins'] = array(
            array(
                'table' => "pmtc_select_districts",
                'alias' => 'SelectDistrict',
                'type' => 'inner',
                'foreignKey' => true,
                'conditions' => array('SelectUpzilla.district_id = SelectDistrict.district_id')
            ),);

        $this->Paginator->settings['conditions'] = $this->SelectUnion->parseCriteria($this->Prg->parsedParams());
        $this->set('selectUnions', $this->Paginator->paginate());
        $upzillas = $this->SelectUnion->SelectUpzilla->find('list');
        $districts = $this->SelectUnion->SelectUpzilla->SelectDistrict->find('list');
        $this->set(compact('upzillas'));
        $this->set(compact('districts'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->SelectUnion->exists($id)) {
            throw new NotFoundException(__('Invalid select union'));
        }
        $options = array('conditions' => array('SelectUnion.' . $this->SelectUnion->primaryKey => $id));
        $this->set('selectUnion', $this->SelectUnion->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->SelectUnion->create();
            if ($this->SelectUnion->save($this->request->data)) {
                $this->Session->setFlash(__('The select union has been saved.'));
                $this->loadModel('UserHistory');
                $this->UserHistory->create();
                $this->UserHistory->save(array('user_id' => $this->Session->read('Auth.User.User.id'),
                    'event_details' => "Added Union  " . $this->request->header('User-Agent'),
                    'ipaddress' => $this->request->clientIp(),
                    'event_time' => $this->UserHistory->getDataSource()->expression('NOW()'),
                    'user_event' => 'Added Union',
                ));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The select union could not be saved. Please, try again.'));
            }
        }
        $upzillas = $this->SelectUnion->SelectUpzilla->find('list');
        $this->set(compact('upzillas'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->SelectUnion->exists($id)) {
            throw new NotFoundException(__('Invalid select union'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->SelectUnion->save($this->request->data)) {
                $this->Session->setFlash(__('The select union has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The select union could not be saved. Please, try again.'));
            }
            $this->loadModel('UserHistory');
            $this->UserHistory->create();
            $this->UserHistory->save(array('user_id' => $this->Session->read('Auth.User.User.id'),
                'event_details' => "Edited Union  " . $this->request->header('User-Agent'),
                'ipaddress' => $this->request->clientIp(),
                'event_time' => $this->UserHistory->getDataSource()->expression('NOW()'),
                'user_event' => 'Edit Union',
            ));
        } else {
            $options = array('conditions' => array('SelectUnion.' . $this->SelectUnion->primaryKey => $id));
            $this->request->data = $this->SelectUnion->find('first', $options);
        }
        $upzillas = $this->SelectUnion->SelectUpzilla->find('list');
        $this->set(compact('upzillas'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->SelectUnion->id = $id;
        if (!$this->SelectUnion->exists()) {
            throw new NotFoundException(__('Invalid select union'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->SelectUnion->delete()) {
            $this->Session->setFlash(__('The select union has been deleted.'));
        } else {
            $this->Session->setFlash(__('The select union could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
