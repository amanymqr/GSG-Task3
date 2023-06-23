<?php

namespace Task;


class Course
{
    public $id;
    public $name;

    public function __construct($name)
    {
        $this->id = uniqid();
        $this->name = $name;
    }
}
