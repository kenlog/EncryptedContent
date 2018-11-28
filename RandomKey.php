<?php 

require_once __DIR__.'/vendor/autoload.php';

use Defuse\Crypto\Key;

class RandomKey 
{
    public function generateNewRandomKey()
    {
        echo '<p><b>';
        echo 'Save the output to a configuration file, say in /var/www/html/key.php';
        echo '<br>';
        echo 'if your path is different, remember to change it to line 7 of the EncryptedContentHelper.php file.';
        echo '</b></p>';
        $key = Key::createNewRandomKey();
        echo $key->saveToAsciiSafeString(), "\n";
    }
}

$randomKey = new RandomKey;
$randomKey->generateNewRandomKey();