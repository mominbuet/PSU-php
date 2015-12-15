<?php

App::uses('AppModel', 'Model');

/**
 * User Model
 *
 * @property Device $Device
 * @property UserGroup $UserGroup
 */
class User extends AppModel {

    //The Associations below have been created with all possible keys, those that are not needed can be removed
    public $displayField = "user_name";
//    public $name = 'Users ';
    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Device' => array(
            'className' => 'Device',
            'foreignKey' => 'device_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
//        'CreatedBy' => array(
//            'className' => 'User',
//            'foreignKey' => 'created_by',
//            'conditions' => '',
//            'fields' => '',
//            'order' => ''
//        ),
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'UserGroup' => array(
            'className' => 'UserGroup',
            'foreignKey' => 'user_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'UsersQuestionData' => array(
            'className' => 'UsersQuestionData',
            'foreignKey' => 'user_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

}
