<?php
App::uses('AppModel', 'Model');
/**
 * UserGroup Model
 *
 * @property User $User
 * @property Group $Group
 */
class UserGroup extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

    public $actsAs = array(
        'Search.Searchable'
    );
    public $filterArgs = array(
        'user_id' => array(
            'type' => 'value',
            'field' => 'user_id'
        ),
        'group_id' => array(
            'type' => 'value',
            'field' => 'group_id'
        )
    );
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
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
