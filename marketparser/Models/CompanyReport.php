<?php
	namespace marketparser\Models;
    
    use marketparser\App\Curl as Curl;
    use marketparser\App\Config as Config;
    use marketparser\App\Exception\Exception as Exception;
    
    require_once('marketparser/App/Exception/Exception.php');
    require_once('marketparser/Models/Companies.php');
    require_once('marketparser/Models/CompanyReportResult.php');
    
    class CompanyReport
    {
        public static function CreateReport($params = NULL)
        {   
            if (!isset($params['CompanyId'])){
                
                Exception::CatchException('no_company_id_CreateReport');
                
                return false;
            }
            
            if (Companies::GetCompanies()->IsCompany($params['CompanyId']) === false){
                
                Exception::CatchException('no_matches_id');
                 
                return false;
                
            }
                
            if (GetInfoPrice::PriceInfo(['CompanyId' => $params['CompanyId']])->IsProcessed() === false){
             
                Exception::CatchException('isSuccessfullyProcessed_false');
                
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
                        
                        $Method = 'POST';
                    }
                    
                    if (isset($params['KeyApi'])){
                        
                        $KeyApi = $params['KeyApi'];
                        
                    } else {
                        
                        $KeyApi = Config::GetAuthKey();
                    }
                    
                    
                    $params = [
                        'URL' => $url,
                        'Method' => $Method,
                        'KeyApi' => $KeyApi,
                    ];
                                //print_r ($params);
                    $response = Curl::post($params)['response'];
                    
                    if ($response){
                        
                        return new CompanyReportResult($response);
                    
                    }
        }
    }
?>