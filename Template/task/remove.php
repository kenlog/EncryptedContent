<div class="page-header">
    <h2><?= t('Remove Encrypted Content') ?></h2>
</div>

<div class="confirm">
    <p class="alert alert-info">
        <?= t('Do you really want to remove this Encrypted Content? ') ?>
        <strong><?= t('Reference') ?>: <?= $name; ?></strong>
    </p>

    <div class="form-actions">
        <?= $this->url->link(t('Yes'), 'EncryptedContentController', 'removeTask', ['plugin' => 'encryptedContent', 'task_id' => $task['id'], 'project_id' => $task['project_id'], 'name' => $name], true, 'btn btn-red') ?>
        <?= t('or') ?>
        <?= $this->url->link(t('cancel'), 'EncryptedContentController', 'task', ['plugin' => 'encryptedContent', 'task_id' => $task['id'], 'project_id' => $task['project_id']]) ?>
    </div>
</div>
