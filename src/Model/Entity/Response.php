<?php
namespace FormBuilder\Model\Entity;

use Cake\ORM\Entity;

/**
 * Response Entity
 *
 * @property int $id
 * @property int $form_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \FormBuilder\Model\Entity\Form $form
 * @property \FormBuilder\Model\Entity\ResponseField[] $response_fields
 */
class Response extends Entity
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
        'form_id' => true,
        'created' => true,
        'modified' => true,
        'form' => true,
        'response_fields' => true
    ];

    
}
