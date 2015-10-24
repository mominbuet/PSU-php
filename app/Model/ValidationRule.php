<?php
App::uses('AppModel', 'Model');
/**
 * ValidationRule Model
 *
 * @property ValidationRule $ParentValidationRule
 * @property QsnType $QsnType
 * @property ValidationRule $ChildValidationRule
 */
class ValidationRule extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'rule_name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ParentValidationRule' => array(
			'className' => 'ValidationRule',
			'foreignKey' => 'parent_id',
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
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ChildValidationRule' => array(
			'className' => 'ValidationRule',
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
