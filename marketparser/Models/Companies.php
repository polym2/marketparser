<?php
	namespace marketparser\Models;
    
    use marketparser\App\Curl as Curl;
    
    class Companies
    {
        public $url = 'https://cp.marketparser.ru/api/v2/campaigns.json';
        
        public function all_companies($params = NULL)
        {
            
            $companies = new Curl();
            
            return  $companies->get($this->url, [
            
                'Method' => 'GET',
                
            ]);
            
            
        }
    }
?>