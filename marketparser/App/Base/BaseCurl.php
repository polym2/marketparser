<?php
	namespace marketparser\App\Base;
    
    class BaseCurl
    {

        public static function curl_base($params = NULL, $data = NULL)
        {
           //print_r ($params);
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
                        
                        $url .= '?per_page'.$params['per_page'];
                    }
                    
                    if (isset($params['page'])){
                        
                        $url .= '?page'.$params['page'];
                    }
                            
                    if (isset($params['Method']) AND strtoupper($params['Method']) == 'GET'){
                        
                        $options = $base_options + [
                            CURLOPT_URL => $url,
                            CURLOPT_HTTPHEADER => $headers,
                            CURLOPT_CAINFO => getcwd() . "\cacert.pem"
                        ];
                        
                    }
                    
                    if (isset($params['Method']) AND strtoupper($params['Method']) == 'POST' AND $data != NULL){
                        
                        $options = $base_options + [
                            CURLOPT_URL => $url, 
                            CURLOPT_HTTPHEADER => $headers,
                            CURLOPT_POSTFIELDS => json_encode($data), 
                            CURLOPT_POST => true,
                            CURLOPT_CAINFO => getcwd() . "\cacert.pem"
                        ];
                        
                    }
                    
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