<?php
	namespace marketparser\Models;
        
    use marketparser\App\Curl as Curl;
    use marketparser\App\Config as Config;
    use marketparser\App\Exception\Exception as Exception;
    
    require_once('marketparser/App/Exception/Exception.php');
    require_once('marketparser/Models/GetInfoPriceResult.php');
    
    class GetInfoPrice
    {
        public static function PriceInfo($params)
        {
            if (isset($params['CompanyId'])){
                
                    $CompanyID = $params['CompanyId'];
                
                if (isset($params['URL'])){
                    
                    $url = $params['URL'];
                    
                } else {
                    
                    $url = "https://cp.marketparser.ru/api/v2/campaigns/$CompanyID/price.json";
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
                    
                    return new GetInfoPriceResult($response);
                
                }
            
            } else {
                
                Exception::CatchException('no_company_id_GetInfoPrice');
                
            }
        }
    }
?>