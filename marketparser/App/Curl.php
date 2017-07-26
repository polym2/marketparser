<?php
	namespace marketparser\App;
    
    require_once('marketparser/App/Base/BaseCurl.php');
    
    use marketparser\App\Base\BaseCurl;
    
    class Curl extends BaseCurl
   
    {
        public function __construct()
        {
            return $this;
        }

        public function post($url, $params = [], $data)
        {
            return BaseCurl::curl_base($url, $params, $data);
        }
        
        public function get($url, $params = [])
        {
            return BaseCurl::curl_base($url, $params);
        }
        
    }
?>