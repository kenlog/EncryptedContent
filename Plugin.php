<?php

namespace Kanboard\Plugin\EncryptedContent;

use Kanboard\Core\Translator;
use Kanboard\Core\Plugin\Base;


class Plugin extends Base
{
    public function initialize()
    {
        //Helpers
        $this->helper->register('EncryptedContentHelper', 'Kanboard\Plugin\EncryptedContent\Helper\EncryptedContentHelper');
        //Task
        $this->template->hook->attach('template:task:sidebar:information', 'EncryptedContent:task/sidebar');
        //Js
        $this->hook->on('template:layout:js', array('template' => 'plugins/EncryptedContent/Assets/js/jquery.copy-to-clipboard.js'));
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }

    public function getClasses()
    {
        return [
            'Plugin\EncryptedContent\Model' => [
                'EncryptedContentModel',
            ],
        ];
    }

    public function getPluginName()
    {
        return 'EncryptedContent';
    }
    public function getPluginDescription()
    {
        return t('Encrypted Content.');
    }
    public function getPluginAuthor()
    {
        return 'Valentino Pesce';
    }
    public function getPluginVersion()
    {
        return '1.0.0'; 
    }
    public function getCompatibleVersion()
    {
        return '>=1.0.48';
    }
    public function getPluginHomepage()
    {
        return 'https://github.com/kenlog/EncryptedContent';
    }

}