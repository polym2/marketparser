<?php
	namespace marketparser\App\Base;
    
    use marketparser\models\Auth;
    
    require_once('marketparser/Models/Auth.php');
    
    class BaseCurl
    {

        public static function curl_base($url, $params = [], $data = NULL)
        {
           $auth_obj = new Auth();
           $auth_key = $auth_obj->auth_key();
           
            $base_options = [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => true,
                CURLOPT_SSL_VERIFYHOST => 2
            ];
                
                $headers = [
                    'Api-Key: ' . $auth_key,
                    'Content-Type: application/json',
                ];
                
                if (isset($params['Method'])){
                    
                    if ($params['Method'] == 'GET'){
                        
                        $options = $base_options + [
                            CURLOPT_URL => $url,
                            CURLOPT_HTTPHEADER => $headers,
                            CURLOPT_CAINFO => getcwd() . "\cacert.pem"
                        ];
                        
                    }
                    
                    if ($params['Method'] == 'POST' AND $data != NULL){
                        
                        $options = $base_options + [
                            CURLOPT_URL => $url, 
                            CURLOPT_HTTPHEADER => $headers,
                            CURLOPT_POSTFIELDS => json_encode($data), 
                            CURLOPT_POST => true,
                            CURLOPT_CAINFO => getcwd() . "\cacert.pem"
                        ];
                        
                    }
                }
                if (isset($params['per_page'])){
                    $url .= '?per_page'.$params['per_page'];
                }
                if (isset($params['page'])){
                    $url .= '?page'.$params['page'];
                }
                
                // print_r ($options);
                
        $ch = curl_init();
                
                curl_setopt_array($ch, $options);
                
                $data = curl_exec($ch);

                if (curl_error($ch) == true)
                {
                    print_r (curl_error($ch));
                    
                } else {
                    return (json_decode($data));
                }
                
        curl_close($ch);
        
        }
    }
?>