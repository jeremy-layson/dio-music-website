<?php
    if (isResource() === true) {
        exit();
    }

    include_once('./routeClass.php');
    include_once('../controller/contCommon.php');

    $oRoute = new Router();

    //set default page to contHome.php
    $oRoute->set('/', 'contHome');
    $sFileName = $oRoute->exec();
    
    include_once($sFileName['controller']['fileName']);

    $oController = new $sFileName['controller']['className'];
    $oController->exec();


    function isResource()
    {
        if (strpos($_SERVER['REQUEST_URI'], '/resource/') > 0) {
            return true;
        }
        return false;
    }
?>