<?php

use \Doctrine\DBAL\Migrations\Tools\Console\Command as MigrationCommand,
    \Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once dirname(__DIR__) . '/bootstrap.php';

$manager = $appLoader->createApplicationManager();
$manager->getApplication()->bootstrap();

/* create the cli */
$cli = new Symfony\Component\Console\Application(
    'Doctrine Command Line Interface',
    \Doctrine\ORM\Version::VERSION
);

$cli->setCatchExceptions(true);
$cli->setHelperSet(\Zend_Registry::get('Doctrine_Helperset'));

/* add default commands */
ConsoleRunner::addCommands($cli);

/* add migrations commands */
$cli->addCommands(array(
    new MigrationCommand\DiffCommand(),
    new MigrationCommand\ExecuteCommand(),
    new MigrationCommand\GenerateCommand(),
    new MigrationCommand\MigrateCommand(),
    new MigrationCommand\StatusCommand(),
    new MigrationCommand\VersionCommand()
));

$cli->addCommand(new \MyApp\Model\LoadDataFixturesCommand());

//$command = $cli->getCommand('orm:schema-tool:update');
//\Zend_Debug::dump($command->getName());
//exit;

$cli->run();
