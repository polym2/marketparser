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
                if ($code == 'no_company_id_GetInfoPrice') echo "<br>Не передан обязательный параметр CompanyId при попытке получения информации о прайсе";
                if ($code == 'no_company_id_CreateReport') echo "<br>Не передан обязательный параметр CompanyId при попытке создания отчёта";
                if ($code == 'isSuccessfullyProcessed_false') echo "<br>Кампания не обработана в системе isSuccessfullyProcessed = false";
                
                if ($code == 'no_company_id_GetInfoReport') echo "<br>Не передан обязательный параметр CompanyId при получении информации об отчёте";
                if ($code == 'no_report_id_GetInfoReport') echo "<br>Не передан обязательный параметр ReportId при получении информации об отчёте";
                if ($code == 'no_company_id_GetReport') echo "<br>Не передан обязательный параметр CompanyId при получении отчёта";
                if ($code == 'no_report_id_GetReport') echo "<br>Не передан обязательный параметр ReportId при получении отчёта";
                if ($code == 'no_matches_our_id') echo "<br>Не найдено переданного ourID товара при получении отчёта товара";
                if ($code == 'no_FINISHED') echo "<br>Запрашиваемый отчёт не готов";
                if ($code == 'no_pem_file') echo "<br>Нет *.pem файла" . getcwd() . '\cacert.pem';
                if ($code == 'no_readable_catalog') echo "<br>Установите права на запись для каталога " . getcwd() . '/marketparser/Config';
                
            } else {
                echo '<br>Неверный вызов обработчика ошибок';
            }
              


        }
    }
    
?>