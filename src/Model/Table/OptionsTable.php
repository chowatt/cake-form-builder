<?php
namespace FormBuilder\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Options Model
 *
 * @property \FormBuilder\Model\Table\FieldsTable|\Cake\ORM\Association\BelongsTo $Fields
 *
 * @method \FormBuilder\Model\Entity\Option get($primaryKey, $options = [])
 * @method \FormBuilder\Model\Entity\Option newEntity($data = null, array $options = [])
 * @method \FormBuilder\Model\Entity\Option[] newEntities(array $data, array $options = [])
 * @method \FormBuilder\Model\Entity\Option|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \FormBuilder\Model\Entity\Option patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \FormBuilder\Model\Entity\Option[] patchEntities($entities, array $data, array $options = [])
 * @method \FormBuilder\Model\Entity\Option findOrCreate($search, callable $callback = null, $options = [])
 */
class OptionsTable extends Table
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

        $this->setTable('fb_options');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Fields', [
            'foreignKey' => 'field_id',
            'joinType' => 'INNER',
            'className' => 'FormBuilder.Fields'
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
            ->scalar('value')
            ->maxLength('value', 255)
            ->requirePresence('value', 'create')
            ->notEmpty('value');

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
        $rules->add($rules->existsIn(['field_id'], 'Fields'));

        return $rules;
    }
}
