<?php

App::uses('AppController', 'Controller');

/**
 * QuestionGroups Controller
 *
 * @property QuestionGroup $QuestionGroup
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class QuestionGroupsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session', 'Search.Prg');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->QuestionGroup->recursive = 0;
        $this->Prg->commonProcess();
        if ($this->Session->read('Auth.User.User.superuser') != 1) {
            $this->Paginator->settings = array(
                'order' => array('QuestionSet.is_survey' => "desc")
                , 'conditions' => array('QuestionGroup.created_by' => $this->Session->read('Auth.User.User.id')));
            $this->Paginator->settings['conditions'] = array_merge($this->Paginator->settings['conditions'], $this->QuestionGroup->parseCriteria($this->Prg->parsedParams()));
            $this->set('groups', $this->QuestionGroup->Group->find('list', array('conditions' => array('Group.created_by' => $this->Session->read('Auth.User.User.id')))));
            $this->loadModel("QuestionSet");
            $questionSets = $this->QuestionSet->find('list', array(
                'recursive' => -1,
                'joins' => array(
                    array(
                        'table' => 'pmtc_question_group',
                        'alias' => 'QuestionGroup',
                        'type' => 'inner',
                        'foreignKey' => true,
                        'conditions' => array('QuestionGroup.question_set_id = QuestionSet.id')
                    ), array(
                        'table' => 'pmtc_user_groups',
                        'alias' => 'UserGroup',
                        'type' => 'inner',
                        'foreignKey' => true,
                        'conditions' => array('UserGroup.group_id = QuestionGroup.group_id')
                    ),
                    array(
                        'table' => 'pmtc_users',
                        'alias' => 'User',
                        'type' => 'inner',
                        'foreignKey' => true,
                        'conditions' => array('User.id = UserGroup.user_id')
                    ),
                ),
                'conditions' => array('User.id' => $this->Session->read('Auth.User.User.id'),
                    'QuestionSet.is_active' => 1,
                    'QuestionSet.is_survey' => 1)));
            $this->set('questionSets', $questionSets);
        } else {
            $this->Paginator->settings["order"] = array('QuestionSet.is_survey' => "desc");
            $this->Paginator->settings['conditions'] = $this->QuestionGroup->parseCriteria($this->Prg->parsedParams());
            $this->set('questionSets', $this->QuestionGroup->QuestionSet->find('list'));
        }
//        $this->Paginator->settings['conditions'] = array_merge($this->Paginator->settings['conditions'], $this->QuestionGroup->parseCriteria($this->Prg->parsedParams()));
//        debug($this->QuestionGroup->Group->find('list'));



        $this->set('questionGroups', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->QuestionGroup->exists($id)) {
            throw new NotFoundException(__('Invalid question group'));
        }
        $options = array('conditions' => array('QuestionGroup.' . $this->QuestionGroup->primaryKey => $id));
        $this->set('questionGroup', $this->QuestionGroup->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->QuestionGroup->create();

            if (sizeof($this->QuestionGroup->find('list', array('conditions' => array(
                                    'group_id' => $this->request->data["QuestionGroup"]["group_id"],
                                    'question_set_id' => $this->request->data["QuestionGroup"]["question_set_id"]
                )))) == 0) {
                $this->QuestionGroup->set('created_by', $this->Session->read('Auth.User.User.id'));
                if ($this->QuestionGroup->save($this->request->data)) {
                    $this->Session->setFlash(__('The question group has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The question group could not be saved. Please, try again.'));
                }
            } else {
                $this->Session->setFlash(__('The question set/folder is already assigned to the group.'));
            }
        }
        if ($this->Session->read('Auth.User.User.superuser') != 1) {
            $groups = $this->QuestionGroup->Group->find('list', array(
                'conditions' => array('Group.created_by' => $this->Session->read('Auth.User.User.id'))));
            $questionSet = $this->QuestionGroup->QuestionSet->find('list', array('conditions' => array(
                    'QuestionSet.owner' => $this->Session->read('Auth.User.User.id'),
                    'is_survey' => 1,
            )));
            $questionFolders = $this->QuestionGroup->QuestionSet->find('list', array('conditions' => array('is_survey' => 0, 'QuestionSet.owner' => $this->Session->read('Auth.User.User.id'),
            )));
            $questionSets = array("Folder" => $questionFolders, "Surveys" => $questionSet);
            $this->set(compact('groups', 'questionSets'));
        } else {
            $groups = $this->QuestionGroup->Group->find('list');
            $questionSet = $this->QuestionGroup->QuestionSet->find('list', array('conditions' => array(
                    'is_survey' => 1,
            )));
            $questionFolders = $this->QuestionGroup->QuestionSet->find('list', array('conditions' => array('is_survey' => 0,
            )));
            $questionSets = array("Folder" => $questionFolders, "Surveys" => $questionSet);
            $this->set(compact('groups', 'questionSets'));
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->QuestionGroup->exists($id)) {
            throw new NotFoundException(__('Invalid question group'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->QuestionGroup->save($this->request->data)) {
                $this->Session->setFlash(__('The question group has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The question group could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('QuestionGroup.' . $this->QuestionGroup->primaryKey => $id));
            $this->request->data = $this->QuestionGroup->find('first', $options);
        }
        $groups = $this->QuestionGroup->Group->find('list');
        $questionSets = $this->QuestionGroup->QuestionSet->find('list');
        $this->set(compact('groups', 'questionSets'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->QuestionGroup->id = $id;
        if (!$this->QuestionGroup->exists()) {
            throw new NotFoundException(__('Invalid question group'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->QuestionGroup->delete()) {
            $this->Session->setFlash(__('The question group has been deleted.'));
        } else {
            $this->Session->setFlash(__('The question group could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
