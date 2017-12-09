<?= $this->Form->create($field);?>

<?php
echo $this->Form->input('form_id', ['type' => 'hidden', 'value' => $form->id]);
echo $this->Form->input('name', ['label' => __("Name")]);
echo $this->Form->input('description', ['label' => __("Description")]);
echo $this->Form->input('type', ['label' => __("Type"),  'type' => 'select', 'options' => $field->types, 'empty' => __("-- Choose a value --")]);
echo $this->Form->input('required', ['label' => __("Required")]);
echo $this->Form->button(__("Submit"));
?>

<?= $this->Form->end();?>