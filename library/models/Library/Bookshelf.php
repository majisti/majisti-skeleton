<?php

namespace \MyApp\Model\Library;

use Doctrine\Common\Collections\ArrayCollection;

class Bookshelf
{
    private $from;

    private $to;

    /**
     *
     * @var ArrayCollection
     */
    private $books;

    public function addBook(\MyApp\Model\Book $book)
    {
        $this->books->add($book);
    }
}