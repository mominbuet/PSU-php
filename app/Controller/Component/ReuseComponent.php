<?php

App::uses('Component', 'Controller');

class ReuseComponent extends Component {

    public function getUsers($survey_id = null) {
        $User = ClassRegistry::init('User');
//        $this->loadModel("User");
        return  $User->find('list', array(
            'conditions' => array('QuestionSet.id' => $survey_id),
            'joins' => array(
                array(
                    'table' => 'pmtc_user_groups',
                    'alias' => 'UserGroup',
                    'type' => 'inner',
                    'foreignKey' => true,
                    'conditions' => array('UserGroup.user_id = User.id')
                ), array(
                    'table' => 'pmtc_groups',
                    'alias' => 'Group',
                    'type' => 'inner',
                    'foreignKey' => true,
                    'conditions' => array('UserGroup.group_id = Group.id')
                ), array(
                    'table' => 'pmtc_question_group',
                    'alias' => 'QuestionGroup',
                    'type' => 'inner',
                    'foreignKey' => true,
                    'conditions' => array('QuestionGroup.group_id = Group.id')
                ),
                array(
                    'table' => 'pmtc_question_sets',
                    'alias' => 'QuestionSet',
                    'type' => 'inner',
                    'foreignKey' => true,
                    'conditions' => array('QuestionGroup.question_set_id = QuestionSet.id')
                )
        )));
    }

}
