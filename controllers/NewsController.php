<?php

namespace controllers;

use Library\AppClass;

class NewsController
{
    public function index($id = '')
    {
        var_dump(get_class_vars(AppClass::class));
        echo 'Hi News';
    }
    public function create()
    {
        echo 'Hello News/create';
    }
    public function home()
    {
        echo 'Hello Home!';
    }
    public function show($id)
    {
        $id = $id[0];
        echo 'Hello Show!';
        echo 'Your id: ' . $id;
    }
    public function edit()
    {
        echo 'Hello edit!';
    }
}