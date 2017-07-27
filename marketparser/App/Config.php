<?php
	namespace marketparser\App;
    
    use marketparser\App\Exception\Exception as Exception;
    
    require_once('marketparser\App\Exception\Exception.php');
    
    class Config 
    {
        public static function SetAuthKey($auth_key)
        {
            
            $path_config = getcwd() . '/marketparser/Config/config.php';
                
                if (!file_exists($path_config)){
                    
                    $config = [ 'KeyAPI' => $auth_key , 
                                'PathConfig' => $path_config
                              ];
            
                    $text = '<?php return '.var_export($config, TRUE).';';
                
                    file_put_contents($path_config, $text);
                    
                }
   
       }
        
        public static function GetAuthKey ()
        {
            
            $path_config = getcwd() . '/marketparser/Config/config.php';
            
            if (file_exists($path_config)){
                
                $config = include($path_config); 
                    if (isset($config['KeyAPI']) AND $config['KeyAPI'] != ''){
                        return $config['KeyAPI'];
                    }
                Exception::CatchException(1);
            } else {
                Exception::CatchException(2);
            }
        }
        
        public static function GetPathConfig ()
        {
            $path_config = getcwd() . '/marketparser/Config/config.php';
            
            if (file_exists($path_config)){
                
                $config = include($path_config); 
                
                return $config['PathConfig'];   
            }
        }
        
        public static function ResetAuthKey ($auth_key)
        {
            $path_config = getcwd() . '/marketparser/Config/config.php';
                
                    
                $config = [ 'KeyAPI' => $auth_key , 
                            'PathConfig' => $path_config
                          ];
            
                $text = '<?php return '.var_export($config, TRUE).';';
                
                file_put_contents($path_config, $text);
                    
        }
        
    }
?>