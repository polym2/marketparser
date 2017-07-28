<?php
	
    namespace marketparser\Models;
    
    use marketparser\App\Exception\Exception as Exception;
    
    require_once('marketparser\App\Exception\Exception.php');
    
    class ReportResult{
        
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
        
        public function Products()
        {
            return $this->response['products'];
        }
        
        public function ById($our_id){
            
            if (count($this->Products()) > 0){
                
                foreach ($this->Products() as $val){
                    
                    if ($val['ourId'] == $our_id) {
                        
                        return $val;
                        
                    } 
                }
                
                Exception::CatchException('no_matches_our_id');
            }
            
        }
        
        public function MaxPrice($our_id){
            
            if (count($this->Products()) > 0){
                
                foreach ($this->Products() as $val){
                    
                    if ($val['ourId'] == $our_id) {
                        
                        return $val['maxPrice'];
                        
                    } 
                }
                
                Exception::CatchException('no_matches_our_id');
            }
            
        }
        
        public function MinPrice($our_id){
            
            if (count($this->Products()) > 0){
                
                foreach ($this->Products() as $val){
                    
                    if ($val['ourId'] == $our_id) {
                        
                        return $val['minPrice'];
                        
                    } 
                }
                
                Exception::CatchException('no_matches_our_id');
            }
            
        }
        
        public function AveragePrice($our_id){
            
            if (count($this->Products()) > 0){
                
                foreach ($this->Products() as $val){
                    
                    if ($val['ourId'] == $our_id) {
                        
                        return $val['averagePrice'];
                        
                    } 
                }
                
                Exception::CatchException('no_matches_our_id');
            }
            
        }
        
        public function CountOffers($our_id){
            
            if (count($this->Products()) > 0){
                
                foreach ($this->Products() as $val){
                    
                    if ($val['ourId'] == $our_id) {
                        
                        return $val['countOffers'];
                        
                    } 
                }
                
                Exception::CatchException('no_matches_our_id');
            }
            
        }
        
        public function Offers($our_id){
            
            if (count($this->Products()) > 0){
                
                foreach ($this->Products() as $val){
                    
                    if ($val['ourId'] == $our_id) {
                        
                        return $val['offers'];
                        
                    } 
                }
                
                Exception::CatchException('no_matches_our_id');
            }
            
        }
        
        public function OurCost($our_id){
            
            if (count($this->Products()) > 0){
                
                foreach ($this->Products() as $val){
                    
                    if ($val['ourId'] == $our_id) {
                        
                        return $val['ourCost'];
                        
                    } 
                }
                
                Exception::CatchException('no_matches_our_id');
            }
            
        }
        
        
    }
?>