<?php

/**
 * homepage class
 *
 * @author Jeremy Layson <jeremy.b.layson@gmail.com>
 * @since 03. 08. 2017
 * @version 1.0
 */
class contHome extends contCommon
{
    public function exec()
    {
        $this->js('vendor/jquery.js');
        $this->js('vendor/foundation.min.js');
        $this->js('app.js');
        $this->css('foundation.min.css');

        $this->view('home');
    }
}

?>