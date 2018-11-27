<h2><?= $form_headline ?></h2>
<form method="post" action="<?= $this->url->href('EncryptedContentController', 'updateTask', ['plugin' => 'encryptedContent', 'task_id' => $task['id'], 'project_id' => $project['id']]) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>
        <?= $this->form->input('hidden', 'name', $values, [], ['placeholder="'.t('Name').'"']) ?>
    <div>
        <?= $this->form->label(t('Content'), 'Content') ?>
        <?= $this->EncryptedContentHelper->renderEncryptedtextEditor('value', $values, ['required', 'placeholder="'.t('Content').'"']) ?>
    </div>
    <input type="submit" value="<?= t('Save') ?>" class="btn btn-blue"/>
</form>
