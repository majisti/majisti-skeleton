<?php

namespace MajistiT\Application;

/**
 * @desc The application's bootstrap
 *
 * @author Majisti
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
        $front->registerPlugin(new \MajistiT\Plugin\Main());

        parent::run();
    }
}
