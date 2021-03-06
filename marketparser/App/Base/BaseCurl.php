<?php
	namespace marketparser\App\Base;
    
    use marketparser\App\Exception\Exception as Exception;
    
    require_once('marketparser/App/Exception/Exception.php');
    
    class BaseCurl
    {

        public static function curl_base($params = NULL, $data = NULL)
        {

           
                if(!file_exists(getcwd() . '\cacert.pem') OR !is_file(getcwd() . '\cacert.pem')){
                    
                    Exception::CatchException('no_pem_file');
                    
                    return false;
                }
                
                 $base_options = [
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_SSL_VERIFYPEER => true,
                    CURLOPT_SSL_VERIFYHOST => 2
                ];
                
                if ($params != NULL){

                    $url = $params['URL'];
                    
                    $headers = [
                                'Api-Key: ' . $params['KeyApi'],
                                'Content-Type: application/json',
                                ];
                    
                    if (isset($params['per_page'])){
                        
                        $url .= '?per_page='.$params['per_page'];
                    }
                    
                    if (isset($params['page'])){
                        
                        $url .= '?page='.$params['page'];
                    }
                            
                    if (isset($params['Method']) AND strtoupper($params['Method']) == 'GET'){
                        
                        $options = $base_options + [
                            CURLOPT_URL => $url,
                            CURLOPT_HTTPHEADER => $headers,
                            CURLOPT_CAINFO => getcwd() . "\cacert.pem",
                        ];
                        
                    }
                    
                    if (isset($params['Method']) AND strtoupper($params['Method']) == 'POST'){
                        
                        $options = $base_options + [
                            CURLOPT_URL => $url, 
                            CURLOPT_HTTPHEADER => $headers,
                            CURLOPT_POST => true,
                            CURLOPT_CAINFO => getcwd() . "\cacert.pem",
                        ];
                        
                    }
                    if($data !== NULL){
                        
                        $options += [CURLOPT_POSTFIELDS => json_encode($data)];
                        
                    }
        //print_r ($params);           
        //print_r ($options);
                
        $ch = curl_init();
                
                curl_setopt_array($ch, $options);
                
                $data = curl_exec($ch);

                if (curl_error($ch) == true)
                {
                    print_r (curl_error($ch));
                    
                } else {
                    
                    return (json_decode($data, true));
                }
                
        curl_close($ch);
        
            }
        }
    }
?>