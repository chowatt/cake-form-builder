<?php
namespace FormBuilder\Model\Entity;

use Cake\ORM\Entity;

/**
 * Form Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $deleted
 * @property string $owner_id
 *
 * @property \FormBuilder\Model\Entity\Owner $owner
 * @property \FormBuilder\Model\Entity\Field[] $fields
 * @property \FormBuilder\Model\Entity\Response[] $responses
 */
class Form extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'owner_id' => true,
        'owner' => true,
        'fields' => true,
        'responses' => true
    ];
}
