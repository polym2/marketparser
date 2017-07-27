<?php
	namespace marketparser\Models;
    
    use marketparser\App\Exception\Exception as Exception;
    
    require_once('marketparser\App\Exception\Exception.php');
    
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
        
        public function GetIdByName($name)
        {
            if (count($this->response['campaigns']) > 0){
                
                foreach ($this->response['campaigns'] as $val){
                    
                    if ($val['name'] == $name) {
                        
                        return $val['id'];
                        
                    } 
                }
                
                Exception::CatchException('no_matches_name');
            }
        }
        
        public function GetNameById($id)
        {
            if (count($this->response['campaigns']) > 0){
                
                foreach ($this->response['campaigns'] as $val){
                    
                    if ($val['id'] == $id) {
                        
                        return $val['name'];
                        
                    } 
                }
                
                Exception::CatchException('no_matches_id');
            }
        }
        
    }
?>