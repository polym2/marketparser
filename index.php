<?php
    
    namespace marketparser\App;
    
	require_once('marketparser/App/Curl.php');
    require_once('marketparser/App/Config.php');
    require_once('marketparser/App/Base/BaseCurl.php');
    require_once('marketparser/Models/Companies.php');
    require_once('marketparser/Models/PriceCompany.php');
    
    //use marketparser\App;
    use marketparser\App\Curl;
    use marketparser\App\Config;
    use marketparser\App\Curl\Base;
    use marketparser\Models\Companies;
    use marketparser\Models\PriceCompany;
    
    Config::SetAuthKey('ZGQ3NDYxNTBjZDRiMTAzM2YyODc0NTczZTZkYzMxMjRkMGIyOWJjZA'); // создаём файл конфигурации
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
    
    print_r(Companies::GetCompanies([
        'KeyApi' => 'ZGQ3NDYxNTBjZDRiMTAzM2YyODc0NTczZTZkYzMxMjRkMGIyOWJjZA'
    ])->All()); // ->Total(), ->Ids()
    */
    
    $data = [["name" => "LG 34UC79G",
            "cost" => 1000],
            ["name" => "Samsung U28E590D",
            "cost" => 700]];
            
    $priceData = [
        'products' => $data
    ];
    
    print_r (PriceCompany::SetPrice([
        
        'CompanyId' => Companies::GetCompanies()->GetIdByName('test')], $priceData));
?>