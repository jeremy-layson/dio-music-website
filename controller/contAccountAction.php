<?php

/**
 * account action controller
 *
 * @package account
 * @subpackage action
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

        if ($aData['status'] === false) {
            $this->go('/account/front', $aData['errors']);
            return false;
        }

        $this->saveData($aData['post']);
        $this->go('/admin/home');
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
            $aData['errors']['error'] = 'uType';
            $aData['errors']['text'] = 'Invalid type';
            $aData['status'] = false;
            return $aData;
        }

        //check email
        $email = $_POST["uEmail"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $aData['errors']['error'] = 'uEmail';
            $aData['errors']['text'] = 'Invalid email';
            $aData['status'] = false;
            return $aData;
        }
        
        if (strcmp($aData['post']['uPassword'], $aData['post']['uRepass']) !== 0) {
            $aData['errors']['error'] = 'uPassword';
            $aData['errors']['text'] = 'Passwords do not match';
            $aData['status'] = false;
            return $aData;
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
        if ($aData['mode'] == 'new') {
            $this->oModel->createAccount($aData);
        } else {
            $this->oModel->updateAccount($aData);
        }
    }
}

?>