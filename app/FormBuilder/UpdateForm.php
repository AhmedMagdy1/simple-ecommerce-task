<?php


namespace App\FormBuilder;


class UpdateForm extends Form
{
    protected $data;

    public function __construct()
    {
        $this->isCreate = false;
        $this->title = 'Update';
        $this->method = 'PUT';

    }

    public function all()
    {
        return [
            'title' => $this->title,
            'isCreate' => $this->isCreate,
            'action' => $this->action,
            'method' => $this->method,
            'lookup' => $this->lookups,
            'data' => $this->data
        ];
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }

}
