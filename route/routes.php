<?php
    include_once('./routeClass.php');
	
    $oRoute = new Router();

    $oRoute->set('/', 'home.php');
    $sFileName = $oRoute->exec();

    var_dump($sFileName['params']);
    include_once($sFileName['file']);
?>