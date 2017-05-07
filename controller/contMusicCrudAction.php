<?php

/**
 * Music action controller
 *
 * @package music
 * @subpackage CRUD action
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

        $this->go('/');
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

        if ($aData['post']['mode'] == 'new') {
            if (($aData['files']['mCover']['name']) == '') {
                $aData['errors']['error'] = 'mCover';
                $aData['errors']['text'] = 'You must upload a cover image';
                $aData['status'] = false;
                return $aData;
            }

            if (($aData['files']['mAudio']['name']) == '') {
                $aData['errors']['error'] = 'mAudio';
                $aData['errors']['text'] = 'You must upload an audio file';
                $aData['status'] = false;
                return $aData;
            }
            
            //get the file info
            $aFileInfo = pathinfo($aData['files']['mCover']['name']);
            
            if ($this->isImage($aFileInfo['extension']) === false) {
                $aData['errors']['error'] = 'mCover';
                $aData['errors']['text'] = 'You must upload a valid cover image';
                $aData['status'] = false;
                return $aData;
            }
            
            //get the file info
            $aFileInfo = pathinfo($aData['files']['mAudio']['name']);
            if ($this->isAudio($aFileInfo) === false) {
                $aData['errors']['error'] = 'mAudio';
                $aData['errors']['text'] = 'You must upload a valid audio file';
                $aData['status'] = false;
                return $aData;
            }
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
		if (in_array(strtolower($aFileInfo['extension']), $aAllowed) === false) {
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
		
		if (in_array(strtolower($sFileName), $aAllowed) === false) {
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

        if (($aData['files']['mCover']['name']) != '') {
            $aImageInfo = pathinfo($aData['files']['mCover']['name']);
            $sFileName = md5_file($aData['files']['mCover']['tmp_name']) . '.' . $aImageInfo['extension'];
            move_uploaded_file($aData['files']['mCover']['tmp_name'], '../resource/upload/' . $sFileName);
            $aData['post']['mCover'] = $sFileName;
        }
        
        if (($aData['files']['mAudio']['name']) != '') {
            $aMusicInfo = pathinfo($aData['files']['mAudio']['name']);
            $sFileName = md5_file($aData['files']['mAudio']['tmp_name']) . '.' . $aMusicInfo['extension'];
            move_uploaded_file($aData['files']['mAudio']['tmp_name'], '../resource/upload/' . $sFileName);    
            $aData['post']['mAudio'] = $sFileName;
        }
        

        return $aData;
    }

    /**
     * saves the data to mySQL table
     * @param Array aData
     */
    private function saveData($aData)
    {
        $aData['current_user'] = $_SESSION['current_user'];

        if ($aData['mode'] == 'new') {
            $this->oModel->createMusic($aData);
        } else {
            $aMusic = $this->oModel->getSpecificMusic($aData['id']);

            if (isset($aData['mAudio']) === false) {
                $aData['mAudio'] = $aMusic['m_music_file'];
            }
            if (isset($aData['mCover']) === false) {
                $aData['mCover'] = $aMusic['m_cover'];
            }

            $this->oModel->updateMusic($aData);
        }
    }
}

?>