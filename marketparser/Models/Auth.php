<?php
	namespace marketparser\Models;
    
    use marketparser\App\Curl as Curl;
    
    require_once('marketparser/App/Curl.php');
    
    class Auth
    {

        private $path_config;
        
        public function __construct($auth_key = NULL)
        {   
                $this->path_config = getcwd() . '/marketparser/Config/config.php';
                
                if (!file_exists($this->path_config)){
                    
                    $config = ['auth_key' => $auth_key];
            
                    $text = '<?php return '.var_export($config, TRUE).';';
                
                    file_put_contents($this->path_config, $text);
                    
                }
                
            return $this;
        }
        
        public function auth_key()
        {
            $config = include($this->path_config);
            
            return $config['auth_key'];
        }
        
        public function test_auth()
        {
            $url = 'https://cp.marketparser.ru/api/v2/me/plan.json';
            
            $test_auth = new Curl();
            
            return $test_auth->get($url, [
                'Method' => 'GET',
            ]);
        }
    }
?>