<?php 
$metadata = $this->task->encryptedContentModel->getAll($task['id']);
?>
<?php if (!empty($metadata)): ?>
    <section class="accordion-section" style="margin-top: 10px;">
        <div class="accordion-title">
            <h3><a href="#" class="fa accordion-toggle"></a><?= t('&nbsp;Encrypted Content') ?></h3>
        </div>
        <div class="accordion-content">
            <article class="markdown">
                <p>
                <?php foreach ($metadata as $name => $value): ?>
                    <?= $this->EncryptedContentHelper->renderDecrypt($value) ?> <br>
                <?php endforeach ?>
                </p>
            </article>
        </div>
    </section>
<?php endif ?>

