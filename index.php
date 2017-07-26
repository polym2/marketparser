<?php
    
    namespace marketparser\App;
    
	require_once('marketparser/App/Curl.php');
    require_once('marketparser/App/Base/BaseCurl.php');
    require_once('marketparser/Models/Auth.php');
    require_once('marketparser/Models/Companies.php');
    
    //use marketparser\App;
    use marketparser\App\Curl;
    use marketparser\App\Curl\Base;
    use marketparser\Models\Auth;
    use marketparser\Models\Companies;
    
    $auth = new Auth('ZGQ3NDYxNTBjZDRiMTAzM2YyODc0NTczZTZkYzMxMjRkMGIyOWJjZA');
    var_dump ($auth);
    echo '<pre>';
    //тестируем авторизацию
    print_r ($auth->test_auth());
    
    //список компаний
    $companies_obj = new Companies();
    print_r($companies_obj->all_companies());
    
    
?>