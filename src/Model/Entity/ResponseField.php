<?php
namespace FormBuilder\Model\Entity;

use Cake\ORM\Entity;

/**
 * ResponseField Entity
 *
 * @property int $id
 * @property int $response_id
 * @property int $field_id
 * @property string $value
 * @property int $option_id
 * @property \Cake\I18n\FrozenTime $date_value
 *
 * @property \FormBuilder\Model\Entity\Response $response
 * @property \FormBuilder\Model\Entity\Field $field
 * @property \FormBuilder\Model\Entity\Option $option
 */
class ResponseField extends Entity
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
        'response_id' => true,
        'field_id' => true,
        'value' => true,
        'option_id' => true,
        'date_value' => true,
        'response' => true,
        'field' => true,
        'option' => true
    ];

    public function getValue()
    {
        return $this->value ?? $this->option_id ?? $this->date_value;
    }
}
