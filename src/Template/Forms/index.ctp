<?= $this->Html->link(__("Create Form"), ['action' => 'add'], ['class' => 'btn btn-primary']);?>

<table class="table">
    <tr>
        <th><?= __("Form Name");?></th>
        <th><?= __("Description");?></th>
        <th><?= __("Fields");?></th>
        <th align="right"></th>
    </tr>

    <tbody>
    <?php foreach($forms as $form):?>
        <tr>
            <td><?= h($form->name);?></td>
            <td><?= h($form->description);?></td>
            <td><?= count($form->fields);?></td>
            <td align="right">
                <?= $this->Html->link(__("Fields"), ['action' => 'fields', $form->id]);?>
                <?= $this->Html->link(__("Edit"), ['action' => 'edit', $form->id]);?>
                <?= $this->Html->link(__("Preview"), ['action' => 'view', $form->id]);?>
                <?= $this->Html->link(__("Responses"), ['action' => 'responses', $form->id]);?>
            </th>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>