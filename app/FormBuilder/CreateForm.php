<?php


namespace App\FormBuilder;


class CreateForm extends Form
{
    public function __construct()
    {
        $this->isCreate = true;
        $this->method = 'POST';
        $this->title = 'Create';
    }

    public function all()
    {
        return [
            'title' => $this->title,
            'isCreate' => $this->isCreate,
            'action' => $this->action,
            'method' => $this->method,
            'lookup' => $this->lookups
        ];
    }

}
