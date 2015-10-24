<?php

App::uses('AppModel', 'Model');

/**
 * QuestionSection Model
 *
 * @property Section $Section
 */
class QuestionSection extends AppModel {

    /**
     * Primary key field
     *
     * @var string
     */
    public $primaryKey = 'section_id';

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'section_name';


    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $hasMany = array(
        'Question' => array(
            'className' => 'Question',
            'foreignKey' => 'section_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ), 'SelectMisc' => array(
            'className' => 'SelectMisc',
            'foreignKey' => 'next_section_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
    ));

}
