<?php

App::uses('AppController', 'Controller');

/**
 * Questions Controller
 *
 * @property Question $Question
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class QuestionsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function index($qset = null) {
        $this->Question->recursive = 0;
        $this->set('questions', $this->Paginator->paginate(
                        'Question', array('Question.qsn_set_id' => $qset)));

        $this->set('setID', $qset);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Question->exists($id)) {
            throw new NotFoundException(__('Invalid question'));
        }
        $options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
        $this->set('question', $this->Question->find('first', $options));
    }

    public function add_() {
        
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($qset = null) {
        $this->loadModel('QuestionType');
        if ($this->request->is('post')) {
            $SelectMisc = $this->request->data['SelectMisc'];
            $this->Question->create();
//            debug($this->request->data['Question']);
            if ($this->request->data['Question']['validation_text2'] != '') {
                $this->request->data['Question']['validation_text'] = $this->request->data['Question']['validation_text1'] . "," .
                        $this->request->data['Question']['validation_text2'];
            }
//            debug($this->request->data['Question']['validation_text']);
            if ($this->Question->save($this->request->data)) {
                $this->loadModel('UserHistory');
                $this->UserHistory->create();
                $this->UserHistory->save(array('user_id' => $this->Session->read('Auth.User.User.id'),
                    'event_details' => "Added Question " . $this->request->header('User-Agent'),
                    'ipaddress' => $this->request->clientIp(),
                    'event_time' => $this->UserHistory->getDataSource()->expression('NOW()'),
                    'user_event' => 'Added Question ',
                ));
                $this->loadModel('SelectMisc');
//                debug($this->request->data['SelectMiscNext']);
                $i = 0;
                if ($this->request->data['SelectMiscNext']) {
                    foreach ($SelectMisc as $sm) {
                        if ($sm != "") {
                            $this->SelectMisc->create();
                            if ($this->request->data['SelectMiscNext'][$i++] != '0')
                                $this->SelectMisc->save(array('misc_option' => $sm,
                                    'next_section_id' => $this->request->data['SelectMiscNext'][$i++],
                                    'question_id' => $this->Question->id));
                            else
                                $this->SelectMisc->save(array('misc_option' => $sm,
                                    'question_id' => $this->Question->id));
                        }
                    }
                }
                $db = ConnectionManager::getDataSource('default');
//            echo $q;
                $db->query("drop table if EXISTS pmtc_" . $qset . 's');
                $this->Session->setFlash(__('The question has been saved.'));
                return $this->redirect(array('action' => 'add', $this->request->data['Question']['qsn_set_id']));
            } else {
                $this->Session->setFlash(__('The question could not be saved. Please, try again.'));
            }
        }
        $options = array('conditions' => array($this->Question->QuestionSet->primaryKey => $qset));
        $questionSets = $this->Question->QuestionSet->find('first', $options);
        $qsnTypes = $this->QuestionType->find('list');
//        $qsnSections = $this->Question->find('list',array('fields'=>array('DISTINCT Question.section_name'),
//            'conditions'=>array('qsn_set_id'=>$qset),
//            'group' => array('Question.id')));
        $prev_section = array('name' => '', 'id' => '');
        $section_name_prev = $this->Question->find('first', array(
            'fields' => array('section_name', 'section_id'),
            'recursive' => -1,
            'conditions' => array('qsn_set_id' => $qset),
            'order' => array('id' => 'Desc')));

        if (sizeof($section_name_prev) > 0) {
            $prev_section['name'] = $section_name_prev['Question']['section_name'];
            $prev_section['prev_id'] = $section_name_prev['Question']['section_id'];
        }
        $qsnSections = $this->Question->QuestionSection->find('list');
        $qsnTypesAll = $this->Question->QuestionType->find('all');
        $data_array = array();
        foreach ($qsnTypesAll as $qtype) {
            $data_array +=array($qtype['QuestionType']['id'] . 'id' => $qtype['QuestionType']['options']);
        }
        $validityRules = $this->Question->ValidationRule->find('list');
        $this->set('questions', $this->Paginator->paginate(
                        'Question', array('Question.qsn_set_id' => $qset), array('limit' => 25)));
        $this->set('setID', $qset);

        $this->set(compact('questionSets', 'prev_section', 'data_array', 'qsnTypes', 'qsnSections', 'validityRules'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null, $qsn_set_id = null) {
        if (!$this->Question->exists($id)) {
            throw new NotFoundException(__('Invalid question'));
        }
        if ($this->request->is(array('post', 'put'))) {

            if ($this->Question->save($this->request->data)) {
                $this->loadModel('SelectMisc');
//                debug($this->request->data['SelectMiscNext']);
                $i = 0; //$j=0;
                if ($this->request->data['SelectMiscNext']) {
                    $this->SelectMisc->deleteAll(array('SelectMisc.question_id' => $id), false);
                    $SelectMisc = $this->request->data['SelectMisc'];
                    foreach ($SelectMisc as $sm) {
                        if ($sm != "") {
                            $this->loadModel('UserHistory');
                            $this->UserHistory->create();
                            $this->UserHistory->save(array('user_id' => $this->Session->read('Auth.User.User.id'),
                                'event_details' => "Edited Question " . $this->request->header('User-Agent'),
                                'ipaddress' => $this->request->clientIp(),
                                'event_time' => $this->UserHistory->getDataSource()->expression('NOW()'),
                                'user_event' => 'Edited Question ',
                            ));
                            //if(!$this->request->data['SelectMiscId'][$j])
                            $this->SelectMisc->create();
                            if ($this->request->data['SelectMiscNext'][$i] != '0')
                                $this->SelectMisc->save(array('misc_option' => $sm,
                                    //'misc_id'=>$this->request->data['SelectMiscId'][$j],
                                    'next_section_id' => $this->request->data['SelectMiscNext'][$i],
                                    'question_id' => $this->Question->id));
                            else
                                $this->SelectMisc->save(array('misc_option' => $sm,
                                    //'misc_id'=>$this->request->data['SelectMiscId'][$j],
                                    'question_id' => $this->Question->id));
                            $i++;
                        }
                    }
                }
                $db = ConnectionManager::getDataSource('default');
//            echo $q;
                $db->query("drop table if EXISTS pmtc_" . $qsn_set_id . 's');
                $this->Session->setFlash(__('The question has been saved.'));
                return $this->redirect(array('action' => 'index', $qsn_set_id));
            } else {
                $this->Session->setFlash(__('The question could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
            $this->request->data = $this->Question->find('first', $options);
            //debug($this->request->data);
        }
        $qsnTypes = $this->Question->QuestionType->find('list');
        $qsnTypesAll = $this->Question->QuestionType->find('all');
        $qsnSections = $this->Question->QuestionSection->find('list');
        $prev_section = array('name' => '', 'id' => '');
        $section_name_prev = $this->Question->find('first', array(
            'fields' => array('section_name', 'section_id'),
            'recursive' => -1,
            'conditions' => array('id' => $id),
            'order' => array('id' => 'Desc')));

        if (sizeof($section_name_prev) > 0) {
            $prev_section['name'] = $section_name_prev['Question']['section_name'];
            $prev_section['prev_id'] = $section_name_prev['Question']['section_id'];
        }
        $data_array = array();
        foreach ($qsnTypesAll as $qtype) {
            $data_array +=array($qtype['QuestionType']['id'] . 'id' => $qtype['QuestionType']['options']);
        }
        $validityRules = $this->Question->ValidationRule->find('list');
        $this->set(compact('questionSets', 'qsnSections', 'prev_section', 'data_array', 'qsnTypes', 'validityRules'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Question->id = $id;
        if (!$this->Question->exists()) {
            throw new NotFoundException(__('Invalid question'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Question->delete()) {
            $this->Session->setFlash(__('The question has been deleted.'));
        } else {
            $this->Session->setFlash(__('The question could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
