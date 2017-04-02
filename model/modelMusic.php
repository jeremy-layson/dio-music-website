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

    /**
     * create a new record of music
     *
     * @param Array aData
     */
    public function createMusic($aData)
    {
        $prepared = mysqli_prepare($this->dbConn, "INSERT INTO music VALUES(NULL, ?, ?, ?, ?, ?, ?, ?, 0, 0)");
        $prepared->bind_param('sssssss', $aData['mTitle'], $aData['mDesc'], $aData['mSinger'], $aData['mCover'], $aData['mAudio'], date('Y-m-d h:i:s'), date('Y-m-d h:i:s'));
        $prepared->execute();
        $this->closeConn();
    }

    /**
     * modifies an existing music
     *
     * @param aData aData
     */
    public function updateMusic($aData)
    {

    }

    /**
     * soft deletes a music
     *
     * @param String sID 
     */
    public function deleteMusic($sID)
    {

    }

    /**
     * restore soft-deleted music
     *
     * @param String sID 
     */
    public function restoreMusic($sID)
    {

    }

    /**
     * approves a music
     *
     * @param String sID 
     */
    public function approveMusic($sID)
    {

    }

    /**
     * revert a approved music
     *
     * @param String sID 
     */
    public function disapproveMusic($sID)
    {

    }

    /**
     * get all music sorted by genre
     *
     * @return Array aList
     */
    public function getMusicByAllGenre()
    {
        $aList = [];

        $sQuery = "SELECT * FROM music ORDER BY m_uploaded desc, m_genre";
        $aResult = mysqli_query($this->dbConn, $sQuery);
        while ($row = mysqli_fetch_array($aResult, MYSQLI_ASSOC)) {
            if (isset($aList[$row['m_genre']]) === false || count($aList[$row['m_genre']]) < 3) {
                $aList[$row['m_genre']][] = $row;
            }
        }

        return $aList;
    }
	
	/**
     * get all music of the same genre
     *
     * @return Array aList
     */
    public function getMusicByGenre($sGenre)
    {
		$aList = [];
        $prepared = mysqli_prepare($this->dbConn, "SELECT * FROM music WHERE m_genre = ? ORDER BY rand()");
        $prepared->bind_param('s', $sGenre);
        $prepared->execute();
		
		$result = $prepared->get_result();
		
		while ($row = $result->fetch_array(MYSQLI_ASSOC))
        {
            $aList[] = $row;
        }
		
        $this->closeConn();

        return $aList;
    }
}

?>