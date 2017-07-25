<?php
	namespace App;
    
    class App
    {
        private $auth_key;
        
        public function BuildRequest($params)
        {
            return "?".http_build_query($params);
        }
    }
?>