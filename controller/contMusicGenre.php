<?php

/**
 * Music genre location
 *
 * @since 04. 02. 2017
 * @version 1.0
 */
class contMusicGenre extends contCommon
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
		
		$sGenre = $aParams['get']['category'];
		$aData = $this->oModel->getMusicByGenre($sGenre);

        $this->view('music/genre', array('genre' => $sGenre, 'aData' => $aData)) ;
    }
}

?>