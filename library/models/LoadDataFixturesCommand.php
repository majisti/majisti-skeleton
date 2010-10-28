<?php

namespace MyApp\Model;

use Symfony\Component\Console\Input\InputArgument,
    Symfony\Component\Console\Input\InputOption,
    Symfony\Component\Console,
    Doctrine\Common\DataFixtures as DataFixtures;

class LoadDataFixturesCommand extends Console\Command\Command
{
    /**
     * @see Console\Command\Command
     */
    protected function configure()
    {
        $this
            ->setName('orm:schema-tool:load-fixtures')
        ->setDescription('Load data fixtures into the database')
        ->setDefinition(array(
        ))
        ->setHelp(<<<EOT
Load data fixtures into the database
EOT
        );
    }

    /**
     * @see Console\Command\Command
     */
    protected function execute(Console\Input\InputInterface $input, Console\Output\OutputInterface $output)
    {
        $em     = \Zend_Registry::get('Doctrine_EntityManager');
        $loader = new DataFixtures\Loader();
        $purger = new DataFixtures\Purger\ORMPurger($em);

        $loader->loadFromDirectory(MA_APP . '/library/models/doctrine/data/fixtures');
        $executor = new DataFixtures\Executor\ORMExecutor($em, $purger);

        $executor->execute($loader->getFixtures());

        $output->write(sprintf('%d fixtures loaded!',
            count($loader->getFixtures())) . PHP_EOL);
    }
}
