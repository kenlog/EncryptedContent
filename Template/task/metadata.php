<div class="page-header">
    <h2><?= t('Encrypted Content') ?></h2>
</div>

<?php if (empty($metadata)): ?>
    <p class="alert"><?= t('No Encrypted Content') ?></p>
<?php else: ?>
    <table class="table-small table-fixed">
    <tr>
        <th class="column-20"><?= t('Reference') ?></th>
        <th class="column-70"><?= t('Content') ?></th>
        <th class="column-10"><?= t('Action') ?></th>
    </tr>
    <?php foreach ($metadata as $name => $value): ?>
    <?php if (!empty($value)): ?>
    <tr>
        <td><?= $name ?></td>
        <td><?= $this->EncryptedContentHelper->renderDecrypt($value) ?></td>
        <td>
            <div class="dropdown">
                <a href="#" class="dropdown-menu dropdown-menu-link-icon"><i class="fa fa-cog"></i><i class="fa fa-caret-down"></i></a>
                <ul>
                    <li>
                        <?= $this->modal->small('remove', t('Remove'), 'EncryptedContentController', 'confirmTask', ['plugin' => 'encryptedContent', 'task_id' => $task['id'], 'project_id' => $project['id'], 'name' => $name], false, 'popover') ?>
                    </li>
                    <li>
                        <?= $this->modal->medium('edit', t('Edit'), 'EncryptedContentController', 'editTask', ['plugin' => 'encryptedContent', 'task_id' => $task['id'], 'project_id' => $project['id'], 'name' => $name], false, 'popover') ?>
                    </li>
                </ul>
            </div>
        </td>
    </tr>
    <?php endif ?>
    <?php endforeach ?>
    </table>
<?php endif ?>

<?php if ($add_form): ?>
<?= $this->render('encryptedContent:task/form', ['task' => $task, 'project' => $project, 'form_headline' => t('Add Encrypted Content'), 'values' => [] ]) ?>
<?php endif ?>
