<?php

App::uses('AppModel', 'Model');

/**
 * QuestionSet Model
 *
 * @property QuestionSet $ParentQuestionSet
 * @property QuestionGroup $QuestionGroup
 * @property QuestionSet $ChildQuestionSet
 */
class QuestionSet extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'qsn_set_name';


    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
//    public $belongsTo = array(
//        'QuestionSet' => array(
//            'className' => 'QuestionSet',
//            'foreignKey' => 'parent_id',
//            'conditions' => '',
//            'fields' => '',
//            'order' => ''
//        )
//    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Question' => array(
            'className' => 'Question',
            'foreignKey' => 'qsn_set_id',
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
            'foreignKey' => 'qsn_set_master_id',
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
        'QuestionGroup' => array(
            'className' => 'QuestionGroup',
            'foreignKey' => 'question_set_id',
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
        'ChildQuestionSet' => array(
            'className' => 'QuestionSet',
            'foreignKey' => 'parent_id',
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
