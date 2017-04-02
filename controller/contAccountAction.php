<?php

/**
 * account action controller
 *
 * @package account
 * @subpackage action
 * @author Jeremy Layson <jeremy.b.layson@gmail.com>
 * @since 03. 27. 2017
 * @version 1.0
 */
class contAccountAction extends contCommon
{
    /**
     * @var Object
     */
    private $oModel;

    public function exec($aParams)
    {
        $this->oModel = $this->model('Account');

        $aData = $this->filterData($aParams);

        if ($aData === false) {
            return false;
        }

        $this->saveData($aData['post']);
        $this->go('/account/front');
    }

    /**
     * filters the data from several attacks
     * SALT: dioMugo_website
     * sha1-sha1-md5
     *
     * @param Array aData
     * @return Array aData
     */
    private function filterData($aData)
    {
        //check account type
        if ($aData['post']['uType'] == 'Artist') {
            $aData['post']['uActivated'] = 0;
        } else if ($aData['post']['uType'] == 'Fan') {
            $aData['post']['uActivated'] = 1;
        } else {
            return false;
        }

        if (strcmp($aData['post']['uPassword'], $aData['post']['uRepass']) !== 0) {
            return false;
        }

        $aData['post']['uPassword'] = sha1(sha1(md5($aData['post']['uPassword'] . 'dioMugo_website')));

        return $aData;
    }

    /**
     * saves the data to mySQL table
     * @param Array aData
     */
    private function saveData($aData)
    {
        $this->oModel->createAccount($aData);
    }
}

?>