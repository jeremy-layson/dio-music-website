<?php

/**
 * admin home page
 *
 * @since 04. 26. 2017
 * @version 1.0
 */
class contAdminHome extends contCommon
{
    /**
     * @var Object
     */
    private $oAccounts;

    private $oMusic;

    public function exec($aParams)
    {
        if (isset($_SESSION['current_user']) === true) {
            if ($_SESSION['current_user']['u_type'] != 'Admin') {
                $this->go('/');
                return false;
            }
        } else {
            $this->go('/');
            return false;
        }

        $this->js('vendor/jquery.js');
        $this->js('vendor/foundation.min.js');
        $this->js('app.js');
        $this->js('admin-home.js');


        $this->css('admin/home.css');
        
        $this->css('foundation.min.css');
        $this->css('navbar.css');
        
        $this->oAccounts = $this->model('Account');
        $this->oMusic = $this->model('Music');
        
        //users offset
        $offset = 0;
        if (isset($aParams['get']['u_offset'])) {
            $offset = $aParams['get']['u_offset'];
        }

        //search params
        $search = false;
        if (isset($aParams['get']['search'])) {
            $search = $aParams['get']['search'];
        }
        $aData['search'] = $search;

        $aAccounts = $this->oAccounts->getAccounts($search, $offset);

        $aData['accounts'] = $aAccounts;


        $aData['u_offset']  = $offset;
        $aData['u_start']     = 1;
        $aData['u_end']       = 10;

        if ($offset > 5) {
            $aData['u_start'] = $offset - 4;
            $aData['u_end']   = $offset + 5;
        }

        //music offset
        $m_offset = 0;
        if (isset($aParams['get']['m_offset'])) {
            $m_offset = $aParams['get']['m_offset'];
        }

        //search params
        $m_search = false;
        if (isset($aParams['get']['m_search'])) {
            $search = $aParams['get']['m_search'];
        }
        $aData['m_search'] = $search;

        $this->oAccounts->closeConn();
        $aMusics = $this->oMusic->getAdminMusic($search, $m_offset);
        $aData['musics'] = $aMusics;

        $aData['m_offset']  = $m_offset;
        $aData['m_start']     = 1;
        $aData['m_end']       = 10;

        if ($m_offset > 5) {
            $aData['m_start'] = $m_offset - 4;
            $aData['m_end']   = $m_offset + 5;
        }

        $this->view('admin/home', array('data' => $aData));
    }
}

?>