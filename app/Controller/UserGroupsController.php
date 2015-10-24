<?php

App::uses('AppController', 'Controller');

/**
 * UserGroups Controller
 *
 * @property UserGroup $UserGroup
 * @property PaginatorComponent $Paginator
 */
class UserGroupsController extends AppController {

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
        $this->loadModel('User');
//loaded UserGroup from user
        //dont know why :(
        $fields = array('User.id', 'User.user_name', 'Group.id', 'Group.group_name', 'UserGroup.id');
        $joins = array(array(
                'table' => 'pmtc_user_groups',
                'alias' => 'UserGroup',
                'type' => 'Left',
                'foreignKey' => true,
                'conditions' => array('UserGroup.user_id = User.id')
            ), array(
                'table' => 'pmtc_groups',
                'alias' => 'Group',
                'type' => 'Left',
                'foreignKey' => true,
                'conditions' => array('UserGroup.group_id = Group.id')
            )
        );
        $this->User->recursive = -1;

        if ($this->Session->read('Auth.User.User.superuser') != 1) {
            $this->Paginator->settings = array('fields' => $fields, 'joins' => $joins,
                'conditions' => array('User.created_by' => $this->Session->read('Auth.User.User.id')));
            $userGroups = $this->Paginator->paginate('User');
            $groups = $this->UserGroup->Group->find('list', array('conditions' => array('created_by' => $this->Session->read('Auth.User.User.id'))));
            $this->set(compact('userGroups', 'groups'));
        } else {
            $this->Paginator->settings = array('fields' => $fields, 'joins' => $joins,);
            $userGroups = $this->Paginator->paginate('User');
            $groups = $this->UserGroup->Group->find('list');
            $this->set(compact('userGroups', 'groups'));
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
        if (!$this->UserGroup->exists($id)) {
            throw new NotFoundException(__('Invalid user group'));
        }
        $options = array('conditions' => array('UserGroup.' . $this->UserGroup->primaryKey => $id));
        $this->set('userGroup', $this->UserGroup->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->UserGroup->create();
            $this->request->data['UserGroup']['created_by'] = $this->Session->read('Auth.User.User.id');
            if ($this->UserGroup->save($this->request->data)) {
                $this->Session->setFlash(__('The user group has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user group could not be saved. Please, try again.'));
            }
        }
        $users = $this->UserGroup->User->find('list');
        $groups = $this->UserGroup->Group->find('list');
        $this->set(compact('users', 'groups'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->UserGroup->exists($id)) {
            throw new NotFoundException(__('Invalid user group'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->UserGroup->save($this->request->data)) {
                $this->Session->setFlash(__('The user group has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user group could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('UserGroup.' . $this->UserGroup->primaryKey => $id));
            $this->request->data = $this->UserGroup->find('first', $options);
        }
        $users = $this->UserGroup->User->find('list');
        $groups = $this->UserGroup->Group->find('list');
        $this->set(compact('users', 'groups'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->UserGroup->id = $id;
        if (!$this->UserGroup->exists()) {
            throw new NotFoundException(__('Invalid user group'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->UserGroup->delete()) {
            $this->Session->setFlash(__('The user group has been deleted.'));
        } else {
            $this->Session->setFlash(__('The user group could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function mergeGroups($group_name = null, $group_ids = null) {
        $this->response->disableCache();
        $this->autoLayout = FALSE;
        $this->autoRender = FALSE;
        if ($group_name != null || $group_ids != null) {
            $this->loadModel('Group');
            $this->Group->create();
            $this->Group->set(array(
                'group_name' => $group_name,
                'is_active' => 1,
                'created_by' => $this->Session->read('Auth.User.User.id')
            ));
            if ($this->Group->save()) {
                $group_ids = explode(",", $group_ids);
                foreach ($group_ids as $group_id) {
                    if ($group_id != "") {
                        $users = $this->UserGroup->find('all', array('fields' => array(' user_id'), 'conditions' => array('group_id' => $group_id)));
                        //debug($users);
                        foreach ($users as $value) {
                            $this->UserGroup->create();
                            $this->UserGroup->set(array(
                                'user_id' => $value['UserGroup']['user_id'],
                                'group_id' => $this->Group->id,
                                'created_by' => $this->Session->read('Auth.User.User.id')
                            ));
                            $this->UserGroup->save();
                        }
//                        
                    }
                }
                echo 'Groups merged';
            }
        }
    }

    public function assignUser($group_id = null, $user_ids = null) {
        //$this->Auth->allow();
        //print_r(explode(",", $user_ids));
        $this->response->disableCache();
        $this->autoLayout = FALSE;
        $this->autoRender = FALSE;
        $res = true;
        if ($group_id != null || $user_ids != null) {
            $this->UserGroup->recursive = -1;
            $userids = explode(",", $user_ids);
            //print_r($userids);
            foreach ($userids as $userid) {
                if ($userid != "") {

//                    $prev = $this->UserGroup->find('first', array(
//                        'conditions' => array('UserGroup.user_id' => $userid,
//                            'UserGroup.group_id' => $group_id)));
//                    debug($prev);
//                    if (sizeof($prev) != 0) {
                    //$this->UserGroup->read(null, $prev["UserGroup"]["id"]);
//                        $this->UserGroup->set(array(
//                            'id' => $prev["UserGroup"]["id"],
//                            'user_id' => $userid,
//                            'group_id' => $group_id
//                        ));
//                        
//                    } else {
                    if (sizeof($this->UserGroup->find('first', array('conditions' => array('user_id' => $userid,
                                            'group_id' => $group_id)))) == 0) {
                        $this->UserGroup->create();
                        $this->UserGroup->set(array(
                            'user_id' => $userid,
                            'group_id' => $group_id,
                            'created_by' => $this->Session->read('Auth.User.User.id')
                        ));
//                    }


                        if (!$this->UserGroup->save()) {
                            $res = false;
                            echo $userid . '_' . $group_id;
                            break;
                        }
                    }
                }
            }
            if (!$res)
                echo 'The user group could not be saved. Please, try again.';
            else
                echo 'The user group is saved.';
        }
    }

}
