<?php

/**
 * Music front controller
 *
 * @package music
 * @subpackage CRUD front
 * @since 03. 16. 2017
 * @version 1.0
 */
class contMusicCrudFront extends contCommon
{
    public function exec($aParams)
    {
        $this->js('vendor/jquery.js');
        $this->js('vendor/foundation.min.js');
        $this->js('app.js');

        $this->css('foundation.min.css');
        $this->css('/music/crudFront.css');
        $this->css('navbar.css');

        $this->oModel = $this->model('Music');

        $aData = [
            'id'        => '0',
            'mode'      => 'new',
            'mTitle'    => '',
            'mDesc'     => '',
            'mSinger'   => '',
            'mVideo'    => '',
            'Hiphop'    => 'selected',
            'Reggie/Zim Dancehall'    => '',
            'Urban Groove'     => '',
            'House Music'     => '',
            'Gospel'    => '',
            'Sungura'   => '',
            'Afro Pop'      => ''
        ];

        if (isset($aParams['get']['id'])) {
            $aMusic = $this->oModel->getSpecificMusic($aParams['get']['id']);
            $aData['id'] = $aParams['get']['id'];
            $aData['mode'] = 'edit';
            $aData['mTitle']    = $aMusic['m_title'];
            $aData['mDesc']    = $aMusic['m_description'];
            $aData['mSinger']    = $aMusic['m_singers'];
            $aData['mVideo']    = $aMusic['m_video_embed'];
            $aData[$aMusic['m_genre']] = 'selected';
        }

        $this->view('music/crud', array('data' => $aData));
    }
}

?>