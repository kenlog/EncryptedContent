<h2><?= $form_headline ?></h2>
<form method="post" action="<?= $this->url->href('EncryptedContentController', 'saveTask', ['plugin' => 'encryptedContent', 'task_id' => $task['id'], 'project_id' => $project['id']]) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>
    <div>
        <?= $this->form->label(t('Key'), 'key') ?>
        <?= $this->EncryptedContentHelper->input('password','key', $values, ['required', 'placeholder="'.t('Key').'"']) ?> <?= $this->modal->mediumButton('key', t('Random key'), 'EncryptedContentController', 'randomKey', ['plugin' => 'encryptedContent', 'task_id' => $task['id'], 'project_id' => $project['id'], 'name' => $name], false, 'popover') ?>
    </div>
    <div>
        <?= $this->form->label(t('Content'), 'Content') ?>
        <?= $this->EncryptedContentHelper->renderEncryptedtextEditor('value', $values, ['required', 'placeholder="'.t('Content').'"']) ?>
    </div>
    <input type="submit" value="<?= t('Save') ?>" class="btn btn-blue"/>
</form>
