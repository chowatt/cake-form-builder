<?php
namespace FormBuilder\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ResponseFields Model
 *
 * @property \FormBuilder\Model\Table\ResponsesTable|\Cake\ORM\Association\BelongsTo $Responses
 * @property \FormBuilder\Model\Table\FieldsTable|\Cake\ORM\Association\BelongsTo $Fields
 * @property \FormBuilder\Model\Table\OptionsTable|\Cake\ORM\Association\BelongsTo $Options
 *
 * @method \FormBuilder\Model\Entity\ResponseField get($primaryKey, $options = [])
 * @method \FormBuilder\Model\Entity\ResponseField newEntity($data = null, array $options = [])
 * @method \FormBuilder\Model\Entity\ResponseField[] newEntities(array $data, array $options = [])
 * @method \FormBuilder\Model\Entity\ResponseField|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \FormBuilder\Model\Entity\ResponseField patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \FormBuilder\Model\Entity\ResponseField[] patchEntities($entities, array $data, array $options = [])
 * @method \FormBuilder\Model\Entity\ResponseField findOrCreate($search, callable $callback = null, $options = [])
 */
class ResponseFieldsTable extends Table
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

        $this->setTable('fb_response_fields');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Responses', [
            'foreignKey' => 'response_id',
            'joinType' => 'INNER',
            'className' => 'FormBuilder.Responses'
        ]);
        $this->belongsTo('Fields', [
            'foreignKey' => 'field_id',
            'joinType' => 'INNER',
            'className' => 'FormBuilder.Fields'
        ]);
        $this->belongsTo('Options', [
            'foreignKey' => 'option_id',
            'className' => 'FormBuilder.Options'
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
            ->scalar('value')
            ->maxLength('value', 4294967295)
            ->allowEmpty('value');

        $validator
            ->dateTime('date_value')
            ->allowEmpty('date_value');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['response_id'], 'Responses'));
        $rules->add($rules->existsIn(['field_id'], 'Fields'));
        $rules->add($rules->existsIn(['option_id'], 'Options'));

        return $rules;
    }
}
