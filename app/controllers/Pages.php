<?php

// Load the model and the view
class Pages extends Controller{ 
    public $userModel;
    public function __construct(){
        $this->userModel = $this->model('User');
    }

    public function index(){
        $users = $this->userModel->getUsers();
        $data = [
            'title' => 'Home Page',
            'users' => $users
        ];
        $this->view('pages/index', $data);
    }

    public function about(){
        $this->view('pages/about');
    }
}
