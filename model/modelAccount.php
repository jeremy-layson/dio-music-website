<?php

/**
 * Account model class
 *
 * @package account
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

    /**
     * Update an existing record
     *
     * @param Array aData
     */
    public function updateAccount($aData)
    {
        $prepared = mysqli_prepare($this->dbConn, "UPDATE user SET u_name = ?, u_password = ?, u_email = ?, u_type = ? WHERE u_id = ?");
        $prepared->bind_param('sssss', $aData['uName'], $aData['uPassword'], $aData['uEmail'], $aData['uType'], $aData['u_id']);
        $prepared->execute();
        $this->closeConn();
    }

    /**
     * Get account information for various purpose
     *
     * @param String sId
     * @return Array
     */
    public function getAccount($sId)
    {
        $prepared = mysqli_prepare($this->dbConn, "SELECT * FROM user WHERE u_username = ? AND u_deleted = 0 LIMIT 1");
        $prepared->bind_param('s', $sId);
        $prepared->execute();
        
        $result = $prepared->get_result();
        
        return $result->fetch_array(MYSQLI_ASSOC);
    }
}
?>