<?php
	
    namespace marketparser\Models;
    
    class PlanResult
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
        
        public function Name()
        {
            return $this->response['planName'];
        }
        
        public function Units()
        {
            return $this->response['remainingUnits'];
        }
        
        public function Date()
        {
            return $this->response['planExpiresAt'];
        }
    }
?>