<?php

/**
 * Music search
 *
 * @since 05. 11. 2017
 * @version 1.0
 */
class contMusicSearch extends contCommon
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
        $this->css('foundation.css');
        $this->css('navbar.css');

        $this->oModel = $this->model('Music');
        
        $sGenre = $aParams['get']['search'];
        $aData = $this->oModel->searchMusic($sGenre);

        $this->view('music/genre', array('genre' => $sGenre, 'aData' => $aData)) ;
    }
}

?>