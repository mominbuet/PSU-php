<?php

App::uses('AppModel', 'Model');

/**
 * SelectUnion Model
 *
 * @property Upzilla $Upzilla
 */
class SelectUnion extends AppModel {

    public $actsAs = array(
        'Search.Searchable'
    );
    public $filterArgs = array(
        'union_name' => array(
            'type' => 'like',
            'field' => 'union_name'
        ),
        'union_code' => array(
            'type' => 'value',
            'field' => 'union_code'
        ),
        'upzilla_id' => array(
            'type' => 'value',
            'field' => 'upzilla_id'
        ),
        'district_id' => array(
            'type' => 'value',
            'field' => 'SelectUpzilla.district_id'
        )
    );

    /**
     * Use table
     *
     * @var mixed False or table name
     */
    public $useTable = 'select_union';

    /**
     * Primary key field
     *
     * @var string
     */
    public $primaryKey = 'union_id';

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'union_name';


    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'SelectUpzilla' => array(
            'className' => 'SelectUpzilla',
            'foreignKey' => 'upzilla_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    public $hasMany = array(
        'UsersQuestionData' => array(
            'className' => 'UsersQuestionData',
            'foreignKey' => 'union_id',
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
