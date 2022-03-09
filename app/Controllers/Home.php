<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
    public function template()
    {

        return view('layout/template');
    }

    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard',
            'data' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati doloribus, eligendi magni fugit temporibus quo atque id dignissimos incidunt mollitia quos ratione placeat cumque eos quasi neque rerum, minima rem.'
        ];
        return view('index', $data);
    }
}
