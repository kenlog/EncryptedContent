<?php

namespace Kanboard\Plugin\EncryptedContent;

use Kanboard\Core\Plugin\Base;


class Plugin extends Base
{
    public function initialize()
    {
        //Helpers
        $this->helper->register('EncryptedContentHelper', 'Kanboard\Plugin\EncryptedContent\Helper\EncryptedContentHelper');
        //Task
        $this->template->hook->attach('template:task:sidebar:information', 'EncryptedContent:task/sidebar');
        $this->template->hook->attach('template:task:details:bottom', 'EncryptedContent:task/metasummary');
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