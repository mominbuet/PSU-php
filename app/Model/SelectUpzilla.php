<?php

App::uses('AppModel', 'Model');

/**
 * SelectUpzilla Model
 *
 * @property District $District
 */
class SelectUpzilla extends AppModel {

    
    public $actsAs = array(
        'Search.Searchable'
    );

    public $filterArgs = array(
        'upzilla_name' => array(
            'type' => 'like',
            'field' => 'upzilla_name'
        ),
        'upzilla_code' => array(
            'type' => 'value',
            'field' => 'upzilla_code'
        ),
        'district_id' => array(
            'type' => 'value',
            'field' => 'district_id'
        )
    );
    
    /**
     * Use table
     *
     * @var mixed False or table name
     */
    public $useTable = 'select_upzilla';

    /**
     * Primary key field
     *
     * @var string
     */
    public $primaryKey = 'upzilla_id';

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'upzilla_name';


    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'SelectDistrict' => array(
            'className' => 'SelectDistrict',
            'foreignKey' => 'district_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    public $hasMany = array(
        'UsersQuestionData' => array(
            'className' => 'UsersQuestionData',
            'foreignKey' => 'upzilla_id',
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