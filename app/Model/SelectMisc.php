<?php

App::uses('AppModel', 'Model');

/**
 * SelectMisc Model
 *
 * @property Question $Question
 */
class SelectMisc extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
    public $useTable = 'select_misc';

    /**
     * Primary key field
     *
     * @var string
     */
    public $primaryKey = 'misc_id';

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'misc_option';


    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Question' => array(
            'className' => 'Question',
            'foreignKey' => 'question_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'QuestionSection' => array(
            'className' => 'QuestionSection',
            'foreignKey' => 'next_question_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
