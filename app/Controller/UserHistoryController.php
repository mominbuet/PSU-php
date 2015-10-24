<?php

App::uses('AppController', 'Controller');

/**
 * UserHistorys Controller
 *
 * @property UserHistory $UserHistory
 * @property PaginatorComponent $Paginator
 * @property AclComponent $Acl
 * @property SessionComponent $Session
 */
class UserHistoryController extends AppController {

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
        $this->UserHistory->recursive = 0;

        if ($this->Session->read('Auth.User.User.superuser') != 1) {
            $this->Paginator->settings = array('conditions' => array('UserHistory.user_id' => $this->Session->read('Auth.User.User.id'),
//                        'User.created_by' => $this->Session->read('Auth.User.User.id')
                    ));
            $this->set('devices', $this->Paginator->paginate());
        } else {
            $this->set('devices', $this->Paginator->paginate());
        }
    }

}
