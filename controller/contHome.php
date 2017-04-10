<?php

/**
 * homepage class
 *
 * @since 03. 08. 2017
 * @version 1.0
 */
class contHome extends contCommon
{
    /**
     * @var Object
     */
    private $oModel;

    public function exec($aParams)
    {
        $this->js('vendor/jquery.js');
        $this->js('vendor/foundation.min.js');
        $this->js('app.js');

        $this->css('/home/home.css');
        
        $this->css('foundation.min.css');
        $this->css('navbar.css');
        
        $this->oModel = $this->model('Music');

        $aData = $this->oModel->getMusicByAllGenre();

        $aHot = $this->oModel->getHot();
        $this->view('home', array('aData' => $aData, 'hot' => $aHot)) ;
    }
}

?>