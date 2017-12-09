<?php
namespace FormBuilder\Controller;

use FormBuilder\Controller\AppController;

/**
 * Forms Controller
 *
 *
 * @method \FormBuilder\Model\Entity\Form[] paginate($object = null, array $settings = [])
 */
class FormsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $forms = $this->paginate($this->Forms, ['finder' => 'Associated']);

        $this->set(compact('forms'));
        $this->set('_serialize', ['forms']);
    }

    /**
     * View method
     *
     * @param string|null $id Form id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $form = $this->Forms->get($id, ['finder' => 'Associated']);

        if ($this->request->is(['post', 'put', 'patch'])) {
            $this->Forms->saveResponse($form, $this->request->getData());
        }

        $this->set('form', $form);
        $this->set('_serialize', ['form']);
    }

    public function responses($id)
    {
        $form = $this->Forms->get($id, ['finder' => 'Associated']);
        $responses = $this->Forms->Responses->findByFormId($id)->find('Associated')->all();

        $this->set(compact('form', 'responses'));
        $this->set('_serialize', ['form', 'responses']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $form = $this->Forms->newEntity();
        if ($this->request->is('post')) {
            $form = $this->Forms->patchEntity($form, $this->request->getData());
            if ($this->Forms->save($form)) {
                $this->Flash->success(__('The form has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The form could not be saved. Please, try again.'));
        }
        $this->set(compact('form'));
        $this->set('_serialize', ['form']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Form id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $form = $this->Forms->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $form = $this->Forms->patchEntity($form, $this->request->getData());
            if ($this->Forms->save($form)) {
                $this->Flash->success(__('The form has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The form could not be saved. Please, try again.'));
        }
        $this->set(compact('form'));
        $this->set('_serialize', ['form']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Form id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $form = $this->Forms->get($id);
        if ($this->Forms->delete($form)) {
            $this->Flash->success(__('The form has been deleted.'));
        } else {
            $this->Flash->error(__('The form could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function fields($id = null)
    {
        $form = $this->Forms->get($id, ['finder' => 'Associated']);

        $this->set(compact('form'));
        $this->set('_serialize', ['form']);
    }

    public function fieldAdd($id)
    {
        $form = $this->Forms->get($id, ['finder' => 'Associated']);
        $field = $this->Forms->Fields->newEntity();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $field = $this->Forms->Fields->patchEntity($field, $this->request->getData());
            $field->form_id = $id;
            $field->weight = count($form->fields) + 1;
            if ($this->Forms->Fields->save($field)) {
                $this->redirect(['action' => 'fields', $id]);
            } else {
                debug($field);
            }
        }

        $this->set(compact('form', 'field'));
        $this->set('_serialize', ['form', 'field']);
    }

    public function fieldEdit($id, $fieldId)
    {
        $form = $this->Forms->get($id, ['finder' => 'Associated']);
        $field = $this->Forms->Fields->get($fieldId);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $field = $this->Forms->Fields->patchEntity($field, $this->request->getData());
            $field->form_id = $id;
            if ($this->Forms->Fields->save($field)) {
                $this->redirect(['action' => 'fields', $id]);
            } else {
                debug($field);
            }
        }

        $this->set(compact('form', 'field'));
        $this->set('_serialize', ['form', 'field']);
    }

    public function fieldOptions($id, $fieldId)
    {
        $form = $this->Forms->get($id, ['finder' => 'Associated']);
        $field = $this->Forms->Fields->get($fieldId, ['finder' => 'Associated']);


        $this->set(compact('form', 'field'));
        $this->set('_serialize', ['form', 'field']);
    }

    public function optionAdd($id, $fieldId)
    {
        $form = $this->Forms->get($id, ['finder' => 'Associated']);
        $field = $this->Forms->Fields->get($fieldId, ['finder' => 'Associated']);
        $option = $this->Forms->Fields->Options->newEntity();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $option = $this->Forms->Fields->Options->patchEntity($option, $this->request->getData());
            $option->field_id = $fieldId;
            if ($this->Forms->Fields->Options->save($option)) {
                $this->redirect(['action' => 'fieldOptions', $id, $fieldId]);
            } else {
                debug($field);
            }
        }

        $this->set(compact('form', 'field', 'option'));
        $this->set('_serialize', ['form', 'option', 'field']);
    }

    public function optionEdit($id, $fieldId, $optionId)
    {
        $form = $this->Forms->get($id, ['finder' => 'Associated']);
        $field = $this->Forms->Fields->get($fieldId, ['finder' => 'Associated']);
        $option = $this->Forms->Fields->Options->get($optionId);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $option = $this->Forms->Fields->Options->patchEntity($option, $this->request->getData());
            $option->field_id = $fieldId;
            if ($this->Forms->Fields->Options->save($option)) {
                $this->redirect(['action' => 'fieldOptions', $id, $fieldId]);
            } else {
                debug($field);
            }
        }

        $this->set(compact('form', 'field', 'option'));
        $this->set('_serialize', ['form', 'option', 'field']);
    }
}
