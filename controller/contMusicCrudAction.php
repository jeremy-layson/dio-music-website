<?php

/**
 * Music action controller
 *
 * @package music
 * @subpackage CRUD action
 * @author Jeremy Layson <jeremy.b.layson@gmail.com>
 * @since 03. 18. 2017
 * @version 1.0
 */
class contMusicCrudAction extends contCommon
{
    /**
     * @var Object
     */
    private $oModel;

    public function exec($aParams)
    {
        $this->oModel = $this->model('Music');

        $aData = $this->filterData($aParams);

        if ($aData['status'] === false) {
            $this->go('/music/crud/front', $aData['errors']);
            return false;
        }

        $aData = $this->saveFiles($aData);

        $this->saveData($aData['post']);
    }

    /**
     * filters the data from several attacks
     *
     * @param Array aData
     * @return Array aData
     */
    private function filterData($aData)
    {
        $aData['status'] = true;
        
        switch($aData['post']['mGenre']) {
            case 'Hiphop':
            case 'Urban Groove':
            case 'House Music':
            case 'Gospel':
            case 'Sungura':
            case 'Reggie/Zim Dancehall':
            case 'Afro Pop':
                break;
            default:
                $aData['errors']['error'] = 'mGenre';
                $aData['errors']['text'] = 'Tampered genre detected';
                $aData['status'] = false;
                return $aData;
        }
        if (($aData['files']['mCover']['tmp_name']) == '') {
            $aData['errors']['error'] = 'mCover';
            $aData['errors']['text'] = 'You must upload a valid cover image';
            $aData['status'] = false;
            return $aData;
        }

        if (($aData['files']['mAudio']['tmp_name']) == '') {
            $aData['errors']['error'] = 'mAudio';
            $aData['errors']['text'] = 'You must upload a valid audio file';
            $aData['status'] = false;
            return $aData;
        }
		
		//get the file info
		$aFileInfo = pathinfo($aData['files']['mCover']);
		if ($this->isAudio($aFileInfo['extension']) === false) {
			$aData['errors']['error'] = 'mCover';
            $aData['errors']['text'] = 'You must upload a valid cover image';
            $aData['status'] = false;
            return $aData;
		}
		
		//get the file info
		$aFileInfo = pathinfo($aData['files']['mAudio']);
		if ($this->isAudio($aFileInfo) === false) {
			$aData['errors']['error'] = 'mAudio';
            $aData['errors']['text'] = 'You must upload a valid audio file';
            $aData['status'] = false;
            return $aData;
		}
		

        return $aData;
    }
	
	/**
     * checks the file extension if audio
     *
     * @param Array aFileInfo
     * @return Boolean
     */
    private function isAudio($aFileInfo)
    {
		$aAllowed = [
			'3gp',
			'aa',
			'aac',
			'aax',
			'act',
			'aiff',
			'amr',
			'ape',
			'au',
			'awb',
			'dct',
			'dss',
			'dvf',
			'flac',
			'gsm',
			'iklax',
			'ivs',
			'm4a',
			'm4b',
			'm4p',
			'mmf',
			'mp3',
			'mpc',
			'msv',
			'ogg',
			'oga',
			'mogg',
			'opus',
			'ra',
			'rm',
			'raw',
			'sln',
			'tta',
			'vox',
			'wav',
			'wma',
			'wv',
			'webm'
		];
		
		if (in_array($aFileInfo['extension'], $aAllowed) === false) {
			return false;
		}
		return true;
	}
	/**
     * checks the file extension if audio
     *
     * @param Array aFileInfo
     * @return Boolean
     */
    private function isImage($sFileName)
    {
		$aAllowed = [
			'jpg',
			'jpeg',
			'png',
			'gif',
			'svg',
			'webp',
			'bmp'
		];
		
		if (in_array($sFileName, $aAllowed) === false) {
			return false;
		}
		return true;
	}

    /**
     * saves the necessary file for retrieval
     *
     * @param Array aData
     * @return Array aData
     */
    private function saveFiles($aData)
    {
        //add getter of file extension
        //move_uploaded_file($aData['files']['mAudio']['tmp_name'], '../resource/upload/' . md5_file($aData['files']['mAudio']['tmp_name']));

        $sFileName = md5_file($aData['files']['mCover']['tmp_name']);
        move_uploaded_file($aData['files']['mCover']['tmp_name'], '../resource/upload/' . $sFileName);
        $aData['post']['mCover'] = $sFileName;
        $aData['post']['mAudio'] = 'blank';

        return $aData;
    }

    /**
     * saves the data to mySQL table
     * @param Array aData
     */
    private function saveData($aData)
    {
        $this->oModel->createMusic($aData);
    }
}

?>