<?php

namespace Kanboard\Plugin\EncryptedContent\Schema;

use PDO;

const VERSION = 1;

function version_1(PDO $pdo)
{

    $pdo->exec("CREATE TABLE IF NOT EXISTS task_has_encrypted_content (
        task_id int(11) NOT NULL,
        name INT PRIMARY KEY AUTO_INCREMENT,
        value mediumtext,
        changed_by int(11) NOT NULL DEFAULT 0,
        changed_on int(11) NOT NULL DEFAULT 0
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8");
}