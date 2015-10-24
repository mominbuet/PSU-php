<?php

App::uses('AppController', 'Controller');

/**
 * Devices Controller
 *
 * @property Device $Device
 * @property PaginatorComponent $Paginator
 * @property AclComponent $Acl
 * @property SessionComponent $Session
 */
class DevicesController extends AppController {

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
        $this->Device->recursive = -1;

        if ($this->Session->read('Auth.User.User.superuser') != 1) {
            $this->Paginator->settings = array('conditions' => array('Device.created_by' => $this->Session->read('Auth.User.User.id')));
            $this->set('devices', $this->Paginator->paginate());
        } else {
            $this->set('devices', $this->Paginator->paginate());
        }
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Device->exists($id)) {
            throw new NotFoundException(__('Invalid device'));
        }
        $options = array('conditions' => array('Device.' . $this->Device->primaryKey => $id));
        $this->set('device', $this->Device->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Device->create();
            $this->request->data['Device']['created_by'] = $this->Session->read('Auth.User.User.id');
            if ($this->Device->save($this->request->data)) {
                $this->UserHistory->create();
                $this->UserHistory->save(array('user_id' => $this->Session->read('Auth.User.User.id'),
                    'event_details' => "Added Device " . $this->request->header('User-Agent'),
                    'ipaddress' => $this->request->clientIp(),
                    'event_time' => $db->expression('NOW()'),
                    'user_event' => 'Added Device ',
                ));
                $this->Session->setFlash(__('The device has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The device could not be saved. Please, try again.'));
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
        if (!$this->Device->exists($id)) {
            throw new NotFoundException(__('Invalid device'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Device->save($this->request->data)) {
                $this->Session->setFlash(__('The device has been saved.'));
                $this->UserHistory->create();
                $this->UserHistory->save(array('user_id' => $this->Session->read('Auth.User.User.id'),
                    'event_details' => "Edited Device " . $this->request->header('User-Agent'),
                    'ipaddress' => $this->request->clientIp(),
                    'event_time' => $db->expression('NOW()'),
                    'user_event' => 'Edited Device ',
                ));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The device could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Device.' . $this->Device->primaryKey => $id));
            $this->request->data = $this->Device->find('first', $options);
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
        $this->Device->id = $id;
        if (!$this->Device->exists()) {
            throw new NotFoundException(__('Invalid device'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Device->delete()) {
            $this->Session->setFlash(__('The device has been deleted.'));
        } else {
            $this->Session->setFlash(__('The device could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
