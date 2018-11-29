<small>
    <p><b><?= t('Important save this key in a file and keep it confidential you will need to be able to decipher this content in the future.') ?></b></p>
    <?= $this->EncryptedContentHelper->generateNewRandomKey() ?>
</small>