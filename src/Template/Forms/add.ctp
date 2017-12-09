<?= $this->Form->create($form);?>
<?php
echo $this->Form->input('name', ['label' => __("Name")]);
echo $this->Form->input('description', ['label' => __("Description")]);
echo $this->Form->button(__("Submit"));
?>

<?= $this->Form->end();?>