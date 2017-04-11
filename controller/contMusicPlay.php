<?php

/**
 * Music play module
 *
 * @since 04. 06. 2017
 * @version 1.0
 */
class contMusicPlay extends contCommon
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
        $this->js('play.js');


        $this->css('navbar.css');
        $this->css('foundation.min.css');
        $this->css('home/home.css');
        $this->css('music/play.css');
        
        $this->oModel = $this->model('Music');
        
        if (isset($aParams['get']['id']) === false) {
            header("Location: /");
            return false;
        }

        $sId = $aParams['get']['id'];
        $aData = $this->oModel->getSpecificMusic($sId);
        
        if ($aData === false) {
            header("Location: /");
            return false;
        }

        $aSuggest = $this->oModel->getSuggestion($aData['m_genre'], $aData['m_id']);
        $this->oModel->createStats($sId);

        $aVars = [
            'data' => $aData,
            'suggestion' => $aSuggest,
        ];
        $this->view('music/play', $aVars);
    }
}

?>