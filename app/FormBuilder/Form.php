<?php

namespace App\FormBuilder;

abstract class Form
{
    protected $isCreate;
    protected $title;
    protected $action;
    protected $method;
    protected $lookups = [];

    /**
     * @return mixed
     */
    public function getIsCreate()
    {
        return $this->isCreate;
    }

    /**
     * @param mixed $isCreate
     */
    public function setIsCreate($isCreate): void
    {
        $this->isCreate = $isCreate;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method): void
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action): void
    {
        $this->action = $action;
    }

    public function pushLookup($indexName, $array): void
    {
        $this->lookups[$indexName] = $array;
    }

}
