<?php

/**
 * Account model class
 *
 * @package account
 * @author Jeremy Layson <jeremy.b.layson@gmail.com>
 * @since 03. 28. 2017
 * @version 1.0
 */
class modelAccount extends modelCommon
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

    /**
     * Create a new account record
     *
     * @param Array aData
     */
    public function createAccount($aData)
    {
        $prepared = mysqli_prepare($this->dbConn, "INSERT INTO `user` VALUES(NULL, ?, ?, ?, ?, ?, ?, ?, ?, '0', 'default.png')");
        $prepared->bind_param('ssssssss', $aData['uName'], $aData['uUserName'], $aData['uPassword'], $aData['uEmail'], $aData['uActivated'], date('Y-m-d h:i:s'), date('Y-m-d h:i:s'), $aData['uType']);
        $prepared->execute();
        $this->closeConn();
    }
}
?>