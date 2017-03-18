<?php

/**
 * Music model class
 *
 * @package music
 * @author Jeremy Layson <jeremy.b.layson@gmail.com>
 * @since 03. 18. 2017
 * @version 1.0
 */
class modelMusic extends modelCommon
{
    /**
     *
     * @var oModel
     */
    private static $oModel;

    /**
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

    public function createMusic($aData)
    {
        $prepared = mysqli_prepare($this->dbConn, "INSERT INTO music VALUES(NULL, ?, ?, ?, ?, ?, ?, 0)");
        $prepared->bind_param('ssssss', $aData['mTitle'], $aData['mDesc'], $aData['mSinger'], $aData['mCover'], $aData['mAudio'], mktime());
        $prepared->execute();
    }

    
}

?>