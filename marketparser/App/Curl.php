<?php
	namespace marketparser\App;
    
    require_once('marketparser/App/Base/BaseCurl.php');
    
    use marketparser\App\Base\BaseCurl;
    
    class Curl extends BaseCurl
   
    {
        
        public function set_headers($auth_key)
        {
            $this->headers = 'Api-Key: ' . $auth_key . ',' . 'Content-Type: application/json';
        }
        
        public function post($url, $params = [], $data)
        {
            BaseCurl::curl_base($url, $params, $data);
        }
        
        public function get($url, $params = [])
        {
            BaseCurl::curl_base($url, $params);
        }
        
    }
?>