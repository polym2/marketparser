<?php
	namespace marketparser\Models;
    
    class CompaniesResult
    {
        public $response;
        
        public function __construct($response)
        {
            $this->response = $response;
        }    
        
        public function Total()
        {
             return $this->response['total'];
        }
        
        public function All()
        {
             return $this->response['campaigns'];
        }
        
        public function Ids()
        {   
            $ids = [];
            if (count($this->response['campaigns']) > 0){
                foreach ($this->response['campaigns'] as $val){
                    $ids[] = $val['id'];
                }
            }
            
             return $ids;
        }
        
    }
?>