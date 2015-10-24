<?php

App::uses('AppModel', 'Model');

/**
 * SelectDivision Model
 *
 */
class SelectDivision extends AppModel {

    /**
     * Primary key field
     *
     * @var string
     */
    public $primaryKey = 'division_id';

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'division_name';
//    public $hasMany = array(
//        'UsersQuestionData' => array(
//            'className' => 'UsersQuestionData',
//            'foreignKey' => 'division_id',
//            'dependent' => false,
//            'conditions' => '',
//            'fields' => '',
//            'order' => '',
//            'limit' => '',
//            'offset' => '',
//            'exclusive' => '',
//            'finderQuery' => '',
//            'counterQuery' => ''
//        )
//    );

}
