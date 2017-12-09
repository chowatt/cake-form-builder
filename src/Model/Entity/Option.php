<?php
namespace FormBuilder\Model\Entity;

use Cake\ORM\Entity;

/**
 * Option Entity
 *
 * @property int $id
 * @property int $field_id
 * @property string $name
 * @property string $value
 *
 * @property \FormBuilder\Model\Entity\Field $field
 */
class Option extends Entity
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
        'field_id' => true,
        'name' => true,
        'value' => true,
        'field' => true
    ];
}
