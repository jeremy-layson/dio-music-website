<?php

/**
 * common class for model
 * @abstract
 *
 * @author Jeremy Layson <jeremy.b.layson@gmail.com>
 * @since 03. 07. 2017
 * @version 1.0
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