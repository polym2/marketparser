<?php
	
    namespace marketparser\Models;
    
    use marketparser\App\Exception\Exception as Exception;
    
    require_once('marketparser\App\Exception\Exception.php');
     
    class ReportsResult
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
        
        public function Total()
        {
            
            return $this->response['total'];
            
        }
        
        public function Reports()
        {
            
            return $this->response['reports'];
            
        }
        
    }
    
    
?>