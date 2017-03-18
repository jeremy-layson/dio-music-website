<?php

/**
 * model common class
 *
 * @package music
 * @author Jeremy Layson <jeremy.b.layson@gmail.com>
 * @since 03. 10. 2017
 * @version 1.0
 */
class modelCommon
{
    /**
     * @var mySQL Connection
     */
    protected $dbConn;

    /**
     * create the sql connection
     */
    protected function __construct()
    {
        require_once('connection.php');
        $this->dbConn = $db;
    }

    protected function closeConn()
    {
        mysqli_close($this->dbConn);
    }
}

?>