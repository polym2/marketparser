<?php
	namespace marketparser\Models;
    
    use marketparser\App\Curl as Curl;
    use marketparser\App\Config as Config;
    
    require_once('marketparser/Models/CompaniesResult.php');
    
    class Companies
    {
        
        public static function GetCompanies($params = NULL)
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
            $response = Curl::get($params)['response'];
            
            if ($response){
                
                return new CompaniesResult($response);
                
            }
            
        }
        
    }
?>