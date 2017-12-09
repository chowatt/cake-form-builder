<?php
namespace FormBuilder\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Responses Model
 *
 * @property \FormBuilder\Model\Table\FormsTable|\Cake\ORM\Association\BelongsTo $Forms
 * @property \FormBuilder\Model\Table\ResponseFieldsTable|\Cake\ORM\Association\HasMany $ResponseFields
 *
 * @method \FormBuilder\Model\Entity\Response get($primaryKey, $options = [])
 * @method \FormBuilder\Model\Entity\Response newEntity($data = null, array $options = [])
 * @method \FormBuilder\Model\Entity\Response[] newEntities(array $data, array $options = [])
 * @method \FormBuilder\Model\Entity\Response|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \FormBuilder\Model\Entity\Response patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \FormBuilder\Model\Entity\Response[] patchEntities($entities, array $data, array $options = [])
 * @method \FormBuilder\Model\Entity\Response findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ResponsesTable extends Table
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

        $this->setTable('fb_responses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Forms', [
            'foreignKey' => 'form_id',
            'joinType' => 'INNER',
            'className' => 'FormBuilder.Forms'
        ]);
        $this->hasMany('ResponseFields', [
            'foreignKey' => 'response_id',
            'className' => 'FormBuilder.ResponseFields'
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
        $query->contain('ResponseFields');
        return $query;
    }
}
