<?php
namespace FormBuilder\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\Time;

/**
 * Forms Model
 *
 * @property \FormBuilder\Model\Table\OwnersTable|\Cake\ORM\Association\BelongsTo $Owners
 * @property \FormBuilder\Model\Table\FieldsTable|\Cake\ORM\Association\HasMany $Fields
 * @property \FormBuilder\Model\Table\ResponsesTable|\Cake\ORM\Association\HasMany $Responses
 *
 * @method \FormBuilder\Model\Entity\Form get($primaryKey, $options = [])
 * @method \FormBuilder\Model\Entity\Form newEntity($data = null, array $options = [])
 * @method \FormBuilder\Model\Entity\Form[] newEntities(array $data, array $options = [])
 * @method \FormBuilder\Model\Entity\Form|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \FormBuilder\Model\Entity\Form patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \FormBuilder\Model\Entity\Form[] patchEntities($entities, array $data, array $options = [])
 * @method \FormBuilder\Model\Entity\Form findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FormsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('fb_forms');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Fields', [
            'foreignKey' => 'form_id',
            'className' => 'FormBuilder.Fields'
        ]);
        $this->hasMany('Responses', [
            'foreignKey' => 'form_id',
            'className' => 'FormBuilder.Responses'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('description')
            ->maxLength('description', 4294967295)
            ->allowEmpty('description');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        return $validator;
    }

    public function findAssociated(Query $query, array $options = [])
    {
        $query->contain('Fields.Options');
        return $query;
    }

    public function saveResponse($form, $data)
    {

        $response = null;
        $responseData = null;

        foreach ($form->fields as $field) {
            if (!isset($data[$field->name])) {
                continue;
            }
            $datum = null;
            $datum['field_id'] = $field->id;

            if ($field->hasOptions() && in_array($field->type, ['radio', 'select'])) {
                $options = $field->getOptions($byId = true);
                if (isset($options[$data[$field->name]])) {
                    $datum['option_id'] = $options[$data[$field->name]];
                }
            } else if ($field->hasOptions()) {
                $datum['value'] = json_encode($data[$field->name]);
            } else if (in_array($field->type, ['date', 'datetime'])) {
                $dateObject = \Cake\Database\Type::build('date')->marshal($data[$field->name]);
                $datum['date_value'] = $dateObject;
            } else {
                $datum['value'] = $data[$field->name];
            }

            $responseData[] = $datum;
        }

        $response = [
            'form_id' => $form->id,
            'response_fields' => $responseData
        ];

        $response = $this->Responses->newEntity($response);
        return $this->Responses->save($response);
    }
}
