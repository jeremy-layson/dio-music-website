<?php

/**
 * 
 */
class modelSample
{
    /**
     * 쿠키 객체
     *
     * @var oModel
     */
    private static $oModel;

    /**
     * 쿠키 객체
     *
     * @return oModel
     */
    public static function instance()
    {
        if (is_object(self::$oModel) === false) {
            self::$oModel = new self;
        }

        return self::$oModel;
    }

    public function test()
    {
        echo "test singleton";
    }
}

?>