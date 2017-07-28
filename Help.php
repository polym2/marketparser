<?php
    
    namespace marketparser\App;
    
	require_once('marketparser/App/Curl.php');
    require_once('marketparser/App/Config.php');
    require_once('marketparser/App/Base/BaseCurl.php');
    require_once('marketparser/Models/Companies.php');
    require_once('marketparser/Models/PriceCompany.php');
    require_once('marketparser/Models/GetInfoPrice.php');
    require_once('marketparser/Models/CompanyReport.php');
    require_once('marketparser/Models/GetInfoReport.php');
    require_once('marketparser/Models/Report.php');
    require_once('marketparser/Models/Reports.php');
    require_once('marketparser/Models/Plan.php');
    
    //use marketparser\App;
    use marketparser\App\Curl;
    use marketparser\App\Config;
    use marketparser\App\Curl\Base;
    use marketparser\Models\Companies;
    use marketparser\Models\PriceCompany;
    use marketparser\Models\GetInfoPrice;
    use marketparser\Models\CompanyReport;
    use marketparser\Models\GetInfoReport;
    use marketparser\Models\Report;
    use marketparser\Models\Reports;
    use marketparser\Models\Plan;
    
    echo '<pre>';
    
    //--- CONFIG ---
    //Config::SetAuthKey('test'); // создаём файл конфигурации
    //Config::ResetAuthKey('ZGQ3NDYxNTBjZDRiMTAzM2YyODc0NTczZTZkYzMxMjRkMGIyOWJjZA'); // изменяем ключ на правильный
    //echo Config::GetAuthKey(); //получаем ключ из файла
    //echo Config::GetPathConfig(); //получаем путь к файлу конфигурации
    //--- END CONFIG ---

    //--- COMPANIES ---
    /*
        Передаваемые параметры:
        'URL' => $url, (Не обязательный)
        'Method' => $Method, (Не обязательный)
        'KeyApi' => $KeyApi (Не обязательный если был использован Config::SetAuthKey(<your_auth_key>))
    */
    
    /*
    // --- получение списка компаний с служебными полями (Total) - массив массивов
        Companies::GetAllCompanies([
            'KeyApi' => 'ZGQ3NDYxNTBjZDRiMTAzM2YyODc0NTczZTZkYzMxMjRkMGIyOWJjZA'
        ]);
        Companies::GetAllCompanies();
    // --- END получение списка компаний с служебными полями (Total)
     
    // --- получение списка компаний без служедных полей (Total) - массив массивов
        Companies::GetCompanies()->All();
    
    // --- Получение кол-ва кампаний, поле (Total) - строка
        Companies::GetCompanies()->Total();
        
    // --- Получение списка всех ID кампаний - массив
        Companies::GetCompanies() ->Ids();
    
    // --- Получение ID кампании по её имени - строка
        Companies::GetCompanies() ->GetIdByName(<name>);
        
    // --- Получение имени кампании по её ID - строка
        Companies::GetCompanies() ->GetNameById(<id>);
        
        
    //--- END COMPANIES ---
    
    */
    
    /*
    
    // --- ОБНОВЛЕНИЕ ПРАЙСА КАМПАНИИ 
        Передаваемые параметры:
        'CompanyId' => $CompanyId, (Обязательный)
        'URL' => $url, (Не обязательный)
        'Method' => $Method, (Не обязательный)
        'KeyApi' => $KeyApi (Не обязательный если был использован Config::SetAuthKey(<your_auth_key>))
       
    // --- Получение массива     
    $data = [["name" => "LG 34UC79G",
            "cost" => 1000],
            ["name" => "Samsung U28E590D",
            "cost" => 700]];
            
    $priceData = [
        'products' => $data
    ];
    
    // Обновление прайса
        PriceCompany::SetPrice(['CompanyId' => Companies::GetCompanies()->GetIdByName('test')], $priceData);
        
    // --- END ОБНОВЛЕНИЕ ПРАЙСА КАМПАНИИ
    */ 
    
    /*
    // --- ПОЛУЧЕНИЕ ИНФОРМАЦИИ О ПРАЙСЕ КАМПАНИИ
        Передаваемые параметры:
        'CompanyId' => $CompanyId, (Обязательный)
        'URL' => $url, (Не обязательный)
        'Method' => $Method, (Не обязательный)
        'KeyApi' => $KeyApi (Не обязательный если был использован Config::SetAuthKey(<your_auth_key>))
        
    // Получение всей информации - массив
        GetInfoPrice::PriceInfo(['CompanyId' => Companies::GetCompanies()->GetIdByName('test')])->All();
        
    // Получение статуса, поле status - строка
        GetInfoPrice::PriceInfo(['CompanyId' => Companies::GetCompanies()->GetIdByName('test')])->Status();
        
    // Получение поля isSuccessfullyProcessed - bool
        GetInfoPrice::PriceInfo(['CompanyId' => Companies::GetCompanies()->GetIdByName('test')])->IsProcessed();
        
    // --- END ПОЛУЧЕНИЕ ИНФОРМАЦИИ О ПРАЙСЕ КАМПАНИИ
    */
    
    /*
    // --- СОЗДАНИЕ ОТЧЁТА КАМПАНИИ
        Передаваемые параметры:
        'CompanyId' => $CompanyId, (Обязательный)
        'URL' => $url, (Не обязательный)
        'Method' => $Method, (Не обязательный)
        'KeyApi' => $KeyApi (Не обязательный если был использован Config::SetAuthKey(<your_auth_key>))
    
        Создание отчёта и получение его ID - строка
        CompanyReport::CreateReport([
            'CompanyId' => Companies::GetCompanies()->GetIdByName('test')
        ])->IdReport();
        
    // --- END СОЗДАНИЕ ОТЧЁТА КАМПАНИИ
    */
    
    /*
    // --- ПОЛУЧЕНИЕ ИНФОРМАЦИИ ОБ ОТЧЁТЕ
        Передаваемые параметры:
        'CompanyId' => $CompanyId, (Обязательный)
        'ReportId' => $ReportId, (Обязательный)
        'URL' => $url, (Не обязательный)
        'Method' => $Method, (Не обязательный)
        'KeyApi' => $KeyApi (Не обязательный если был использован Config::SetAuthKey(<your_auth_key>))
    
    // Получение всей информации об отчёте - массив
        GetInfoReport::InfoReport([
            'CompanyId' => Companies::GetCompanies()->GetIdByName('test'),
            'ReportId' => 70378
        ])->All()
    
    // Получение статуса отчёта - строка
        GetInfoReport::InfoReport([
            'CompanyId' => Companies::GetCompanies()->GetIdByName('test'),
            'ReportId' => 70378
        ])->Status()
    
    // Получение isSuccessfullyFinished - bool
        GetInfoReport::InfoReport([
            'CompanyId' => Companies::GetCompanies()->GetIdByName('test'),
            'ReportId' => 70378
        ])->IsFinished()
        
    // Получение количества ошибок - строка
        GetInfoReport::InfoReport([
            'CompanyId' => Companies::GetCompanies()->GetIdByName('test'),
            'ReportId' => 70378
        ])->ErrorProducts()
        
    // Получение количества успешных товаров - строка
        GetInfoReport::InfoReport([
            'CompanyId' => Companies::GetCompanies()->GetIdByName('test'),
            'ReportId' => 70378
        ])->OkProducts()
    // --- END ПОЛУЧЕНИЕ ИНФОРМАЦИИ ОБ ОТЧЁТЕ
    */
    
    /*
    // --- ПОЛУЧЕНИЕ РЕЗУЛЬТАТОВ ПАРСИНГА ОТЧЁТОВ
        Передаваемые параметры:
        'CompanyId' => $CompanyId, (Обязательный)
        'ReportId' => $ReportId, (Обязательный)
        'URL' => $url, (Не обязательный)
        'Method' => $Method, (Не обязательный)
        'KeyApi' => $KeyApi, (Не обязательный если был использован Config::SetAuthKey(<your_auth_key>))
        'per_page' => $per_page, (Не обязательный)
        'page' => $page (Не обязательный)
    
    // Получение тела всего отчёта - массив
        GetReport::Report([
            'CompanyId' => Companies::GetCompanies()->GetIdByName('test'),
            'ReportId' => 70378,
            'per_page' => 100
        ])->All();
    
    // Получение кол-ва товаров - строка
        Report::Get([
            'CompanyId' => Companies::GetCompanies()->GetIdByName('test'),
            'ReportId' => 70378,
            'per_page' => 100
        ])->Total();
    
    // Получение массива товаров - массив
        Report::Get([
            'CompanyId' => Companies::GetCompanies()->GetIdByName('test'),
            'ReportId' => 70378,
            'per_page' => 100
        ])->Products();
        
    // Получение отчёта по товару по вашему ID
        print_r(Report::Get([
            'CompanyId' => Companies::GetCompanies()->GetIdByName('test2'),
            'ReportId' => 70415
        ])->ById('id14'));
    
    // Получение максимальной чены товара по вашему ID - строка
        Report::Get([
            'CompanyId' => Companies::GetCompanies()->GetIdByName('test2'),
            'ReportId' => 70415
        ])->MaxPrice('id14');
        
    // Получение минимальной цены товара по вашему ID - строка
        Report::Get([
            'CompanyId' => Companies::GetCompanies()->GetIdByName('test2'),
            'ReportId' => 70415
        ])->MinPrice('id14');
        
    // Получение средней цены товара по вашему ID
        Report::Get([
            'CompanyId' => Companies::GetCompanies()->GetIdByName('test2'),
            'ReportId' => 70415
        ])->AveragePrice('id14');
        
    // Получение кол-ва магазинов - строка
        Report::Get([
            'CompanyId' => Companies::GetCompanies()->GetIdByName('test2'),
            'ReportId' => 70415
        ])->CountOffers('id14');
        
    // Получение массива с магазинами продающими такой же товар, как товар с вашим ID - массив
        Report::Get([
            'CompanyId' => Companies::GetCompanies()->GetIdByName('test2'),
            'ReportId' => 70415
        ])->Offers('id14');
        
    // Получение вашей цены на товар с вашим ID - строка
        Report::Get([
            'CompanyId' => Companies::GetCompanies()->GetIdByName('test2'),
            'ReportId' => 70415
        ])->OurCost('id14');
        
        
        
    
    // --- END ПОЛУЧЕНИЕ РЕЗУЛЬТАТОВ ПАРСИНГА ОТЧЁТОВ
    */
    
    /*
    // --- ПОЛУЧЕНИЕ СПИСКА ОТЧЁТОВ КАМПАНИИ
        Передаваемые параметры:
        'CompanyId' => $CompanyId, (Обязательный)
        'URL' => $url, (Не обязательный)
        'Method' => $Method, (Не обязательный)
        'KeyApi' => $KeyApi, (Не обязательный если был использован Config::SetAuthKey(<your_auth_key>))
        'page' => $page (Не обязательный)
    
    // Получение списка всех отчётов - массив
        Reports::Get([
            'CompanyId' => Companies::GetCompanies()->GetIdByName('test2'),
            'page' => 1
        ])->All()
    
    // Получение количества отчётов - строка
        Reports::Get([
            'CompanyId' => Companies::GetCompanies()->GetIdByName('test2'),
            'page' => 1
        ])->Total();
        
    // Получение массива с информацией об отчётах - массив
        Reports::Get([
            'CompanyId' => Companies::GetCompanies()->GetIdByName('test2'),
            'page' => 1
        ])->Reports();
        
    // --- END ПОЛУЧЕНИЕ СПИСКА ОТЧЁТОВ КАМПАНИИ
    */
    
    /*
    // --- ПОДПИСКА НА ПЛАН
        Передаваемые параметры:
        'URL' => $url, (Не обязательный)
        'Method' => $Method, (Не обязательный)
        'KeyApi' => $KeyApi, (Не обязательный если был использован Config::SetAuthKey(<your_auth_key>))
    
    // Получение всей информации о плане - массив
        Plan::Get()->All();
        
    // Получение имя плана - строка
        Plan::Get()->Name();
        
    // Получение баланса
        Plan::Get()->Units();
        
    // Получение даты действия
        Plan::Get()->Date();
        
    // --- END ПОДПИСКА НА ПЛАН
    */
    
?>