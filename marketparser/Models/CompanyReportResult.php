<?php

	namespace marketparser\Models;
    
    class CompanyReportResult
    {
        public $response;
        
        public function __construct($response)
        {
            
            $this->response = $response;
            
        }
        
        public function IdReport()
        {
            
            return $this->response['id'];
            
        }
    }
?>