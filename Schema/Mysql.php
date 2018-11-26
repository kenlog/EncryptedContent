<?php

namespace Kanboard\Plugin\EncryptedContent\Schema;

use PDO;

const VERSION = 1;

function version_1(PDO $pdo)
{
    $pdo->exec('ALTER TABLE `task_has_metadata` CHANGE `value` `value` MEDIUMTEXT');
}