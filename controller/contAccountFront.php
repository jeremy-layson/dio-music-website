<?php

/**
 * account front controller
 *
 * @package account
 * @subpackage front
 * @since 03. 27. 2017
 * @version 1.0
 */
class contAccountFront extends contCommon
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

        $this->css('/account/front.css');
        $this->css('navbar.css');
        $this->css('foundation.min.css');

        $this->oModel = $this->model('Account');

        $aData = [
            'mode' => 'new',
            'u_username' => '',
            'u_user_enabled' => '',
            'u_name' => '',
            'u_email' => '',
            'u_atype' => '',
            'u_id' => 0,
            'fan' => 'selected',
            'artist' => ''
        ];

        if (isset($aParams['get']['id'])) {
            $aData = $this->oModel->getAccount($aParams['get']['id']);
            $aData['mode'] = 'edit';
            $aData['u_user_enabled'] = 'disabled';

            if ($aData['u_type'] == 'Artist') {
                $aData['fan'] = '';
                $aData['artist'] = 'selected';
            } else {
                $aData['fan'] = 'selected';
                $aData['artist'] = '';
            }
        } else {
            if (isset($_SESSION['current_user']) === true) {
                $aData = $this->oModel->getAccount($_SESSION['current_user']['u_username']);
                $aData['mode'] = 'edit';
                $aData['u_user_enabled'] = 'disabled';
                if ($aData['u_type'] == 'Artist') {
                    $aData['fan'] = '';
                    $aData['artist'] = 'selected';
                } else {
                    $aData['fan'] = 'selected';
                    $aData['artist'] = '';
                }
            }
        }

        $this->view('account/account', array('data' => $aData));
    }
}

?>