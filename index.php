<?php
    
    namespace marketparser\App;
    
	require_once('marketparser/App/Curl.php');
    require_once('marketparser/App/Config.php');
    require_once('marketparser/App/Base/BaseCurl.php');
    require_once('marketparser/Models/Companies.php');
    
    //use marketparser\App;
    use marketparser\App\Curl;
    use marketparser\App\Config;
    use marketparser\App\Curl\Base;
    use marketparser\Models\Companies;
    
    //Config::SetAuthKey('12341234'); // создаём файл конфигурации
    //Config::ResetAuthKey('ZGQ3NDYxNTBjZDRiMTAzM2YyODc0NTczZTZkYzMxMjRkMGIyOWJjZA'); // изменяем ключ на правильный
    echo '<pre>';
    //тестируем авторизацию
    /*
    Параметры:
    'URL' => $url, (Не обязательный)
    'Method' => $Method, (Не обязательный)
    'KeyApi' => $KeyApi (Не обязательный)
    */
    
    /* Можно запускать так, тогда ненужен SetAuthKey()
    print_r (Companies::GetAllCompanies([
        'KeyApi' => 'ZGQ3NDYxNTBjZDRiMTAzM2YyODc0NTczZTZkYzMxMjRkMGIyOWJjZA'
    ]));
    */
    print_r (Companies::GetAllCompanies([
        'KeyApi' => 'ZGQ3NDYxNTBjZDRiMTAzM2YyODc0NTczZTZkYzMxMjRkMGIyOWJjZA'
    ]));

    
?>