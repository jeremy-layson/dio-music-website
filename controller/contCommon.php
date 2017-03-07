<?php 

/**
 * base controller class
 *
 * @author Jeremy Layson <jeremy.b.layson@gmail.com>
 * @since 03. 07. 2017
 * @version 1.0
 */
abstract class contCommon
{

    /**
     * inserts the view file
     *
     * @param String sFileName
     * @param Array aVariables
     */
    protected function view($sFileName, $aVariables)
    {
        include_once('../view/' . $sFileName . '.php');
    }

    /**
     * returns an instance of the specified model
     *
     * @param String sModelName
     * @return Object
     */
    protected function model($sModelName)
    {
        $sModelName = ucfirst($sModelName);

        include_once('../model/model' . $sModelName . '.php');
        return $sModelName::instance();
    }

    /**
     * returns an instance of a library
     *
     * @param String sLibName
     * @return Object
     */
    protected function lib($sLibName)
    {
        $sLibName = ucfirst($sLibName);

        include_once('../lib/lib' . $sLibName . '.php');
        return $sLibName::instance();
    }
}
?>