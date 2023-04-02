<?php

/*
* App Core Class
* Creates URL & loads core controller
* URL FORMAT - /controller/method/params
*/

class Pages extends Controller{ 
    public function __construct(){
        
    }

    public function index(){
        $data = [
            'title' => 'Home Page',
            'name' => 'John Doe'
        ];
        $this->view('pages/index', $data);
    }

    public function about(){
        $this->view('pages/about');
    }
}
