<?php

App::uses('AppController', 'Controller');

/**
 * SelectUpzillas Controller
 *
 * @property SelectUpzilla $SelectUpzilla
 * @property PaginatorComponent $Paginator
 */
class SelectUpzillasController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Search.Prg');

//    public function find() {
//        $this->Prg->commonProcess();
//        $this->Paginator->settings['conditions'] = $this->Article->parseCriteria($this->Prg->parsedParams());
//        $this->set('articles', $this->Paginator->paginate());
//    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->SelectUpzilla->recursive = 0;
        $this->Prg->commonProcess();
        $this->Paginator->settings['conditions'] = $this->SelectUpzilla->parseCriteria($this->Prg->parsedParams());
        $this->Paginator->settings['order'] = array('upzilla_id' => 'desc');
        $this->set('selectUpzillas', $this->Paginator->paginate());
        $districts = $this->SelectUpzilla->SelectDistrict->find('list');
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
        if (!$this->SelectUpzilla->exists($id)) {
            throw new NotFoundException(__('Invalid select upzilla'));
        }
        $options = array('conditions' => array('SelectUpzilla.' . $this->SelectUpzilla->primaryKey => $id));
        $this->set('selectUpzilla', $this->SelectUpzilla->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->SelectUpzilla->create();
            if ($this->SelectUpzilla->save($this->request->data)) {
                $this->Session->setFlash(__('The select upzilla has been saved.'));
                $this->loadModel('UserHistory');
                $this->UserHistory->create();
                $this->UserHistory->save(array('user_id' => $this->Session->read('Auth.User.User.id'),
                    'event_details' => "Added Upzilla  " . $this->request->header('User-Agent'),
                    'ipaddress' => $this->request->clientIp(),
                    'event_time' => $db->expression('NOW()'),
                    'user_event' => 'Added Upzilla',
                ));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The select upzilla could not be saved. Please, try again.'));
            }
        }
        $districts = $this->SelectUpzilla->SelectDistrict->find('list');
        $this->set(compact('districts'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->SelectUpzilla->exists($id)) {
            throw new NotFoundException(__('Invalid select upzilla'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->SelectUpzilla->save($this->request->data)) {
                $this->Session->setFlash(__('The select upzilla has been saved.'));
                $this->loadModel('UserHistory');
                $this->UserHistory->create();
                $this->UserHistory->save(array('user_id' => $this->Session->read('Auth.User.User.id'),
                    'event_details' => "Edited Upzilla  " . $this->request->header('User-Agent'),
                    'ipaddress' => $this->request->clientIp(),
                    'event_time' => $this->UserHistory->getDataSource()->expression('NOW()'),
                    'user_event' => 'Edited Upzilla',
                ));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The select upzilla could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('SelectUpzilla.' . $this->SelectUpzilla->primaryKey => $id));
            $this->request->data = $this->SelectUpzilla->find('first', $options);
        }
        $districts = $this->SelectUpzilla->SelectDistrict->find('list');
        $this->set(compact('districts'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->SelectUpzilla->id = $id;
        if (!$this->SelectUpzilla->exists()) {
            throw new NotFoundException(__('Invalid select upzilla'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->SelectUpzilla->delete()) {
            $this->Session->setFlash(__('The select upzilla has been deleted.'));
        } else {
            $this->Session->setFlash(__('The select upzilla could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
