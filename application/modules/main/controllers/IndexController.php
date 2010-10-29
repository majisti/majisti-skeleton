<?php

use MyApp\Model\Book,
    MyApp\Model\Article,
    Symfony\Component\DependencyInjection;

/**
 * @desc The index controller.
 *
 * @author Majisti
 */
class IndexController extends Zend_Controller_Action
{
    /**
     * @desc The index action
     */
    public function indexAction()
    {
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $this->_helper->doctrine();

        $book = new Book();
        $book->setTitle('A new book');
        $book->setPublicationYear(2009);

        $em->persist($book);

        $article = new Article();
        $article->setTitle("A new article title");

        $book->addArticle($article);

        $em->flush();

        /* @var $repo \MyApp\Model\BookRepository */
        $repo = $em->getRepository('MyApp\Model\Book');
        $books = $repo->getRecentBooks();

        $this->books = $books;
    }

    public function fooAction()
    {
        //MC UC-01
        /* @var $mc \Majisti\Model\Container */
//        $mc = $this->_helper->model();
//        $mc->setAutomaticPersistenceEnabled(true);
//
//        $mc->addModel('book', 'default', 'MyApp\Model\Book');
//
//        $book = $mc->getModel('book');
//
//        $book->setTitle('A book');
//        $book->setPublicationYear(2011);
//
//        $mc->save();

        //Doctrine UC-02
        /* @var $em = \Doctrine\ORM\EntityManager */
//        $em = $this->_helper->doctrine();
//
//        $book = new \MyApp\Model\Book();
//        $em->persist($book);
//
//        $book->setTitle('foo');
//        $book->setPublicationYear(2012);
//
//        $em->flush();

        //MC UC-03
//        $mc->addModel('book', 'default', 'MyApp\Model\Book');

        //...

//        $mc->find('book', 3);
//        $mc->createNew('book');

//        $mc->getRepository('book')->createQuery('...');

        $sc = new DependencyInjection\ContainerBuilder();
        $sc->register('book', 'MyApp\Model\Book');

        $book = $sc->get('book');
        $book->setTitle('foo');

        $book2 = $sc->get('book');

        \Zend_Debug::dump($book);
        \Zend_Debug::dump($book2);
    }
}
