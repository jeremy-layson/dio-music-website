<?php

/**
 * 
 */
class contHome extends contCommon
{
    public function exec()
    {
        $oModel = $this->model('sample');
        $oModel->test();
    }
}

?>