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

        

        return $aData;
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