<?php

namespace MyApp\Model;

/**
 * @entity
 * @table(name="myapp_article")
 */
class Article
{
    /**
     * @id @column(name="id", type="integer")
     * @generatedValue
     */
    private $_id;

    /**
     * @column(name="title", type="string")
     */
    private $_title;

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
}
