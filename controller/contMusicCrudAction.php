<?php

/**
 * Music action controller
 *
 * @package music
 * @subpackage CRUD action
 * @author Jeremy Layson <jeremy.b.layson@gmail.com>
 * @since 03. 18. 2017
 * @version 1.0
 */
class contMusicCrudAction extends contCommon
{
    /**
     * @var Object
     */
    private $oModel;

    public function exec($aParams)
    {
        $this->oModel = $this->model('Music');
        $this->saveData($aParams['post']);
    }

    /**
     * filters the data from several attacks
     *
     * @param Array aData
     * @return Array aData
     */
    private function filterData($aData)
    {

    }

    /**
     * saves the data to mySQL table
     * @param Array aData
     */
    private function saveData($aData)
    {
        $this->oModel->createMusic($aData);
    }
}

?>