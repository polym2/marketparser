<?php
	namespace marketparser\Models;
    
    use marketparser\App\Curl as Curl;
    use marketparser\App\Config as Config;
    use marketparser\App\Exception\Exception as Exception;
    
    require_once('marketparser/App/Exception/Exception.php');
    require_once('marketparser/Models/CompaniesResult.php');
    
    class PriceCompany
    {
        public static function SetPrice($params = NULL, $data)
        {   
            if (isset($params['CompanyId'])){
                
                $compId = $params['CompanyId'];
                
                if (isset($params['URL'])){
                
                $url = $params['URL'];
                
                } else {
                    
                    $url = "https://cp.marketparser.ru/api/v2/campaigns/$compId/price.json";
                }
            
            
            
            if (isset($params['Method'])){
                
                $Method = $params['Method'];
                
            } else {
                
                $Method = 'POST';
            }
            
            if (isset($params['KeyApi'])){
                
                $KeyApi = $params['KeyApi'];
                
            } else {
                
                $KeyApi = Config::GetAuthKey();
            }
        } else {
            Exception::CatchException('no_comp_id');
        }
            $params = [
                'URL' => $url,
                'Method' => $Method,
                'KeyApi' => $KeyApi,
                'Data' => $data
            ];
            
            //print_r ($params);
            return Curl::post($params, $data);
            
        }
    }
?>