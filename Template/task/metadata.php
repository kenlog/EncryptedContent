<div class="page-header">
    <h2><?= t('Encrypted Content') ?></h2>
</div>

<?php if (empty($metadata)): ?>
    <p class="alert"><?= t('No Encrypted Content') ?></p>
<?php else: ?>
    <table class="table-small table-fixed">
    <tr>
        <th class="column-10"><?= t('Project ID') ?></th>
        <th class="column-10"><?= t('Reference') ?></th>
        <th class="column-80"><?= t('Content') ?></th>
        <th class="column-10"><?= t('Action') ?></th>
    </tr>
    <div style="margin-bottom: 20px;">
        <?= $this->modal->small('trash-o', t('Remove everything'), 'EncryptedContentController', 'confirmAllTask', ['plugin' => 'encryptedContent', 'task_id' => $task['id'], 'project_id' => $project['id'], 'name' => $name], false, 'popover') ?>
    </div>
    <?php foreach ($metadata as $name => $value): ?>
    <?php if (!empty($value)): ?>
    <tr>
        <td><?= $project['id'] ?></td>
        <td><?= $name ?></td>
        <td><?= $this->text->markdown($this->EncryptedContentHelper->renderDecrypt($value)) ?></td>
        <td>
            <div class="dropdown">
                <a href="#" class="dropdown-menu dropdown-menu-link-icon"><i class="fa fa-cog"></i><i class="fa fa-caret-down"></i></a>
                <ul>
                    <li>
                        <?= $this->modal->medium('edit', t('Edit'), 'EncryptedContentController', 'editTask', ['plugin' => 'encryptedContent', 'task_id' => $task['id'], 'project_id' => $project['id'], 'name' => $name], false, 'popover') ?>
                    </li>
                    <li>
                        <?= $this->modal->small('remove', t('Remove'), 'EncryptedContentController', 'confirmTask', ['plugin' => 'encryptedContent', 'task_id' => $task['id'], 'project_id' => $project['id'], 'name' => $name], false, 'popover') ?>
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
<?= $this->render('encryptedContent:task/formnew', ['task' => $task, 'project' => $project, 'form_headline' => t('Add Encrypted Content'), 'values' => [] ]) ?>
<?php endif ?>
