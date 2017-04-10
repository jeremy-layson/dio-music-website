<?php

/**
 * Logout module
 *
 * @since 04. 06. 2017
 * @version 1.0
 */
class contAccountLogout extends contCommon
{
    /**
     * @var Object
     */
    private $oModel;

    public function exec($aParams)
    {
        unset($_SESSION['current_user']);
        session_destroy();
        $this->go('/');
        return true;
    }
}

?>