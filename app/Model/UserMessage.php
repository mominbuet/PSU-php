<?php

App::uses('AppModel', 'Model');

/**
 * UserMessage Model
 *
 * @property User $User
 * @property QuestionSet $QuestionSet
 */
class UserMessage extends AppModel {

//    public $userTable = 'pmtc_user_messages';

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'message_text';


    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'QuestionSet' => array(
            'className' => 'QuestionSet',
            'foreignKey' => 'question_set_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
