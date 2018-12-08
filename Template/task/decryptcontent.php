    <h2><?= $form_headline ?></h2>
        <?= $this->form->hidden('name', $values) ?>
    <div>
        <?= $this->form->hidden('key', $values) ?>
    </div>
    <div>
        <?= $this->text->markdown($this->EncryptedContentHelper->renderDecrypt($values['value'])) ?>
    </div>

