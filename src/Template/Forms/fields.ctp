<?= $this->Html->link(__("Add Field"), ['action' => 'field_add', $form->id], ['class' => 'btn btn-primary']);?>

<table class="table">
    <tr>
        <th><?= __("Form Name");?></th>
        <th><?= __("Description");?></th>
        <th><?= __("Required");?></th>
        <th><?= __("Type");?></th>
        <th><?= __("Options");?></th>
        <th align="right"></th>
    </tr>

    <tbody>
    <?php foreach($form->fields as $field):?>
        <tr>
            <td><?= h($field->name);?></td>
            <td><?= h($field->description);?></td>
            <td><?= $field->required;?></td>
            <td><?= $field->type;?></td>
            <td><?= count($field->field_options);?></td>
            <td align="right">
                <?php
                    if($field->hasOptions()){
                        echo $this->Html->link(__("Options"), ['action' => 'field_options', $form->id, $field->id]);
                    }
                ?>
                <?= $this->Html->link(__("Edit"), ['action' => 'field_edit', $form->id, $field->id]);?>
            </th>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>

<?php debug($form);?>