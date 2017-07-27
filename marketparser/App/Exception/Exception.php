<?php
	
    namespace marketparser\App\Exception;
    
    class Exception
    {
        public static function CatchException($code)
        {
            if (isset($code) AND $code != ''){
                if ($code == 1) echo "<br>KeyAPI в файле конфигурации пуст, воспользуйтесь Config::ResetAuthKey('\your_auth_code\')";
                if ($code == 2) echo "<br>Не найден файл конфигурации, воспользуйтесь Config::SetAuthKey('\your_auth_code\')";
                if ($code == 'no_comp_id') echo "<br>Ошибка при отправке прайса кампании. Не указан ID кампании";
                if ($code == 'no_matches_name') echo "<br>Нет кампании с таким именем";
                if ($code == 'no_matches_id') echo "<br>Нет кампании с таким ID";
            } else {
                echo '<br>Неверный вызов обработчика ошибок';
            }
              


        }
    }
    
?>