<?php if ($this->user->hasProjectAccess('metadata', 'index', $task['project_id'])): ?>
    <ul>
        <li>
        <i class="fa fa-lock fa-fw"></i>
        <?= $this->url->link(t('Encrypted Content'), 'EncryptedContentController', 'task', ['plugin' => 'encryptedContent', 'task_id' => $task['id'], 'project_id' => $task['project_id']]) ?>
        </li>
    </ul>
<?php endif ?>
