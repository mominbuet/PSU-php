<?php

App::uses('AppModel', 'Model');

/**
 * Question Model
 *
 * @property QsnSet $QsnSet
 * @property QsnType $QsnType
 * @property ValidityRule $ValidityRule
 * @property SelectMisc $SelectMisc
 */
class Question extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
    public $displayField = "qsn_desc";
    public $validate = array(
        'qsu_order' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'QuestionSet' => array(
            'className' => 'QuestionSet',
            'foreignKey' => 'qsn_set_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'QuestionType' => array(
            'className' => 'QuestionType',
            'foreignKey' => 'qsn_type_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'ValidationRule' => array(
            'className' => 'ValidationRule',
            'foreignKey' => 'validity_rule_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ), 'QuestionSection' => array(
            'className' => 'QuestionSection',
            'foreignKey' => 'section_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'SelectMisc' => array(
            'className' => 'SelectMisc',
            'foreignKey' => 'question_id',
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
