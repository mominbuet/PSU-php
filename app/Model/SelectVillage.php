<?php
App::uses('AppModel', 'Model');
/**
 * SelectVillage Model
 *
 * @property Union $Union
 */
class SelectVillage extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'village_code';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'village_name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'SelectUnion' => array(
			'className' => 'SelectUnion',
			'foreignKey' => 'union_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
        public $hasMany = array(
        'UsersQuestionData' => array(
            'className' => 'UsersQuestionData',
            'foreignKey' => 'village_id',
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
