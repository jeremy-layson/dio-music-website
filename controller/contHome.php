<?php

/**
 * homepage class
 *
 * @author Jeremy Layson <jeremy.b.layson@gmail.com>
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
        $this->css('navbar.css');
        $this->css('foundation.min.css');

        $this->oModel = $this->model('Music');

        $aData = $this->oModel->getMusicByAllGenre();
        $this->view('home', array('aData' => $aData)) ;
    }
}

?>