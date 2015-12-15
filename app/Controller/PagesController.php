<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array();

//    public $components = array(
//        'RequestHandler'
//    );

    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow();
    }

    /**
     * Displays a view
     *
     * @return void
     * @throws NotFoundException When the view file could not be found
     * 	or MissingViewException in debug mode.
     */
    public function display() {
        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = $title_for_layout = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        if (!empty($path[$count - 1])) {
            $title_for_layout = Inflector::humanize($path[$count - 1]);
        }
        $this->set(compact('page', 'subpage', 'title_for_layout'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingViewException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }

    public function index() {
        $this->loadModel("UsersQuestionData");
        $this->loadModel("QuestionSets");
        $this->loadModel("Users");



        $this->loadModel('QuestionSet');
        $questionSets;
        $userQuestionData = array();
        $joins = array(
            array(
                'table' => 'pmtc_users',
                'alias' => 'User',
                'type' => 'inner',
                'foreignKey' => true,
                'conditions' => array('UsersQuestionData.user_id = User.id')
            ),
            array(
                'table' => 'pmtc_user_groups',
                'alias' => 'UserGroup',
                'type' => 'inner',
                'foreignKey' => true,
                'conditions' => array('UserGroup.user_id = User.id')
            ),
            array(
                'table' => 'pmtc_groups',
                'alias' => 'Group',
                'type' => 'inner',
                'foreignKey' => true,
                'conditions' => array('UserGroup.group_id = Group.id')
            ),
            array(
                'table' => 'pmtc_question_group',
                'alias' => 'QuestionGroup',
                'type' => 'inner',
                'foreignKey' => true,
                'conditions' => array('QuestionGroup.group_id = Group.id')
            ),
            array(
                'table' => "pmtc_question_sets",
                'alias' => 'QuestionSet',
                'type' => 'inner',
                'foreignKey' => true,
                'conditions' => array('QuestionGroup.question_set_id = QuestionSet.id')
            ),
        );
        $joins2 = array(
            array(
                'table' => 'pmtc_question_group',
                'alias' => 'QuestionGroup',
                'type' => 'inner',
                'foreignKey' => true,
                'conditions' => array(' QuestionSets.id=QuestionGroup.question_set_id')
            ),
            array(
                'table' => 'pmtc_groups',
                'alias' => 'Group',
                'type' => 'inner',
                'foreignKey' => true,
                'conditions' => array('QuestionGroup.group_id = Group.id')
            ),
            array(
                'table' => 'pmtc_user_groups',
                'alias' => 'UserGroup',
                'type' => 'inner',
                'foreignKey' => true,
                'conditions' => array('UserGroup.group_id = Group.id')
            ),
            array(
                'table' => 'pmtc_users',
                'alias' => 'User',
                'type' => 'inner',
                'foreignKey' => true,
                'conditions' => array('UserGroup.user_id = User.id')
            ),
        );
        if ($this->Session->read('Auth.User.User.superuser') == '1') {

            $questionSets = $this->QuestionSet->find('list', array(
                'recursive' => -1,
                'conditions' => array('QuestionSet.is_active' => 1,
                    'QuestionSet.is_survey' => 1)));
            $this->set('qsetCount', $this->QuestionSets->find('count', array('recursive' => -1)));
            $this->set('usersCount', $this->Users->find('count', array('recursive' => -1)));
            $userQuestionData = array('data' => $this->UsersQuestionData->find('all', array(
                    'recursive' => -1,
                    'joins' => $joins,
                    'conditions' => array('QuestionSet.is_active' => 1,
                        'QuestionSet.is_survey' => 1),
                    'group' => array('UsersQuestionData.id', 'UsersQuestionData.user_id'),
                    'fields' => array('User.user_name', 'UsersQuestionData.id', 'User.id', 'QuestionSet.id', 'UsersQuestionData.insert_time', 'UsersQuestionData.geo_lat',
                        'UsersQuestionData.geo_lon', 'QuestionSet.qsn_set_name')
            )));
        } else {

            $this->set('usersCount', $this->Users->find('count', array('conditions'=>array('created_by' => $this->Session->read('Auth.User.User.id')), 'recursive' => -1)));
//            debug($this->Users->find('count', array('conditions'=>array( 'created_by' => $this->Session->read('Auth.User.User.id')), 'recursive' => -1)));
            $this->set('qsetCount', $this->QuestionSets->find('count', array('joins' => $joins2,
                        'conditions' => array('QuestionSets.is_survey' => 1,
                            'OR' => array('QuestionSets.owner' => $this->Session->read('Auth.User.User.id'),
                                'User.id' => $this->Session->read('Auth.User.User.id'))),
                        'recursive' => -1)));
            $userQuestionData = array('data' => $this->UsersQuestionData->find('all', array(
                    'recursive' => 0,
                    'conditions' => array('QuestionSet.is_active' => 1, 'User.id' => $this->Session->read('Auth.User.User.id'),
                        'QuestionSet.is_survey' => 1),
                    'fields' => array('User.user_name', 'UsersQuestionData.insert_time', 'UsersQuestionData.geo_lat',
                        'UsersQuestionData.geo_lon', 'QuestionSet.qsn_set_name')
            )));
        }

        $this->set('answerCount', sizeof($userQuestionData['data']));
        $this->set('usersQuestionData', $userQuestionData);
    }

    public function login($logout = null) {
        $this->loadModel('UserHistory');
        if ($logout) {

            $this->UserHistory->create();
            $this->UserHistory->save(array('user_id' => $this->Session->read('Auth.User.User.id'),
                'event_details' => "Logged out " . $this->request->header('User-Agent'),
                'ipaddress' => $this->request->clientIp(),
                'event_time' => $this->UserHistory->getDataSource()->expression('NOW()'),
                'user_event' => 'Logged out user in web browser',
            ));
            return $this->redirect(array("controller" => "Pages",
                        "action" => "login",));
        }
        $this->layout = 'login';
        $this->Session->destroy('Auth');
        $this->loadModel('User');
        if ($this->request->is('post')) {
            //debug($this->request->data['Subscriber']['email']);
            $user = $this->User->find('first', array('fields' =>
                array('User.user_name', 'User.first_name', 'User.last_name', 'User.superuser',
                    'User.password', 'Group.id', 'User.id'),
                'recursive' => -1,
                'joins' => array(
                    array(
                        'table' => 'pmtc_user_groups',
                        'alias' => 'UserGroup',
                        'type' => 'left',
                        'foreignKey' => false,
                        'conditions' => array('UserGroup.user_id = User.id')
                    ),
                    array(
                        'table' => 'pmtc_groups',
                        'alias' => 'Group',
                        'type' => 'left', 'foreignKey' => false,
                        'conditions' => array('UserGroup.group_id = Group.id')
                    )),
                'conditions' => array('user_name' => $this->request->data['user_name']))
            );
            if (!empty($user)) {
                if ($user['User']['password'] == $this->request->data['password']) {
                    $user['User']['password'] = "";
                    if ($this->Auth->login($user)) {
//                        debug($user);
                        //$this->Session->setFlash(__('Right u are'),'default',array('class' => 'alert alert-success'));
                        $db = $this->User->getDataSource();

                        $loginSession['LoginSession']['id'] = $user['User']['id'];
                        $loginSession['LoginSession']['user_name'] = $user['User']['user_name'];
                        $loginSession['LoginSession']['session_id'] = $this->Session->id();
                        $loginSession['LoginSession']['login_time'] = $db->expression('NOW()');
                        $this->Session->write('LoginSession', $loginSession);
//                        $this->loadModel('UserHistory');
                        $this->UserHistory->create();
                        $this->UserHistory->save(array('user_id' => $user['User']['id'],
                            'event_details' => "login from browser " . $this->request->header('User-Agent'),
                            'ipaddress' => $this->request->clientIp(),
                            'event_time' => $db->expression('NOW()'),
                            'user_event' => 'login',
                        ));
                        return $this->redirect($this->Auth->redirect());
                    }
//                    debug("lame");
                    /* else
                      $this->Session->setFlash(__('Your username or password was incorrect here.'),'default',array('class' => 'alert alert-danger')); */
                } else {
                    $this->Session->setFlash(__('Your password does not match.'), 'default', array('class' => 'alert alert-danger'));
                }
            } else
                $this->Session->setFlash(__('Username does not exist or not assigned to any Group. Please notify admin'), 'default', array('class' => 'alert alert-danger'));
        }
    }

}
