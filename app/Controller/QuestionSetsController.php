<?php

App::uses('AppController', 'Controller');

/**
 * QuestionSets Controller
 *
 * @property QuestionSet $QuestionSet
 * @property PaginatorComponent $Paginator
 */
class QuestionSetsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->QuestionSet->recursive = 0;
        $this->loadModel("QuestionGroup");
        $allData;
//        debug($this->Session->read('Auth.User.User.superuser'));
        if ($this->Session->read('Auth.User.User.superuser') != '1') {
            $allData = $this->QuestionSet->find("all", array('order' => array('QuestionSet.is_survey'),
                'joins' => array(
                    array(
                        'table' => 'pmtc_question_group',
                        'alias' => 'QuestionGroup',
                        'type' => 'inner',
                        'foreignKey' => false,
                        'conditions' => array('QuestionGroup.question_set_id = QuestionSet.id')
                    ),
                    array(
                        'table' => 'pmtc_groups',
                        'alias' => 'Group',
                        'type' => 'inner',
                        'foreignKey' => false,
                        'conditions' => array('QuestionGroup.group_id = Group.id')
                    ),
                    array(
                        'table' => 'pmtc_user_groups',
                        'alias' => 'UserGroup',
                        'type' => 'inner',
                        'foreignKey' => false,
                        'conditions' => array('UserGroup.group_id = Group.id')
                    ),
                    array(
                        'table' => 'pmtc_users',
                        'alias' => 'User',
                        'type' => 'inner',
                        'foreignKey' => false,
                        'conditions' => array('UserGroup.user_id = User.id')
                    )
                ),
                'order' => array('parent_id', 'is_survey'),
                'conditions' => array('User.id' => $this->Session->read('Auth.User.User.id'),
                    'QuestionSet.is_active' => 1),
                'fields' => array('DISTINCT QuestionSet.id', 'is_survey', 'QuestionSet.qsn_set_name', 'QuestionSet.parent_id')));
        } else {
            $allData = $this->QuestionSet->find("all", array('order' => array('parent_id', 'is_survey'),
                'conditions' => array('QuestionSet.is_active' => 1),
                'fields' => array('DISTINCT QuestionSet.id', 'is_survey', 'QuestionSet.qsn_set_name', 'QuestionSet.parent_id')));
        }
//        debug($allData);
        $treeData = array();
//        $treeData[] = array("id" => "0",
//                "parent" => "#",
//                "text" => "Root",
//                "icon" =>  "fa fa-folder" ,
//                "is_survey"=>"0"
//            );
        foreach ($allData as $data) {
//            debug($data['QuestionSet']['qsn_set_name']);
            $treeData[] = array("id" => $data['QuestionSet']['id'],
                "parent" => ($data['QuestionSet']['parent_id'] == NULL) ? "#" : $data['QuestionSet']['parent_id'],
                "text" => $data['QuestionSet']['qsn_set_name'],
                "icon" => ($data['QuestionSet']['is_survey'] == 0) ? "fa fa-folder fa-fw" : "fa fa-file fa-fw",
                "is_survey" => ($data['QuestionSet']['is_survey'] == 0) ? "0" : "1"
            );
        }
