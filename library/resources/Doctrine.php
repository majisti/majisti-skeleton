<?php

namespace MyApp\Application\Resource;

use Doctrine\ORM\EntityManager,
    Doctrine\ORM\Configuration,
    Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper,
    Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper,
    Symfony\Component\Console\Helper as SymfonyHelper;

class Doctrine extends \Zend_Application_Resource_ResourceAbstract
{
    public function init()
    {
        $bootstrap = $this->getBootstrap();

        $db = $bootstrap->bootstrap('Db')->getResource('Db');

        if( null === $db ) {
            throw new Exception("Db settings must be set in order to
                bootstrap the doctrine resource");
        }

        $config = new Configuration();

        $cache = new \Doctrine\Common\Cache\ArrayCache();
        $config->setMetadataCacheImpl($cache);

        //FIXME: change MA_APP
        $driverImpl = $config->newDefaultAnnotationDriver(array(
            MA_APP . '/library/models',
            MA_APP . '/application/modules/main/models',
        ));
        $config->setMetadataDriverImpl($driverImpl);
        $config->setQueryCacheImpl($cache);
        $config->setProxyDir(MA_APP . '/library/models/doctrine/proxies');
        $config->setProxyNamespace('MyApp\Proxies');
//        $config->setAutoGenerateProxyClasses(true);

        $connectionOptions = array(
            'driver' => 'pdo_mysql',

        ) + $db->getConfig();

        $em = EntityManager::create($connectionOptions, $config);

        $helperSet = new SymfonyHelper\HelperSet(array(
            'db' => new ConnectionHelper($em->getConnection()),
            'em' => new EntityManagerHelper($em),
            'dialog' => new SymfonyHelper\DialogHelper(),
        ));

        \Zend_Registry::set('Doctrine_EntityManager', $em);
        \Zend_Registry::set('Doctrine_Helperset', $helperSet);

        /* inject into the model container and enable automatic persistence */
        $mc = $bootstrap->bootstrap('Modelcontainer')->getResource('modelContainer');
        $mc->setEntityManager($em);
        $mc->setAutomaticPersistenceEnabled(true);

        return $em;
    }
}
