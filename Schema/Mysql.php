<?php

namespace Kanboard\Plugin\EncryptedContent\Schema;

const VERSION = 1;

function version_1($pdo)
{
    $pdo->exec('ALTER TABLE `task_has_metadata` CHANGE `value` `value` MEDIUMTEXT');
}