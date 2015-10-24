<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

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
        //optimization can be done witha new function in model
        //need a paginator with count
       
        $this->User->recursive = 1;
        if ($this->Session->read('Auth.User.User.superuser') != 1) {

            $this->Paginator->settings = array(
                'conditions' => array(
                    'User.created_by' => $this->Session->read('Auth.User.User.id')));
            $this->set('users', $this->Paginator->paginate());
        } else {
//            $this->Paginator->settings = array(
//                'limit' => 20,
//                'fields' => array('User.*', 'Device.device_visible_id', 'UserGroup.id'),
//                'order' => array('User.created' => 'desc'),
//                'joins' => array(
//                    array('table' => 'pmtc_user_groups',
//                        'alias' => 'UserGroup',
//                        'type' => 'LEFT',
//                        'conditions' => array('UserGroup.user_id = User.id')
//                    ),
//                ),
//                'recursive' => 0,
//            );
            $this->set('users', $this->Paginator->paginate('User'));
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
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $this->loadModel("Device");
        if ($this->request->is('post')) {
            $this->User->create();
            $this->request->data['User']['created_by'] = $this->Session->read('Auth.User.User.id');
            try {
                if ($this->User->save($this->request->data)) {
                    $this->UserHistory->create();
                $this->UserHistory->save(array('user_id' => $this->Session->read('Auth.User.User.id'),
                    'event_details' => "Added User " . $this->request->header('User-Agent'),
                    'ipaddress' => $this->request->clientIp(),
                    'event_time' => $db->expression('NOW()'),
                    'user_event' => 'Added User ',
                ));
                    $this->Session->setFlash(__('The user has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                }
            } catch (Exception $ex) {
                $this->Session->setFlash(__('Error saving the user, Please change the username.'));
            }
        }
        $devices = $this->Device->find('list');
        $this->set(compact('devices'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'));
                $this->UserHistory->create();
                $this->UserHistory->save(array('user_id' => $this->Session->read('Auth.User.User.id'),
                    'event_details' => "Edited User " . $this->request->header('User-Agent'),
                    'ipaddress' => $this->request->clientIp(),
                    'event_time' => $db->expression('NOW()'),
                    'user_event' => 'Added User',
                ));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $devices = $this->User->Device->find('list', array('conditions' => array('assigned' => '0')));
        $this->set(compact('devices'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('The user has been deleted.'));
        } else {
            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
