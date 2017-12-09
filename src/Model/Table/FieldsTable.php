<?php
namespace FormBuilder\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fields Model
 *
 * @property \FormBuilder\Model\Table\FormsTable|\Cake\ORM\Association\BelongsTo $Forms
 * @property \FormBuilder\Model\Table\FieldOptionsTable|\Cake\ORM\Association\HasMany $FieldOptions
 * @property \FormBuilder\Model\Table\ResponseDatasTable|\Cake\ORM\Association\HasMany $ResponseDatas
 *
 * @method \FormBuilder\Model\Entity\Field get($primaryKey, $options = [])
 * @method \FormBuilder\Model\Entity\Field newEntity($data = null, array $options = [])
 * @method \FormBuilder\Model\Entity\Field[] newEntities(array $data, array $options = [])
 * @method \FormBuilder\Model\Entity\Field|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \FormBuilder\Model\Entity\Field patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \FormBuilder\Model\Entity\Field[] patchEntities($entities, array $data, array $options = [])
 * @method \FormBuilder\Model\Entity\Field findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FieldsTable extends Table
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

        $this->setTable('fb_fields');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Forms', [
            'foreignKey' => 'form_id',
            'joinType' => 'INNER',
            'className' => 'FormBuilder.Forms'
        ]);
        $this->hasMany('Options', [
            'foreignKey' => 'field_id',
            'className' => 'FormBuilder.Options'
        ]);
        $this->hasMany('ResponseDatas', [
            'foreignKey' => 'field_id',
            'className' => 'FormBuilder.ResponseDatas'
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
            ->allowEmpty('description');

        $validator
            ->scalar('type')
            ->maxLength('type', 255)
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->integer('weight')
            ->requirePresence('weight', 'create')
            ->notEmpty('weight');

        $validator
            ->boolean('required')
            ->requirePresence('required', 'create')
            ->notEmpty('required');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

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
        $rules->add($rules->existsIn(['form_id'], 'Forms'));

        return $rules;
    }

    public function findAssociated(Query $query, array $options = [])
    {
        $query->contain('Options');
        return $query;
    }
}
