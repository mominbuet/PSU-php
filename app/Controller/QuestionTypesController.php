<?php
App::uses('AppController', 'Controller');
/**
 * QuestionTypes Controller
 *
 * @property QuestionType $QuestionType
 * @property PaginatorComponent $Paginator
 */
class QuestionTypesController extends AppController {

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
		$this->QuestionType->recursive = 0;
		$this->set('qsnTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->QuestionType->exists($id)) {
			throw new NotFoundException(__('Invalid qsn type'));
		}
		$options = array('conditions' => array('QuestionType.' . $this->QuestionType->primaryKey => $id));
		$this->set('qsnType', $this->QuestionType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->QuestionType->create();
                        if ($this->QuestionType->save($this->request->data)) {
				$this->Session->setFlash(__('The question type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question type could not be saved. Please, try again.'));
			}
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
		if (!$this->QuestionType->exists($id)) {
			throw new NotFoundException(__('Invalid qsn type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->QuestionType->save($this->request->data)) {
				$this->Session->setFlash(__('The qsn type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The qsn type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('QuestionType.' . $this->QuestionType->primaryKey => $id));
			$this->request->data = $this->QuestionType->find('first', $options);
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
		$this->QuestionType->id = $id;
		if (!$this->QuestionType->exists()) {
			throw new NotFoundException(__('Invalid qsn type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->QuestionType->delete()) {
			$this->Session->setFlash(__('The qsn type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The qsn type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
