<?= $this->Form->create($option);?>

<?php
echo $this->Form->input('field_id', ['type' => 'hidden', 'value' => $field->id]);
echo $this->Form->input('name', ['label' => __("Name")]);
echo $this->Form->input('value', ['label' => __("Value")]);
echo $this->Form->button(__("Submit"));
?>

<?= $this->Form->end();?>