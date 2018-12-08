<small>
    <p><b><?= t('Important: saving this key in a file and keeping it confidential will be necessary to decrypt this content in the future.') ?></b></p>
    <?= $this->EncryptedContentHelper->generateNewRandomKey() ?>
</small>