<?php
App::uses('AppController', 'Controller');
/**
 * Guests Controller
 *
 * @property Guest $Guest
 */
class GuestsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Guest->recursive = 0;
		$this->set('guests', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Guest->id = $id;
		if (!$this->Guest->exists()) {
			throw new NotFoundException(__('Invalid guest'));
		}
		$this->set('guest', $this->Guest->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Guest->create();
                        $this->request->data['Guest']['attending'] = ($this->request->data['button'] == 'Attend' ? 1 : 0);
			if ($this->Guest->save($this->request->data)) {
				$this->Session->setFlash(__('The guest has been saved'));
		
			} else {
				$this->Session->setFlash(__('The guest could not be saved. Please, try again.'));
			}
		}
            $this->redirect($this->referer());
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Guest->id = $id;
		if (!$this->Guest->exists()) {
			throw new NotFoundException(__('Invalid guest'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Guest->save($this->request->data)) {
				$this->Session->setFlash(__('The guest has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The guest could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Guest->read(null, $id);
		}
		$events = $this->Guest->Event->find('list');
		$this->set(compact('events'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Guest->id = $id;
		if (!$this->Guest->exists()) {
			throw new NotFoundException(__('Invalid guest'));
		}
		if ($this->Guest->delete()) {
			$this->Session->setFlash(__('Guest deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Guest was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
