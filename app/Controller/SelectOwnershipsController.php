<?php
App::uses('AppController', 'Controller');
/**
 * SelectOwnerships Controller
 *
 * @property SelectOwnership $SelectOwnership
 * @property PaginatorComponent $Paginator
 */
class SelectOwnershipsController extends AppController {

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
		$this->SelectOwnership->recursive = 0;
		$this->set('selectOwnerships', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SelectOwnership->exists($id)) {
			throw new NotFoundException(__('Invalid select ownership'));
		}
		$options = array('conditions' => array('SelectOwnership.' . $this->SelectOwnership->primaryKey => $id));
		$this->set('selectOwnership', $this->SelectOwnership->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SelectOwnership->create();
			if ($this->SelectOwnership->save($this->request->data)) {
				$this->Session->setFlash(__('The select ownership has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The select ownership could not be saved. Please, try again.'));
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
		if (!$this->SelectOwnership->exists($id)) {
			throw new NotFoundException(__('Invalid select ownership'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SelectOwnership->save($this->request->data)) {
				$this->Session->setFlash(__('The select ownership has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The select ownership could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SelectOwnership.' . $this->SelectOwnership->primaryKey => $id));
			$this->request->data = $this->SelectOwnership->find('first', $options);
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
		$this->SelectOwnership->id = $id;
		if (!$this->SelectOwnership->exists()) {
			throw new NotFoundException(__('Invalid select ownership'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->SelectOwnership->delete()) {
			$this->Session->setFlash(__('The select ownership has been deleted.'));
		} else {
			$this->Session->setFlash(__('The select ownership could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
