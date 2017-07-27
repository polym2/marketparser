<?php
	namespace marketparser\Models;
    
    class CompaniesResult
    {
        public $response;
        
        public function __construct($response)
        {
            $this->response = $response;
        }    
        
        public function GetTotal()
        {
             return $this->response['total'];
        }
    }
?>