<?php

namespace Kanboard\Plugin\EncryptedContent\Schema;

use PDO;

const VERSION = 1;

function version_1(PDO $pdo)
{
    $pdo->exec("CREATE TABLE IF NOT EXISTS task_has_encrypted_content (
        task_id INTEGER NOT NULL,
        name INTEGER PRIMARY KEY,
        value TEXT,
        changed_by INTEGER NOT NULL DEFAULT 0,
        changed_on INTEGER NOT NULL DEFAULT 0
      )
    ");
}
