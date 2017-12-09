<table class="table">
    <tr>
        <th><?= __("Form Name");?></th>
        <th><?= __("Description");?></th>
        <th><?= __("Fields");?></th>
        <th align="right"></th>
    </tr>

    <tbody>
    <?php foreach($responses as $response):?>
        <tr>
            <td><?= h($response->created);?></td>
            <?php foreach($response->response_fields as $responseField):?>
                <td><?= $responseField->getValue();?></td>
            <?php endforeach;?>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>

<?php debug($form); debug($responses);