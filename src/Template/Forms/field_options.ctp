<?= $this->Html->link(__("Add Option"), ['action' => 'option_add', $form->id, $field->id], ['class' => 'btn btn-primary']);?>

<table class="table">
    <tr>
        <th><?= __("Name");?></th>
        <th><?= __("Value");?></th>
        <th align="right"></th>
    </tr>

    <tbody>
    <?php foreach($field->options as $option):?>
        <tr>
            <td><?= h($option->name);?></td>
            <td><?= h($option->value);?></td>
            <td align="right">
                <?= $this->Html->link(__("Edit"), ['action' => 'option_edit', $form->id, $field->id, $option->id]);?>
            </th>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>

<?php debug($form);?>

<?php debug($field);?>