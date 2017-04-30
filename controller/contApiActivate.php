<?php

/**
 * API Requests
 *
 * @since 04. 26. 2017
 * @version 1.0
 */
class contApiActivate extends contCommon
{
    /**
     * @var Object
     */
    private $oAccounts;

    private $oMusic;

    public function exec($aParams)
    {
        
        $this->oAccounts = $this->model('Account');
        $this->oMusic = $this->model('Music');

        if ($aParams['post']['type'] == 'account') {
            $value = $aParams['post']['value'] == 'true' ? 1:0;
            $this->oAccounts->activateAccount($aParams['post']['id'], $value);
        } else {
            $value = $aParams['post']['value'] == 'true' ? 1:0;
            $this->oMusic->activateMusic($aParams['post']['id'], $value);
        }
    }
}

?>