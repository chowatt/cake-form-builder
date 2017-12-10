<?php
namespace FormBuilder\View\Helper;
use Cake\View\Helper;
use FormBuilder\Model\Entity\Form;

class FormBuilderHelper extends Helper
{

    public $helpers = array('Html', 'Form');

    public function build(Form $form)
    {
        $output = $this->Form->create(null);

        foreach ($form->fields as $field) {
            switch ($field->type) {
                case "text":
                case "textarea":
                case "date":
                case "datetime":
                    $output .= $this->Form->input($field->name, ['type' => $field->type]);
                    break;
            }
        }

        $output .= $this->Form->button(__("Submit"));
        $output .= $this->Form->end();

        return $output;
    }

    public function getOptions($field)
    {
        $options = [];

        $options['label'] = $field->description ?? $field->name;
        $options['options'] = $field->getOptions();
        $options['required'] = $field->required;
        
        if(in_array($field->type, ['text', 'textarea', 'date', 'datetime'])){
            $options['type'] = $field->type;
        } else if ($field->type == 'checkbox' && is_array($options['options'])) {
            //$options['type'] = 'select';
            $options['multiple'] = 'checkbox';
            $options['required'] = null;
        } else if ($field->type == 'select') {
            $options['type'] = 'select';
        } else if ($field->type == 'radio') {
            $options['checkboxLabel'] = $options['label'];
            $options['label'] = null;
            
            $options['type'] = 'radio';
        }

        return $options;
    }
}