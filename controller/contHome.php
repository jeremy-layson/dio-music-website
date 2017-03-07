<?php

/**
 * 
 */
class contHome extends contCommon
{
    public function exec()
    {
        $oModel = $this->model('modelSample');
        $oModel->test();
    }
}

?>