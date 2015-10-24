<?php

App::uses('AppModel', 'Model');

/**
 * SelectWaterPointType Model
 *
 */
class SelectWaterPointType extends AppModel {

    /**
     * Primary key field
     *
     * @var string
     */
    public $primaryKey = 'water_point_type_id';

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'water_point_type_name';
    public $hasMany = array(
        'UsersQuestionData' => array(
            'className' => 'UsersQuestionData',
            'foreignKey' => 'water_point_type_id',
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
