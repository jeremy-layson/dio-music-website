<?php

/**
 * account front controller
 *
 * @package account
 * @subpackage front
 * @author Jeremy Layson <jeremy.b.layson@gmail.com>
 * @since 03. 27. 2017
 * @version 1.0
 */
class contAccountFront extends contCommon
{
    public function exec($aParams)
    {
        $this->js('vendor/jquery.js');
        $this->js('vendor/foundation.min.js');
        $this->js('app.js');

        $this->css('/account/front.css');
        $this->css('navbar.css');
        $this->css('foundation.min.css');

        $this->view('account/account');
    }
}

?>