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
//        $this->Prg->commonProcess();
        $users;
        $this->loadModel('User');
        $date = array_key_exists('time', $this->request->query) ? $this->request->query['time'] : NULL;
        $user_name = array_key_exists('user_name', $this->request->query) ? $this->request->query['user_name'] : NULL;
        $conditions = array();
        if ($date) {
            $conditions = array_merge(array("DATE_FORMAT(UserHistory.event_time,'%Y-%m-%d')  " => $date), $conditions);
            $this->set("set_time", $date);
        } else
            $this->set("set_time", "");
        if ($user_name) {
            $conditions = array_merge(array('UserHistory.user_id ' => $user_name), $conditions);
            $this->set("set_user_name", $user_name);
        } else
            $this->set("set_user_name", "");

        if ($this->Session->read('Auth.User.User.superuser') != 1) {
            $conditions = array_merge(array('UserHistory.user_id' => $this->Session->read('Auth.User.User.id'),
//                        'User.created_by' => $this->Session->read('Auth.User.User.id')
                    ), $conditions);
            $users = $this->User->find('list', array('conditions' => array('created_by' => $this->Session->read('Auth.User.User.id'))));
        } else {
            $users = $this->User->find('list');
        }
        $this->Paginator->settings['conditions'] = $conditions;
        $this->set('devices', $this->Paginator->paginate());
        $this->set('users', $users);
    }

}
