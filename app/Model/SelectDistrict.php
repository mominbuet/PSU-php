<?php

App::uses('AppModel', 'Model');

/**
 * SelectDistrict Model
 *
 * @property Division $Division
 */
class SelectDistrict extends AppModel {

    public $actsAs = array(
        'Search.Searchable'
    );
    public $filterArgs = array(
        'district_name' => array(
            'type' => 'like',
            'field' => 'district_name'
        ),
        'district_code' => array(
            'type' => 'value',
            'field' => 'district_code'
        ),
        'division_id' => array(
            'type' => 'value',
            'field' => 'division_id'
        )
    );

    /**
     * Primary key field
     *
     * @var string
     */
    public $primaryKey = 'district_id';

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'district_name';


    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'SelectDivision' => array(
            'className' => 'SelectDivision',
            'foreignKey' => 'division_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    public $hasMany = array(
        'UsersQuestionData' => array(
            'className' => 'UsersQuestionData',
            'foreignKey' => 'district_id',
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
