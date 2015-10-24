<?php
App::uses('AppController', 'Controller');
/**
 * ValidationRules Controller
 *
 * @property ValidationRule $ValidationRule
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ValidationRulesController extends AppController {

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
	public function index() {
		$this->ValidationRule->recursive = 0;
		$this->set('validationRules', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ValidationRule->exists($id)) {
			throw new NotFoundException(__('Invalid validation rule'));
		}
		$options = array('conditions' => array('ValidationRule.' . $this->ValidationRule->primaryKey => $id));
		$this->set('validationRule', $this->ValidationRule->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ValidationRule->create();
			if ($this->ValidationRule->save($this->request->data)) {
				$this->Session->setFlash(__('The validation rule has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The validation rule could not be saved. Please, try again.'));
			}
		}
		$parentValidationRules = $this->ValidationRule->find('list');
		$qsnTypes = $this->ValidationRule->QuestionType->find('list');
		$this->set(compact('parentValidationRules', 'qsnTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ValidationRule->exists($id)) {
			throw new NotFoundException(__('Invalid validation rule'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ValidationRule->save($this->request->data)) {
				$this->Session->setFlash(__('The validation rule has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The validation rule could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ValidationRule.' . $this->ValidationRule->primaryKey => $id));
			$this->request->data = $this->ValidationRule->find('first', $options);
		}
		$parentValidationRules = $this->ValidationRule->find('list');
		$qsnTypes = $this->ValidationRule->QuestionType->find('list');
		$this->set(compact('parentValidationRules', 'qsnTypes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ValidationRule->id = $id;
		if (!$this->ValidationRule->exists()) {
			throw new NotFoundException(__('Invalid validation rule'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ValidationRule->delete()) {
			$this->Session->setFlash(__('The validation rule has been deleted.'));
		} else {
			$this->Session->setFlash(__('The validation rule could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
