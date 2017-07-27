<?php
	
    namespace marketparser\App\Exception;
    
    class Exception
    {
        public static function CatchException($code)
        {
            if (isset($code) AND $code != ''){
                if ($code == 1) echo "<br>KeyAPI в файле конфигурации пуст, воспользуйтесь Config::ResetAuthKey('\your_auth_code\')";
                if ($code == 2) echo "<br>Не найден файл конфигурации, воспользуйтесь Config::SetAuthKey('\your_auth_code\')";
            } else {
                echo '<br>Неверный вызов обработчика ошибок';
            }
              


        }
    }
    
?>