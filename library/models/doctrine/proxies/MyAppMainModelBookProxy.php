<?php

namespace MyApp\Proxies;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class MyAppMainModelBookProxy extends \MyApp\Main\Model\Book implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    private function _load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    
    public function getTitle()
    {
        $this->_load();
        return parent::getTitle();
    }

    public function setTitle($title)
    {
        $this->_load();
        return parent::setTitle($title);
    }


    public function __sleep()
    {
        return array('__isInitialized__', '_id', '_title');
    }
}