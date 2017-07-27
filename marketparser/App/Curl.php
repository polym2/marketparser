<?php
	namespace marketparser\App;
    
    require_once('marketparser/App/Base/BaseCurl.php');
    
    use marketparser\App\Base\BaseCurl;
    
    class Curl extends BaseCurl
   
    {

        public static function post($params = [], $data)
        {
            print_r ($params);
            return BaseCurl::curl_base($params, $data);
        }
        
        public static function get($params = [])
        {
            return BaseCurl::curl_base($params);
        }
        
    }
?>