<?php 


    class Router
    
    {

        public $currentController = "LoginController";
        public $currentMethod = "check";
        
        public function __construct()
        
        {
            //Calls getURL function to get the controller and action if changed if not they would not change
            $this->getURL();
            
            require_once'app/controller/'.$this->currentController.'.php';
            
            
            //After calling the getURL function we are creating an object for the current controller
            
            $controller = new $this->currentController;
            
            //calling the method or action if any using call_user_func function we can also add () into the currentMethod and call it normally
            
            call_user_func([$controller, $this->currentMethod]);
            
            
            
        }
        
        public function getURL()
            
        {
            
            if(isset($_GET['url']))
                
            {
                
                $this->currentController = $_GET['url'];
                
                if(isset($_GET['action']))
                    
                {
                    
                    $this->currentMethod = $_GET['action'];
                    
                }
                
            }
            
        }
        
        
    }

    


?>