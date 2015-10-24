<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsersAPIController extends AppController {

    public $components = array('RequestHandler');

    public function beforeFilter() {

        parent::beforeFilter();
        $this->Auth->allow();
        $this->autoLayout = FALSE;
        $this->autoRender = FALSE;

//        $this->Auth->allow();
    }

    public function register_user() {
        $this->loadModel('User');
        $user = $this->User->save(array(
            'first_name' => $this->request->data['first_name'],
            'last_name' => $this->request->data['last_name'],
            'user_name' => $this->request->data['user'],
            'password' => $this->request->data['pass']
        ));

        $this->response->disableCache();
        if ($user) {
            echo json_encode(array('Status' => 'SUCCESS', 'user_info' => $user));
        } else {
            echo json_encode(array('Status' => 'ERROR', 'message' => 'User cannot be saved'));
        }
    }

    public function login_user() {
        $username = $this->request->data['user'];
        $pass = $this->request->data['pass'];
        $imei = $this->request->data['imei'];
//        $username = "test";
//        $pass = "test123";
        $this->loadModel('User');
        $this->User->recursive = 0;
        $user = $this->User->find('first', array(
            'fields' => array('id', 'first_name', 'Device.id', 'Device.device_imei', 'last_name', 'msisdn', 'device_id'),
            'conditions' => array('user_name' => $username, 'password' => $pass)));
        $this->loadModel("UserHistory");
        $this->UserHistory->create();
        $this->UserHistory->save(array('user_id' => $user['id'],
            'event_details' => "Mobile user login" ,
            'ipaddress' => $this->request->clientIp(),
            'event_time' => $this->UserHistory->getDataSource()->expression('NOW()'),
            'user_event' => 'Mobile user login',
        ));
        $this->response->disableCache();

        if ($user) {
            echo json_encode(array('status' => 'SUCCESS', 'user_info' => $user));
        } else {
            echo json_encode(array('status' => 'ERROR', 'message' => 'User not found'));
        }
    }

}
