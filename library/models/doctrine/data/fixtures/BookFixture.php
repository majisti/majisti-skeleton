<?php

namespace MyApp\Model\Doctrine\Fixtures;

use \Doctrine\Common\DataFixtures;

class BookFixture implements DataFixtures\FixtureInterface
{
    public function load($manager)
    {
        $book = new \MyApp\Main\Model\Book();
        $book->setTitle('A fixture book');
        $book->setPublicationYear(2010);

        $article = new \MyApp\Model\Article();
        $article->setTitle('A fixture article');

        $book->addArticle($article);

        $manager->persist($book);
        $manager->flush();
    }
}
