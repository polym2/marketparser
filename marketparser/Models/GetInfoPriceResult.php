<?php
	namespace marketparser\Models;
    
    use marketparser\App\Exception\Exception as Exception;
    
    require_once('marketparser\App\Exception\Exception.php');
    
    class GetInfoPriceResult
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
        
        public function IsProcessed()
        {
             return $this->response['isSuccessfullyProcessed'];
        }
        
    }
?>