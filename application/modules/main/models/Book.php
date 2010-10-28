<?php

namespace MyApp\Main\Model;

use \Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="myapp_main_book")
 */
class Book
{
    /**
     * @Id @Column(name="id", type="integer")
     * @GeneratedValue
     * @var int
     */
    private $_id;

    /**
     * @Column(name="title", type="string")
     * @var string
     */
    private $_title;

    /**
     * @Column(name="publication_year", type="integer")
     * @var string
     */
    private $_publicationYear;

    /**
     * @ManyToMany(targetEntity="\MyApp\Model\Article", cascade={"all"})
     * @JoinTable(name="myapp_book_articles",
     *     joinColumns={@JoinColumn(name="book_id", referencedColumnName="id")},
     *     inverseJoinColumns={@JoinColumn(name="article_id",
     *         referencedColumnName="id", unique="true")}
     * )
     *
     * @var ArrayCollection
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
     * @param \MyApp\Model\Article $article
     */
    public function addArticle(\MyApp\Model\Article $article)
    {
        $this->_articles->add($article);
    }
}
