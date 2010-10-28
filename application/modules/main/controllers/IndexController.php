<?php

use MyApp\Main\Model\Book,
    MyApp\Model\Article;

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
//        $mc = $this->_helper->model();
//        /* @var $book Book */
//        $book = $mc->getModel('MyApp\Main\Model\Book'); //auto persisted
//        $book->setTitle('A new book');
//
//        $article = new Article();
//        $article->setTitle("A new article title");
//
//        $book->addArticle($article);
//
//        $mc->flush();
//
//        /* @var $em \Doctrine\ORM\EntityManager */
//        $em = \Zend_Registry::get('Doctrine_EntityManager');
//        $book = $em->find('MyApp\Main\Model\Book', 1);
//
//        \Zend_Debug::dump($book->getArticles()->toArray());

    }
}
