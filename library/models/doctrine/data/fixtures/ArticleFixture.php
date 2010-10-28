<?php

namespace MyApp\Model\Doctrine\Fixtures;

use \Doctrine\Common\DataFixtures;

class ArticleFixture implements DataFixtures\FixtureInterface
{
    public function load($manager)
    {
        $article = new \MyApp\Model\Article();
        $article->setTitle('An unattached article');

        $manager->persist($article);
        $manager->flush();
    }
}