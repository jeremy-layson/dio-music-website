<?php

/**
 * Music front controller
 *
 * @package music
 * @subpackage CRUD front
 * @author Jeremy Layson <jeremy.b.layson@gmail.com>
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

        $this->css('/music/crudFront.css');
        $this->css('navbar.css');
        $this->css('foundation.min.css');

        $this->view('music/crud');
    }
}

?>