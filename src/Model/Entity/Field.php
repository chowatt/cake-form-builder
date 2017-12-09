<?php
namespace FormBuilder\Model\Entity;

use Cake\ORM\Entity;

/**
 * Field Entity
 *
 * @property int $id
 * @property int $form_id
 * @property string $name
 * @property string $description
 * @property string $type
 * @property int $weight
 * @property bool $required
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $deleted
 *
 * @property \FormBuilder\Model\Entity\Form $form
 * @property \FormBuilder\Model\Entity\FieldOption[] $field_options
 * @property \FormBuilder\Model\Entity\ResponseData[] $response_datas
 */
class Field extends Entity
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
        'name' => true,
        'description' => true,
        'type' => true,
        'weight' => true,
        'required' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'form' => true,
        'field_options' => true,
        'response_datas' => true
    ];

    public $types = [
        'text' => 'Text Box',
        'textarea' => 'Textarea',
        'checkbox' => 'Checkbox',
        'radio' => 'Radio',
        'dropdown' => 'Dropdown'
    ];

    public function hasOptions()
    {

        if(in_array($this->type, ['checkbox', 'radio', 'select'])){
            return true;
        }

        return false;
    }

    public function getOptions($byId = false)
    {
        if(empty($this->options)){
            return null;
        }

        $output = [];

        if ($byId) {
            foreach ($this->options as $option) {
                $output[$option->value] = $option->id;
            }
        } else {
            foreach ($this->options as $option) {
                $output[$option->value] = $option->name;
            }
        }

        return $output;
    }

    public function getFormOptions()
    {
        $options = [];

        $options['label'] = $this->description ?? $this->name;
        $options['options'] = $this->getOptions();
        $options['required'] = $this->required;
        
        if(in_array($this->type, ['text', 'textarea', 'date', 'datetime'])){
            $options['type'] = $this->type;
        } else if ($this->type == 'checkbox' && is_array($options)) {
            $options['type'] = 'select';
            $options['multiple'] = 'checkbox';
        } else if ($this->type == 'select') {
            $options['type'] = 'select';
        } else if ($this->type == 'radio') {
            $options['type'] = 'radio';
        }

        return $options;
    }
}
