<?php

App::uses('AppModel', 'Model');

/**
 * QuestionAnswer Model
 *
 * @property UserQsnData $UserQsnData
 * @property Question $Question
 */
class QuestionAnswer extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'user_qsn_data_id';
    var $actsAs = array(
        'FileModel' => array(
            'file_field' => array('image'),
            'file_db_file' => array('qsn_answer'),
            'custom_dir' => array('image'),
            'use_model_name' => true
        )
    );
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'UsersQuestionData' => array(
            'className' => 'UsersQuestionData',
            'foreignKey' => 'user_qsn_data_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Question' => array(
            'className' => 'Question',
            'foreignKey' => 'question_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
