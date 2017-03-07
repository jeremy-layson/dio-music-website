<?php
    /**
    * router class
    *
    * @author Jeremy Layson <jeremy.b.layson@gmail.com>
    * @since 03. 06. 2017
    * @version 1.0
    */
    class Router
    {

        /**
         * @var aLinks
         * list of user-defined manual routings
         */
        private $aLinks;
        /**
         * execute the router class
         *
         * @return Array aReturn
         */
        public function exec()
        {
            $sUrl  = $_SERVER['REDIRECT_URL'];
            $aParams['get'] = $_GET;
            $aParams['post'] = $_POST;
            $aParams['request'] = $_REQUEST;

            $aReturn['params'] = $aParams;
            $aReturn['file'] = $this->getFile($sUrl);

            return $aReturn;
        }

        /**
         * lets a user manually set the class destination of the url
         */
        public function set($sUrl, $sTarget)
        {
            $this->aLinks[$sUrl] = $sTarget;
        }
        
        /**
         * convert the slash separated url to file name
         *
         * @param  String sUrl
         * @return String
         */
        private function getFile($sUrl)
        {
            $sFile = '';
            //if the user set the link manually
            if (isset($this->aLinks[$sUrl]) === true) {
                $sFile = '../controller/' . $this->aLinks[$sUrl];
                return $sFile;
            }

            $aUrl = explode('/', $sUrl);

            for ($i=0; $i<count($aUrl); $i++) {
                $sFile = $sFile . ucfirst($aUrl[$i]);
            }

            $sFile = '../controller/cont' . $sFile . '.php';
            return $sFile;
        }
    }
?>