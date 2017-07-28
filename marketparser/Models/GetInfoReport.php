<?php
	
    namespace marketparser\Models;
    
    use marketparser\App\Curl as Curl;
    use marketparser\App\Config as Config;
    use marketparser\App\Exception\Exception as Exception;
    
    require_once('marketparser/App/Exception/Exception.php');
    require_once('marketparser/Models/GetInfoReportResult.php');
    
    class GetInfoReport
    {
        public static function InfoReport($params = NULL)
        {   
            //print_r ($params);
            if (!isset($params['CompanyId'])){
                
                Exception::CatchException('no_company_id_GetInfoReport');
                
                return false;
            }
            
            if (!isset($params['ReportId'])){
                
                Exception::CatchException('no_report_id_GetInfoReport');
                
                return false;
            }
            
            if (Companies::GetCompanies()->IsCompany($params['CompanyId']) === false){
                
                Exception::CatchException('no_matches_id');
                 
                return false;
                
            }
            
            $CompanyID = $params['CompanyId'];
            
            $ReportID = $params['ReportId'];
                
            if (isset($params['URL'])){
                
                $url = $params['URL'];
                
            } else {
                
                $url = "https://cp.marketparser.ru/api/v2/campaigns/$CompanyID/reports/$ReportID.json";
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
            
            return new GetInfoReportResult($response);
        }
    }
?>