<?php

namespace Kanboard\Plugin\EncryptedContent;

use Kanboard\Core\Translator;
use Kanboard\Core\Plugin\Base;


class Plugin extends Base
{
    public function initialize()
    {
        if ($this->request->isHTTPS()) {
             //Helpers
            $this->helper->register('EncryptedContentHelper', 'Kanboard\Plugin\EncryptedContent\Helper\EncryptedContentHelper');
            //Task
            $this->template->hook->attach('template:task:sidebar:information', 'EncryptedContent:task/sidebar');
            //Js
            $this->hook->on('template:layout:js', array('template' => 'plugins/EncryptedContent/Assets/js/jquery.copy-to-clipboard.js'));
        } else {
            $this->template->hook->attach('template:task:sidebar:information', 'EncryptedContent:task/sidebarnohttps');
        }
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
        return t('This plugin allows the insertion of text content encrypted in the kanboard database, with the use of random keys, GDPR compliance.');
    }
    public function getPluginAuthor()
    {
        return 'Valentino Pesce';
    }
    public function getPluginVersion()
    {
        return '1.0.1'; 
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
