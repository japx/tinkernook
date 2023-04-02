<?php

// Load the model and the view
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
