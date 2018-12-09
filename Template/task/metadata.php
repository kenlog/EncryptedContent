<div class="page-header">
    <h2><?= t('Encrypted Content') ?></h2> <?= t('Project ID') ?>: <?= $project['id'] ?>
</div>

<?php if (empty($metadata)): ?>
    <p class="alert"><?= t('No Encrypted Content') ?></p>
<?php else: ?>
    <table class="table-small table-fixed">
    <tr>
        <th class="column-10"><?= t('Reference') ?></th>
        <th class="column-60"><?= t('Content') ?></th>
        <th class="column-30"><?= t('Action') ?></th>
    </tr>
    <?php if ($this->user->getRoleName() == t('Project Manager') || $this->user->getRoleName() == t('Administrator')): ?>
    <div style="margin-bottom: 20px;">
        <?= $this->modal->small('trash-o', t('Remove everything'), 'EncryptedContentController', 'confirmAllTask', ['plugin' => 'encryptedContent', 'task_id' => $task['id'], 'project_id' => $project['id'], 'name' => $name], false, 'popover') ?>
    </div>
    <?php endif ?>
    <?php foreach ($metadata as $name => $value): ?>
    <?php if (!empty($value)): ?>
    <tr>
        <td><?= $name ?></td>
        <td><?= $this->text->markdown($this->EncryptedContentHelper->renderDecrypt($value)) ?></td>
        <td>
        <?= $this->modal->medium('unlock', t('Unlock'), 'EncryptedContentController', 'unlockTask', ['plugin' => 'encryptedContent', 'task_id' => $task['id'], 'project_id' => $project['id'], 'name' => $name], false, 'popover') ?>
        <?= $this->modal->medium('edit', t('Edit'), 'EncryptedContentController', 'unlockEditTask', ['plugin' => 'encryptedContent', 'task_id' => $task['id'], 'project_id' => $project['id'], 'name' => $name], false, 'popover') ?>
        <?php if ($this->user->getRoleName() == t('Project Manager') || $this->user->getRoleName() == t('Administrator')): ?>
            <?= $this->modal->small('remove', t('Remove'), 'EncryptedContentController', 'confirmTask', ['plugin' => 'encryptedContent', 'task_id' => $task['id'], 'project_id' => $project['id'], 'name' => $name], false, 'popover') ?>
        <?php endif ?>
        </td>
    </tr>
    <?php endif ?>
    <?php endforeach ?>
    </table>
<?php endif ?>

<?php if ($add_form): ?>
<?= $this->render('encryptedContent:task/formnew', ['task' => $task, 'project' => $project, 'form_headline' => t('Add Encrypted Content'), 'values' => [] ]) ?>
<?php endif ?>
