<?php if ($this->user->hasProjectAccess('metadata', 'index', $task['project_id'])): ?>
        <li <?= $this->app->checkMenuSelection('EncryptedContentController', 'noHTTPS') ?>>
        <?= $this->url->icon('lock',t('Encrypted Content'), 'EncryptedContentController', 'noHTTPS', ['plugin' => 'encryptedContent', 'task_id' => $task['id'], 'project_id' => $task['project_id']]) ?>
        </li>
<?php endif ?>
