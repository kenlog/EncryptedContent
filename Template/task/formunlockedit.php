<h2><?= $form_headline ?></h2>
<form method="post" action="<?= $this->url->href('EncryptedContentController', 'editTask', ['plugin' => 'encryptedContent', 'task_id' => $task['id'], 'project_id' => $project['id']]) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>
        <?= $this->form->hidden('name', $values) ?>
    <div style="margin-bottom:20px">
        <?= $this->form->label(t('Key'), 'key') ?>
        <?= $this->EncryptedContentHelper->input('password','key', $values, ['autofocus', 'required', 'placeholder="'.t('Key').'"']) ?>
    </div>
    <input type="submit" value="<?= t('Unlock') ?>" class="btn btn-blue"/>
</form>
