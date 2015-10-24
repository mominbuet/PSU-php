<?php

App::uses('AppModel', 'Model');

/**
 * SelectOwnership Model
 *
 */
class SelectOwnership extends AppModel {

    /**
     * Primary key field
     *
     * @var string
     */
    public $primaryKey = 'ownership_id';

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'ownership_name';
    public $hasMany = array(
        'UsersQuestionData' => array(
            'className' => 'UsersQuestionData',
            'foreignKey' => 'owner_type_id',
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
