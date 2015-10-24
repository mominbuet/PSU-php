<?php
App::uses('AppController', 'Controller');
/**
 * SelectLandTypes Controller
 *
 * @property SelectLandType $SelectLandType
 * @property PaginatorComponent $Paginator
 */
class SelectLandTypesController extends AppController {

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
		$this->SelectLandType->recursive = 0;
		$this->set('selectLandTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SelectLandType->exists($id)) {
			throw new NotFoundException(__('Invalid select land type'));
		}
		$options = array('conditions' => array('SelectLandType.' . $this->SelectLandType->primaryKey => $id));
		$this->set('selectLandType', $this->SelectLandType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SelectLandType->create();
			if ($this->SelectLandType->save($this->request->data)) {
				$this->Session->setFlash(__('The select land type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The select land type could not be saved. Please, try again.'));
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
		if (!$this->SelectLandType->exists($id)) {
			throw new NotFoundException(__('Invalid select land type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SelectLandType->save($this->request->data)) {
				$this->Session->setFlash(__('The select land type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The select land type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SelectLandType.' . $this->SelectLandType->primaryKey => $id));
			$this->request->data = $this->SelectLandType->find('first', $options);
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
		$this->SelectLandType->id = $id;
		if (!$this->SelectLandType->exists()) {
			throw new NotFoundException(__('Invalid select land type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->SelectLandType->delete()) {
			$this->Session->setFlash(__('The select land type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The select land type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
