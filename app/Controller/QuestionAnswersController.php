<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class QuestionAnswersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');

    public function edit($id = null) {
        if (!$this->QuestionAnswer->exists($id)) {
            throw new NotFoundException(__('Invalid question answer'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->QuestionAnswer->save($this->request->data)) {
                $this->Session->setFlash(__('The answer has been saved.'));
//                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The answer could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('QuestionAnswer.' . $this->QuestionAnswer->primaryKey => $id));
            $this->request->data = $this->QuestionAnswer->find('first', $options);
        }
    }

}
