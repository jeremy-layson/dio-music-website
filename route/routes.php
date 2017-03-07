<?php
    include_once('./routeClass.php');

    $oRoute = new Router();

    $oRoute->set('/', 'home.php');
    $sFileName = $oRoute->exec();

    include_once('../controller/contCommon.php');
    include_once($sFileName['controller']['fileName']);

    $oController = new $sFileName['controller']['className'];
    $oController->exec();
?>