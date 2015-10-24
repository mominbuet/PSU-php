<?php

App::uses('AppController', 'Controller');

/**
 * UserMessages Controller
 *
 * @property UserMessage $UserMessage
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UserMessagesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session', 'Reuse');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->UserMessage->recursive = 0;
        $this->set('userMessages', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->UserMessage->exists($id)) {
            throw new NotFoundException(__('Invalid user message'));
        }
        $options = array('conditions' => array('UserMessage.' . $this->UserMessage->primaryKey => $id));
        $this->set('userMessage', $this->UserMessage->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            
            if ($this->request->data['UserMessage']['user_id'] == '') {
                $users = ($this->Reuse->getUsers($this->request->data['UserMessage']['question_set_id']));
//                debug($users);
                
                foreach ($users as $k => $v) {
                    $this->UserMessage->create();
                    $this->request->data['UserMessage']['user_id'] = $k;
                    $this->UserMessage->save($this->request->data);
                }
                $this->Session->setFlash(__('The user message has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->UserMessage->create();
                if ($this->UserMessage->save($this->request->data)) {
                    $this->Session->setFlash(__('The user message has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The user message could not be saved. Please, try again.'));
                }
            }
        }
        $users = $this->UserMessage->User->find('list');
        $questionSets = $this->UserMessage->QuestionSet->find('list');
        $this->set(compact('users', 'questionSets'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->UserMessage->exists($id)) {
            throw new NotFoundException(__('Invalid user message'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->UserMessage->save($this->request->data)) {
                $this->Session->setFlash(__('The user message has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user message could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('UserMessage.' . $this->UserMessage->primaryKey => $id));
            $this->request->data = $this->UserMessage->find('first', $options);
        }
        $users = $this->UserMessage->User->find('list');
        $questionSets = $this->UserMessage->QuestionSet->find('list');
        $this->set(compact('users', 'questionSets'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->UserMessage->id = $id;
        if (!$this->UserMessage->exists()) {
            throw new NotFoundException(__('Invalid user message'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->UserMessage->delete()) {
            $this->Session->setFlash(__('The user message has been deleted.'));
        } else {
            $this->Session->setFlash(__('The user message could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
