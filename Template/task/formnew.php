<h2><?= $form_headline ?></h2>
<small>
    <button id="randomKey" class="btn btn-blue" data-clipboard-text="<?= $this->EncryptedContentHelper->generateNewRandomKey() ?>" style="margin-bottom:10px"><?= t('Copy random key') ?></button>
    <button id="randomKey" class="btn btn-red" data-clipboard-text="<?= t('The key has been removed from the clipboard') ?>" style="margin-bottom:10px"><?= t('Remove key from clipboard') ?></button>
    <p class="alert"><b><?= t('Save this key in a password manager to keep it confidential and use it to read the encrypted content in the future.') ?></b></p>
</small>
<form method="post" action="<?= $this->url->href('EncryptedContentController', 'saveTask', ['plugin' => 'encryptedContent', 'task_id' => $task['id'], 'project_id' => $project['id']]) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>
    <div>
        <?= $this->form->label(t('Key'), 'key') ?>
        <?= $this->EncryptedContentHelper->input('password','key', $values, ['required', 'placeholder="'.t('Paste key').'"']) ?> 
    </div>
    <div>
        <?= $this->form->label(t('Content'), 'Content') ?>
        <?= $this->EncryptedContentHelper->renderEncryptedtextEditor('value', $values, ['required', 'placeholder="'.t('Content').'"']) ?>
    </div>
    <input type="submit" value="<?= t('Save') ?>" class="btn btn-blue"/>
</form>
