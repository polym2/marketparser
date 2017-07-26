<?php
    
    namespace marketparser\App;
    
	require_once('marketparser/App/Curl.php');
    require_once('marketparser/App/Base/BaseCurl.php');
    require_once('marketparser/Models/Auth.php');
    
    //use marketparser\App;
    use marketparser\App\Curl;
    use marketparser\App\Curl\Base;
    use marketparser\Models\Auth;
    
    $auth = new Auth('ZGQ3NDYxNTBjZDRiMTAzM2YyODc0NTczZTZkYzMxMjRkMGIyOWJjZA');

    var_dump ($auth);
    $auth->test_auth($auth->key_api());
    
    
    
?>