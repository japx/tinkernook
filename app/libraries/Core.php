<?php
/*
* App Core Class
* Creates URL & loads core controller
* URL FORMAT - /controller/method/params
*/

class Core {
    protected $currentController = 'Pages'; // default controller
    protected $currentMethod = 'index'; // default method
    protected $params = []; //save url parameters as an array

    public function __construct(){
        //print_r($this->getUrl()); // checks the url values  
        $url = $this->getUrl();

        // url[0] is the controller, [1] is the method, [2] is the parameter
        if(!empty($_GET['url']) && file_exists('../app/controllers/' . ucwords($url[0]). '.php')){ // checks if the controller exists
            // if exists, set as controller
            $this->currentController = ucwords($url[0]); // this overwrites the default controller
            // unset 0 index
            unset($url[0]); // this removes the controller from the url
        }

        // Require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;
    
        if(isset($url[1])){ // checks if the method exists
            if(method_exists($this->currentController, $url[1])){ // checks if the method exists in the controller
                $this->currentMethod = $url[1]; // this overwrites the default method
                unset($url[1]); // this removes the method from the url
            }
        }

        // Get params
        $this->params = $url ? array_values($url) : []; // this checks if the url is set, if it is, it will set the url as the params, if not, it will set the params as an empty array
        
        // Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }
    

    public function getUrl(){
        if(isset($_GET['url'])){ // checks if url is set
            $url = rtrim($_GET['url'], '/'); // get url values and separate them by slash
            $url = filter_var($url, FILTER_SANITIZE_URL); // this allows you to filter variables as a string or number
            $url = explode('/', $url); // break url into array
            return $url;
        }
    }
}