//        debug();
        $this->set('treeJson', json_encode($treeData));
        $this->set('questionSets', $this->Paginator->paginate());
        $groups = $this->QuestionGroup->Group->find('list');
        $this->set('group_id', $groups);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->QuestionSet->exists($id)) {
            throw new NotFoundException(__('Invalid question set'));
        }
        $options = array('conditions' => array('QuestionSet.' . $this->QuestionSet->primaryKey => $id));
        $this->set('questionSet', $this->QuestionSet->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($type = null, $parentId = null) {
        if ($this->request->is('post')) {
            $this->QuestionSet->create();
            $this->QuestionSet->set('owner', $this->Session->read('Auth.User.User.id'));
            if ($this->QuestionSet->save($this->request->data)) {
                $this->loadModel('QuestionGroup');
                $this->loadModel('UserGroup');
                $this->QuestionGroup->create();
//                debug($this->QuestionSet->getInsertID());
//                debug($this->UserGroup->find('first',array('conditions')));
                if ($this->QuestionGroup->save(array('is_active' => 1,
                            'question_set_id' => $this->QuestionSet->getInsertID(),
                            'group_id' => $this->Session->read('Auth.User.Group.id')))) {
                    $this->loadModel('Question');

//                    debug($this->request->data['master_id']) ; 
                    $questions_previous = $this->Question->find("all", array('recursive' => -1,
                        'conditions' => array('qsn_set_id' => $this->request->data['master_id'])));
//                    debug($questions_previous);
                    foreach ($questions_previous as $key => $value) {
                        $this->Question->create();
                        $this->Question->save(array('qsn_set_id' => $this->QuestionSet->id,
                            'qsn_desc' => $value['Question']['qsn_desc'],
                            'qsn_type_id' => $value['Question']['qsn_type_id'],
                            'is_ans_required' => $value['Question']['is_ans_required'],
                            'validity_rule_id' => $value['Question']['validity_rule_id'],
                            'qsu_order' => $value['Question']['qsu_order'],
                            'qsn_help' => $value['Question']['qsn_help'],
                            'validation_text' => $value['Question']['validation_text'],
                            'validation_error_text' => $value['Question']['validation_error_text'],
                            'section_id' => $value['Question']['section_id'],
                            'section_name' => $value['Question']['section_name'],
                            'answer_length' => $value['Question']['answer_length']));
                    }


                    $this->loadModel('UserHistory');
                    $this->UserHistory->create();
                    $this->UserHistory->save(array('user_id' => $this->Session->read('Auth.User.User.id'),
                        'event_details' => "Added Question Set " . $this->request->header('User-Agent'),
                        'ipaddress' => $this->request->clientIp(),
                        'event_time' => $this->UserHistory->getDataSource()->expression('NOW()'),
                        'user_event' => 'Added Question Set',
                    ));
                    $this->Session->setFlash(__('The question set has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The privileges could not be saved. Contact Admin to assign the survey.'));
                }
            } else {
                $this->Session->setFlash(__('The question set could not be saved. Please, try again.'));
            }
        }
        $this->QuestionSet->recursive = -1;
        $this->set('is_survey', $type);
        $this->set('master_id', $this->QuestionSet->find('list', array('fields' => 'QuestionSet.id,QuestionSet.qsn_set_name',
                    'conditions' => array('QuestionSet.is_survey=1'))));
        $this->set('parentID', $this->QuestionSet->find('first', array('fields' => 'QuestionSet.qsn_set_name,QuestionSet.id', 'conditions' => array('QuestionSet.' . $this->QuestionSet->primaryKey => $parentId))));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->QuestionSet->exists($id)) {
            throw new NotFoundException(__('Invalid question set'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->QuestionSet->save($this->request->data)) {
                $this->loadModel('UserHistory');
                $this->UserHistory->create();
                $this->UserHistory->save(array('user_id' => $this->Session->read('Auth.User.User.id'),
                    'event_details' => "Edited Question Set " . $this->request->header('User-Agent'),
                    'ipaddress' => $this->request->clientIp(),
                    'event_time' => $this->UserHistory->getDataSource()->expression('NOW()'),
                    'user_event' => 'Edited Question Set',
                ));
                $this->Session->setFlash(__('The question set has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The question set could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('QuestionSet.' . $this->QuestionSet->primaryKey => $id));

            $this->request->data = $this->QuestionSet->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->QuestionSet->id = $id;
        if (!$this->QuestionSet->exists()) {
            throw new NotFoundException(__('Invalid question set'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->QuestionSet->delete()) {
            if ($this->QuestionSet->deleteAll(array('QuestionSet.parent_id' => $id), false))
                $this->Session->setFlash(__('The question set has been deleted.'));
            else {
                $this->Session->setFlash(__('The question set\'s childs could not be deleted. Please, try again.'));
            }
        } else {
            $this->Session->setFlash(__('The question set could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
