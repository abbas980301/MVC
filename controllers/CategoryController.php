<?php

namespace controllers;

use Library\AppClass;

class CategoryController
{
    public function index()
    {
        var_dump(get_class_vars(AppClass::class));
        echo 'hi we are in fa';
    }

    public function create()
    {
        echo 'form';
    }
}