<div class="page-header">
    <h2><?= t('Remove all encrypted content') ?></h2>
</div>

<div class="confirm">
    <p class="alert alert-info">
        <?= t('Caution: do you really want to remove all encrypted content?') ?>
    </p>

    <div class="form-actions">
        <?= $this->url->link(t('Yes'), 'EncryptedContentController', 'removeAllTask', ['plugin' => 'encryptedContent', 'task_id' => $task['id'], 'project_id' => $task['project_id']], true, 'btn btn-red') ?>
        <?= t('or') ?>
        <?= $this->url->link(t('Cancel'), 'EncryptedContentController', 'task', ['plugin' => 'encryptedContent', 'task_id' => $task['id'], 'project_id' => $task['project_id']]) ?>
    </div>
</div>
