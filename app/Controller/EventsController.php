<?php

App::uses('AppController', 'Controller');

/**
 * Events Controller
 *
 * @property Event $Event
 */
class EventsController extends AppController {
    public $components = array('Upload');

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($view_id = null) {
        $event = $this->Event->find('first',array(
            'conditions' => array(
                'view_id' => $view_id
            ),
            'contain' => array(
                'Guest' => array(
                    'order' => 'id DESC'
                )
            )
        ));
        if (empty($event)) {
            throw new NotFoundException(__('Invalid event'));
        }
        $this->set(compact('event'));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            if(!empty($this->data['Event']['image']['name'])){
                $file = $this->data['Event']['image'];
                $file['name'] = String::uuid();
                $this->request->data['Event']['image'] = $file['name'];
                $this->Upload->upload($file);
            }else{
                $this->request->data['Event']['image'] = NULL;
            }
            
            $this->Event->create();
            $event = $this->Event->save($this->request->data);
            if ($event) {
                $this->Session->setFlash(__('The event has been saved'));
                $this->redirect(array('action' => 'view', $event['Event']['view_id']));
            } else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
    /*
    public function edit($id = null) {
        $this->Event->id = $id;
        if (!$this->Event->exists()) {
            throw new NotFoundException(__('Invalid event'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Event->save($this->request->data)) {
                $this->Session->setFlash(__('The event has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Event->read(null, $id);
        }
    }
*/
    /**
     * delete method
     *
     * @param string $id
     * @return void
     */
    /*
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Event->id = $id;
        if (!$this->Event->exists()) {
            throw new NotFoundException(__('Invalid event'));
        }
        if ($this->Event->delete()) {
            $this->Session->setFlash(__('Event deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Event was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
     
     */

}
