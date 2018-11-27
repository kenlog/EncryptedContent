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
     * Display a markdown editor
     *
     * @access public
     * @param  string  $name     Field name
     * @param  array   $values   Form values
     * @param  array   $attributes
     * @return string
     */
    public function renderEncryptedtextEditor($name, $values = array(), array $attributes = array())
    {
        if ($values[$name] == null) {
            $content = null;
        } elseif (ctype_xdigit($values[$name])) {
			$content = Crypto::decrypt($values[$name], $this->loadEncryptionKeyFromConfig());
		} elseif ($values[$name]) {
            $content = Crypto::encrypt($values[$name], $this->loadEncryptionKeyFromConfig());
        }
        $params = array(
            'name' => $name,
            'required' => 'required',
            'tabindex' => isset($attributes['tabindex']) ? $attributes['tabindex'] : '-1',
            'labelPreview' => t('Preview'),
            'labelWrite' => t('Write'),
            'placeholder' => t('Write your text in Markdown'),
            'autofocus' => isset($attributes['autofocus']) && $attributes['autofocus'],
            'suggestOptions' => array(
                'triggers' => array(
                    '#' => $this->helper->url->to('TaskAjaxController', 'suggest', array('search' => 'SEARCH_TERM')),
                )
            ),
        );

        if (isset($values['project_id'])) {
            $params['suggestOptions']['triggers']['@'] = $this->helper->url->to('UserAjaxController', 'mention', array('project_id' => $values['project_id'], 'search' => 'SEARCH_TERM'));
        }

        $html = '<div class="js-text-editor" data-params=\''.json_encode($params, JSON_HEX_APOS).'\'>';
        $html .= '<script type="text/template">'.$content.'</script>';
        $html .= '</div>';

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
