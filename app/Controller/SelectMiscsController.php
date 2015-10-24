<?php
App::uses('AppController', 'Controller');
/**
 * SelectMiscs Controller
 *
 * @property SelectMisc $SelectMisc
 * @property PaginatorComponent $Paginator
 */
class SelectMiscsController extends AppController {

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
		$this->SelectMisc->recursive = 0;
		$this->set('selectMiscs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SelectMisc->exists($id)) {
			throw new NotFoundException(__('Invalid select misc'));
		}
		$options = array('conditions' => array('SelectMisc.' . $this->SelectMisc->primaryKey => $id));
		$this->set('selectMisc', $this->SelectMisc->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SelectMisc->create();
			if ($this->SelectMisc->save($this->request->data)) {
				$this->Session->setFlash(__('The select misc has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The select misc could not be saved. Please, try again.'));
			}
		}
		$questions = $this->SelectMisc->Question->find('list');
		$this->set(compact('questions'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->SelectMisc->exists($id)) {
			throw new NotFoundException(__('Invalid select misc'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SelectMisc->save($this->request->data)) {
				$this->Session->setFlash(__('The select misc has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The select misc could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SelectMisc.' . $this->SelectMisc->primaryKey => $id));
			$this->request->data = $this->SelectMisc->find('first', $options);
		}
		$questions = $this->SelectMisc->Question->find('list');
		$this->set(compact('questions'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->SelectMisc->id = $id;
		if (!$this->SelectMisc->exists()) {
			throw new NotFoundException(__('Invalid select misc'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->SelectMisc->delete()) {
			$this->Session->setFlash(__('The select misc has been deleted.'));
		} else {
			$this->Session->setFlash(__('The select misc could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
