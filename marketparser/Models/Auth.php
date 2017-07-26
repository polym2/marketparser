<?php
	namespace marketparser\Models;
    
    use marketparser\App\Curl as Curl;
    
    require_once('marketparser/App/Curl.php');
    
    class Auth
    {
        public $auth_key = NULL; 
        
        public function __construct($auth_key)
        {   
            $this->auth_key = $auth_key;
            
            return $this;
        }
        
        public function key_api()
        {
            return $this->auth_key;
        }
        
        public function test_auth($auth_key)
        {
            $url = 'https://cp.marketparser.ru/api/v2/me/plan.json';
            
            $test_auth = new Curl();
            
            $test_auth->get($url, [
                'Method' => 'GET',
                'KeyAPI' => $auth_key
            ]);
        }
    }
?>