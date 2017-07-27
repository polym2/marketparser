<?php
	namespace marketparser\Models;
    
    use marketparser\App\Curl as Curl;
    use marketparser\App\Config as Config;
    class Companies
    {
        
        public static function GetAllCompanies($params = NULL)
        {   
            if (isset($params['URL'])){
                
                $url = $params['URL'];
                
            } else {
                
                $url = 'https://cp.marketparser.ru/api/v2/campaigns.json';
            }
            
            if (isset($params['Method'])){
                
                $Method = $params['Method'];
                
            } else {
                
                $Method = 'GET';
            }
            
            if (isset($params['KeyApi'])){
                
                $KeyApi = $params['KeyApi'];
                
            } else {
                
                $KeyApi = Config::GetAuthKey();
            }
          
            $params = [
                'URL' => $url,
                'Method' => $Method,
                'KeyApi' => $KeyApi
            ];
            
            //print_r ($params);
            return Curl::get($params);
            
        }
        
        public function GetTotal()
        {
             
        }
    }
?>