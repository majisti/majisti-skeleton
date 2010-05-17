<?php

namespace MajistiW\Application;

/**
 * @desc The application's bootstrap
 *
 * @author Steven Rosato
 */
class Bootstrap extends \MajistiP\Application\Bootstrap
{
    /**
     * @desc Runs the bootstrap
     */
    public function run()
    {
        /* short tags for view scripts */
        $this->getResource('view')->setUseStreamWrapper(true);

        $front = $this->getResource('FrontController');
        $front->setDefaultModule('company');
        $front->registerPlugin(new \MajistiW_Plugin_Main());
        
        parent::run();
    }
    
    public function wordpressIntegration()
    {
        require_once APP_LIB . '/models/Integration/Wordpress/Facade.php';
        \MajistiW_Model_Integration_Wordpress_Facade::getInstance()
            ->integrate($this);
    }
}
