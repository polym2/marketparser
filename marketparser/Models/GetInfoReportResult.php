<?php

	namespace marketparser\Models;
    
    class GetInfoReportResult
    {
        public $response;
        
        public function __construct($response)
        {
            $this->response = $response;
        }
        
        public function All()
        {
            return $this->response;
        }
        
        public function Status()
        {
            
            return $this->response['status'];
            
        }
        
        public function IsFinished()
        {
            if (isset($this->response['isSuccessfullyFinished'])){
                
                return $this->response['isSuccessfullyFinished'];
                
            } else {
                
                return false;
            }
            
            
        }
        
        public function ErrorProducts()
        {
            
            return $this->response['countErrorProducts'];
            
        }
        
        public function OkProducts()
        {
            
            return $this->response['countOkProducts'];
            
        }
        
            }
?>