<?php
	
    namespace marketparser\Models;
    
    use marketparser\App\Curl as Curl;
    use marketparser\App\Config as Config;
    use marketparser\App\Exception\Exception as Exception;
    
    require_once('marketparser/App/Exception/Exception.php');
    require_once('marketparser/Models/ReportsResult.php');
    
    class Reports
    {
        
        public static function Get($params)
        {
 
            if (!isset($params['CompanyId'])){
                
                Exception::CatchException('no_company_id_Reports');
                
                return false;
            }

            if (Companies::GetCompanies()->IsCompany($params['CompanyId']) === false){
                
                Exception::CatchException('no_matches_id');
                 
                return false;
            }
            
            $CompanyID = $params['CompanyId'];
            
            if (isset($params['URL'])){
                
                $url = $params['URL'];
                
            } else {
                
                $url = "https://cp.marketparser.ru/api/v2/campaigns/$CompanyID/reports.json";
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
          
            $params_all = [
                'URL' => $url,
                'Method' => $Method,
                'KeyApi' => $KeyApi
            ];
            
            if (isset($params['page'])){
                
                $params_all += ['page' => $params['page']];
            }
            
            $response = Curl::get($params_all)['response'];
            
            if ($response){
                
                return new ReportsResult($response);
                
            }
        }
    }
?>