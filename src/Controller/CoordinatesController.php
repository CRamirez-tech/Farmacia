<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Coordinates Controller
 *
 * @property \App\Model\Table\CoordinatesTable $Coordinates
 * @method \App\Model\Entity\Coordinate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CoordinatesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $coordinates = $this->paginate($this->Coordinates);

        $this->set(compact('coordinates'));
    }

    /**
     * View method
     *
     * @param string|null $id Coordinate id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $coordinate = $this->Coordinates->get($id, [
            'contain' => ['Pharmacies'],
        ]);

        $this->set(compact('coordinate'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $coordinate = $this->Coordinates->newEmptyEntity();
        if ($this->request->is('post')) {
            $coordinate = $this->Coordinates->patchEntity($coordinate, $this->request->getData());
            if ($this->Coordinates->save($coordinate)) {
                $this->Flash->success(__('The coordinate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The coordinate could not be saved. Please, try again.'));
        }
        $this->set(compact('coordinate'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Coordinate id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $coordinate = $this->Coordinates->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $coordinate = $this->Coordinates->patchEntity($coordinate, $this->request->getData());
            if ($this->Coordinates->save($coordinate)) {
                $this->Flash->success(__('The coordinate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The coordinate could not be saved. Please, try again.'));
        }
        $this->set(compact('coordinate'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Coordinate id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $coordinate = $this->Coordinates->get($id);
        if ($this->Coordinates->delete($coordinate)) {
            $this->Flash->success(__('The coordinate has been deleted.'));
        } else {
            $this->Flash->error(__('The coordinate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
