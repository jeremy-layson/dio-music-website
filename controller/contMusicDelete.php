<?php

/**
 * Music delete module
 *
 * @since 04. 06. 2017
 * @version 1.0
 */
class contMusicDelete extends contCommon
{
    /**
     * @var Object
     */
    private $oModel;

    public function exec($aParams)
    {
        $this->oModel = $this->model('Music');
        if (isset($aParams['get']['id']) === true) {
            $this->oModel->deleteMusic($aParams['get']['id']);
        }
        $this->go('/');
    }
}

?>