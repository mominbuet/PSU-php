<?php

App::uses('AppModel', 'Model');

/**
 * SelectLandType Model
 *
 */
class SelectLandType extends AppModel {

    /**
     * Primary key field
     *
     * @var string
     */
    public $primaryKey = 'land_use_id';

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'land_use_name';
    public $hasMany = array(
        'UsersQuestionData' => array(
            'className' => 'UsersQuestionData',
            'foreignKey' => 'land_use_type_id',
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
