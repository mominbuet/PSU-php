<?php
App::uses('AppModel', 'Model');
/**
 * QuestionGroup Model
 *
 * @property Group $Group
 * @property QuestionSet $QuestionSet
 */
class QuestionGroup extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'question_group';

/**
 * Display field
 *
 * @var string
 */
//	public $displayField = 'id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
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
