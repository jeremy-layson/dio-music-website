<?php

/**
 * Music model class
 *
 * @package music
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

        $sQuery = "SELECT * FROM music WHERE m_approved = 1 and m_deleted = 0 ORDER BY m_uploaded desc, m_genre";
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
        $prepared = mysqli_prepare($this->dbConn, "SELECT * FROM music WHERE m_genre = ? AND m_approved = 1 AND m_deleted = 0  ORDER BY rand()");
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

    /**
     * getter for single music
     *
     * @param String sId
     * @return Mixed Array or Boolean
     */
    public function getSpecificMusic($sId)
    {
        $prepared = mysqli_prepare($this->dbConn, "SELECT * FROM music WHERE m_id = ? AND m_approved = 1 AND m_deleted = 0  LIMIT 1");
        $prepared->bind_param('i', $sId);
        $prepared->execute();
        
        $result = $prepared->get_result();

        $aReturn = $result->fetch_array(MYSQLI_ASSOC);
        
        return $aReturn;
    }

    /**
     * Add a new music stats
     *
     * @param String sId
     */
    public function createStats($sId)
    {
        $prepared = mysqli_prepare($this->dbConn, "INSERT INTO stats VALUES(NULL, ?, ?)");
        $prepared->bind_param('ss', $sId , date('Y-m-d h:i:s'));
        $prepared->execute();
        $this->closeConn();
    }

    /**
     * get the rankings
     */
    public function getHot()
    {
        $aList = [];
        $prepared = mysqli_prepare($this->dbConn, "SELECT count(s_id) as count, s_music FROM `stats` GROUP BY s_music ORDER by count(s_id) DESC LIMIT 12");
        $prepared->execute();
        
        $result = $prepared->get_result();
        
        while ($row = $result->fetch_array(MYSQLI_ASSOC))
        {
            $aList[] = $this->getSpecificMusic($row['s_music']);
        }
        
        $this->closeConn();

        return $aList;
    }

    /**
     * get suggestions
     */
    public function getSuggestion($sGenre, $sExcept)
    {
        $aList = [];
        $prepared = mysqli_prepare($this->dbConn, "SELECT * FROM music WHERE m_genre = ? AND m_id != ? AND m_approved = 1 AND m_deleted = 0 ORDER BY rand() LIMIT 4");
        $prepared->bind_param('ss', $sGenre, $sExcept);
        $prepared->execute();
        
        $result = $prepared->get_result();
        
        while ($row = $result->fetch_array(MYSQLI_ASSOC))
        {
            $aList[] = $row;
        }

        return $aList;
    }
}

?>