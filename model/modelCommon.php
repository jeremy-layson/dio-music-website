<?php

/**
 * 
 */
abstract class modelCommon
{
    /**
     * 쿠키 객체
     *
     * @var oModel
     */
    protected static $oModel;

    /**
     * 쿠키 객체
     *
     * @return oModel
     */
    private static function _instance()
    {
        if (is_object(self::$oCookie) === false) {
            self::$oCookie = new utilCookie;
        }

        return self::$oCookie;
    }
}

?>