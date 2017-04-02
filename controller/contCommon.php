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
     * @var Array aJsImports
     */
    protected $aJsImports;

    /**
     * @var Array aCssImports
     */
    protected $aCssImports;

    /**
     * @var Array of Object
     */
    protected $aDependencies;
    /**
     * inserts the view file
     *
     * @param String sFileName
     * @param Array aVariables
     */
    protected function view($sFileName, $aVariables = NULL)
    {
        if (($aVariables !== NULL) && (count($aVariables) > 0)) {
            foreach ($aVariables as $sKey => $mVal) {
                $$sKey = $mVal;
            }
        }

        $js_import = $this->getJs();
        $css_import = $this->getCss();
        include_once('../view/' . $sFileName . '.php');
    }

    /**
     * concatenates the js imports
     *
     * @return String
     */
    private function getJs()
    {
        if (count($this->aJsImports) === 0) {
            return '';
        }
        $sReturn = '';

        foreach ($this->aJsImports as $sJsImports) {
            $sReturn = $sReturn . '<script type="text/javascript" src="/resource/js/' . $sJsImports . '"></script>';
        }

        return $sReturn;
    }

    /**
     * concatenates the css imports
     *
     * @return String
     */
    private function getCss()
    {
        if (count($this->aCssImports) === 0) {
            return '';
        }
        $sReturn = '';

        foreach ($this->aCssImports as $cssImports) {
            $sReturn = $sReturn . '<link rel="stylesheet" href="/resource/css/' . $cssImports . '">';
        }

        return $sReturn;
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

        $sClassName = 'model' . $sModelName;
        return $sClassName::instance();
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

        $sClassName = 'lib' . $sModelName;
        return $sClassName::instance();
    }

    /**
     * setter for the js imports
     *
     * @param String sFileName
     */
    protected function js($sFileName)
    {
        $this->aJsImports[] = $sFileName;
    }

    /**
     * setter for the js imports
     *
     * @param String sFileName
     */
    protected function css($sFileName)
    {
        $this->aCssImports[] = $sFileName;
    }

    /**
     * adds a dependency to $this
     *
     * @param Object oObject
     * @param String sName
     */
    protected function dependencyInject($oObject, $sName)
    {
        $this->$aDependencies[$sName] = $oObject;
    }

    /**
     * redirect to a 
     */
    protected function go($sLocation, $aParams)
    {
        $sParams = '';

        foreach ($aParams as $sKey => $sParam) {
            $sParams = $sParams . '&' . $sKey . '=' . $sParam;
        }

        header('Location: ' . $sLocation . '?' . substr($sParams, 1));
    }
}
?>