<?php
	namespace App\Auth;
    
    use App;
    
    class Auth
    {
        
        public function __construct($auth_key){
            $this->auth_key = $auth_key;
            
        }

    }
?>