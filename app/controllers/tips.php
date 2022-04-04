<?php

class tips extends Controller
{
    public function __construct()
    {
        session_start();
        if(!isset($_SESSION['login'])){$this->route('auth/login');}
    }
    
    public function tips_1(){
        $this->view('dasbor/tips-1');
    }
}
