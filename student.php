<?php

namespace Task;

class Student
{
    public $id;
    public $name;
    public $email;
    public $courses = [];

    public function __construct($name, $email)
    {
        $this->id = uniqid();
        $this->name = $name;
        $this->email = $email;
    }
}
