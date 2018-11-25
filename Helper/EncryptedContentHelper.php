<?php

namespace Kanboard\Plugin\EncryptedContent\Helper;

require_once __DIR__.'/../vendor/autoload.php';

include '/var/www/html/key.php';


use Kanboard\Core\Base;
use Defuse\Crypto\Key;
use Defuse\Crypto\Crypto;

/**
 * 
 * EncryptedContent helper
 * @author  Valentino Pesce
 *
 */
class EncryptedContentHelper extends Base
{
    
    protected function loadEncryptionKeyFromConfig()
    {
        $keyAscii = rtrim(KEY);
        return Key::loadFromAsciiSafeString($keyAscii);
    }

    /**
     * Display a textarea
     *
     * @access public
     * @param  string  $name        Field name
     * @param  array   $values      Form values
     * @param  array   $attributes  HTML attributes
     * @param  string  $class       CSS class
     * @return string
     */

    public function renderEncryptedTextarea($name, $values = array(), array $attributes = array(), $class = '')
    {
        if ($values[$name] == null) {
            $content = null;
        } elseif (ctype_xdigit($values[$name])) {
			$content = Crypto::decrypt($values[$name], $this->loadEncryptionKeyFromConfig());
		} elseif ($values[$name]) {
            $content = Crypto::encrypt($values[$name], $this->loadEncryptionKeyFromConfig());
        }
        $html  = '<textarea name="'.$name.'" id="form-'.$name.'-test" class="'.$class.'" ';
        $html .= implode(' ', $attributes).'>';
        $html .= isset($content) ? $content : '';
        $html .= '</textarea>';
        return $html;
    }

    public function renderDecrypt($value)
    {
        if (ctype_xdigit($value)) {
            return Crypto::decrypt($value, $this->loadEncryptionKeyFromConfig());
        }
        return t('Attention unencrypted content!');
    }

    public function EncryptedValue($value)
    {
        if ($value) {
            return Crypto::encrypt($value, $this->loadEncryptionKeyFromConfig());
        }
    }

}
