<?php

/**
 * Login module
 *
 * @since 04. 06. 2017
 * @version 1.0
 */
class contAccountLogin extends contCommon
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


        $this->css('navbar.css');
        $this->css('foundation.min.css');
        
        $this->oModel = $this->model('Account');

        $aPost = $aParams['post'];

        if (isset($aPost['username']) === false) {
            $this->go('/');
            return false;
        }

        if ($aPost['username'] == '' || $aPost['password'] == '') {
            $this->go('/');
            return false;
        }

        $aAccount = $this->oModel->getAccount($aPost['username']);

        $aPost['password'] = sha1(sha1(md5($aPost['password'] . 'dioMugo_website')));

        if (strcmp($aPost['password'], $aAccount['u_password']) !== 0) {
            $this->go('/');
            return false;
        }

        //create session
        unset($aAccount['u_password']);
        $_SESSION['current_user'] = $aAccount;

        $this->go('/');
    }
}

?>