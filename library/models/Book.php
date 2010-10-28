<?php

namespace MyApp\Model;

use \Doctrine\Common\Collections\ArrayCollection;

/**
 * @entity
 * @table(name="myapp_book")
 */
class Book
{
    /**
     * @id @column(name="id", type="integer")
     * @generatedValue
     * @var int
     */
    private $_id;

    /**
     * @column(name="title", type="string")
     * @var string
     */
    private $_title;

    /**
     * @column(name="publication_year", type="integer")
     * @var string
     */
    private $_publicationYear;

    /**
     * @manyToMany(targetEntity="Article", cascade={"all"})
     * @joinTable(name="myapp_book_articles",
     *     joinColumns={@JoinColumn(name="book_id", referencedColumnName="id")},
     *     inverseJoinColumns={@JoinColumn(name="article_id",
     *         referencedColumnName="id", unique="true")}
     * )
     *
     * @var ArrayCollection of Article objects
     */
    private $_articles;

    /**
     * @desc Constructs the book
     */
    public function __construct()
    {
        $this->_articles = new ArrayCollection();
    }

    /**
     * @return string the article title
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @desc Sets the title
     * @param string $title The title
     */
    public function setTitle($title)
    {
        $this->_title = $title;
    }

    /**
     * @desc Returns all the articles for this book.
     *
     * @return ArrayCollection The articles
     */
    public function getArticles()
    {
        return clone $this->_articles;
    }

    /**
     * @desc Sets the publication year
     */
    public function setPublicationYear($publicationYear)
    {
        $this->_publicationYear = $publicationYear;
    }

    /**
     * @desc Adds an article to the book.
     *
     * @param Article $article
     */
    public function addArticle(Article $article)
    {
        $this->_articles->add($article);
    }
}
