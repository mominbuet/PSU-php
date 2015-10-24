<?php
App::uses('AppController', 'Controller');
/**
 * SelectWaterPointTypes Controller
 *
 * @property SelectWaterPointType $SelectWaterPointType
 * @property PaginatorComponent $Paginator
 */
class SelectWaterPointTypesController extends AppController {

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
		$this->SelectWaterPointType->recursive = 0;
		$this->set('selectWaterPointTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SelectWaterPointType->exists($id)) {
			throw new NotFoundException(__('Invalid select water point type'));
		}
		$options = array('conditions' => array('SelectWaterPointType.' . $this->SelectWaterPointType->primaryKey => $id));
		$this->set('selectWaterPointType', $this->SelectWaterPointType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SelectWaterPointType->create();
			if ($this->SelectWaterPointType->save($this->request->data)) {
				$this->Session->setFlash(__('The select water point type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The select water point type could not be saved. Please, try again.'));
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
		if (!$this->SelectWaterPointType->exists($id)) {
			throw new NotFoundException(__('Invalid select water point type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SelectWaterPointType->save($this->request->data)) {
				$this->Session->setFlash(__('The select water point type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The select water point type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SelectWaterPointType.' . $this->SelectWaterPointType->primaryKey => $id));
			$this->request->data = $this->SelectWaterPointType->find('first', $options);
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
		$this->SelectWaterPointType->id = $id;
		if (!$this->SelectWaterPointType->exists()) {
			throw new NotFoundException(__('Invalid select water point type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->SelectWaterPointType->delete()) {
			$this->Session->setFlash(__('The select water point type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The select water point type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
