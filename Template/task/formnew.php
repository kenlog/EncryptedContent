<h2><?= $form_headline ?></h2>
<small>
    <button id="randomKey" class="btn" data-clipboard-text="<?= $this->EncryptedContentHelper->generateNewRandomKey() ?>" style="margin-bottom:10px"><?= t('Random key copy') ?></button>
    <p><b><?= t('Important: saving this key in a file and keeping it confidential will be necessary to decrypt this content in the future.') ?></b></p>
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
