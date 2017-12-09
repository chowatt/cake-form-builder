<?= $this->Form->create(null);?>
<?php 
foreach($form->fields as $field){
    echo $this->Form->input($field->name, $field->getFormOptions());
}
?>

<?= $this->Form->button(__("Submit"));?>
<?= $this->Form->end();?>
<?php debug($form);?>

