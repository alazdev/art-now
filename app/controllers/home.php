<?php

class home extends Controller
{
    public function __construct()
    {
        session_start();
    }

    public function index()
    {
        $data['title'] = 'Halaman Home';

        $this->view('Home/index', $data);
    }
}
