<?php
	
    namespace marketparser\Models;
    
    use marketparser\App\Curl as Curl;
    use marketparser\App\Config as Config;
    use marketparser\App\Exception\Exception as Exception;
    
    require_once('marketparser/App/Exception/Exception.php');
    require_once('marketparser/Models/ReportResult.php');
    require_once('marketparser/Models/GetInfoReport.php');
    
    class Report
    {
        public static function Get($params)
        {
            if (!isset($params['CompanyId'])){
                
                Exception::CatchException('no_company_id_GetReport');
                
                return false;
            }
            
            if (!isset($params['ReportId'])){
                
                Exception::CatchException('no_report_id_GetReport');

                return false;
            }
            
            if (!GetInfoReport::InfoReport([
                'ReportId' => $params['ReportId'],
                'CompanyId' => $params['CompanyId']
            ])->IsFinished()){
                    
                Exception::CatchException('no_FINISHED');
                    
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
                
                $url = "https://cp.marketparser.ru/api/v2/campaigns/$CompanyID/reports/$ReportID/results.json";
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
            
            if (isset($params['per_page'])){
                
                $params_all += ['per_page' => $params['per_page']];
            }
            
            if (isset($params['page'])){
                
                $params_all += ['page' => $params['page']];
            }
            
            $response = Curl::get($params_all)['response'];
            
            return new ReportResult($response);
        
        }
    } 
?>