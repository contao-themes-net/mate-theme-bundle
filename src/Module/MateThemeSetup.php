<?php

namespace ContaoThemesNet\MateThemeBundle\Module;

class MateThemeSetup extends \BackendModule
{
    const VERSION = '1.0.35';

    protected $strTemplate = 'be_mateTheme_setup';

    /**
     * Generate the module
     */
    protected function compile()
    {
        switch (\Input::get('act')) {
            case 'syncFolder':
                $path = TL_ROOT . '/web/bundles/matetheme';
                if(!file_exists("files/mate")) {
                    new \Folder("files/mate");
                }
                $this->getFiles($path);
                $this->Template->message = true;
            default:
                $this->Template->version = MateThemeSetup::VERSION;
        }
    }

    protected function getFiles($path) {
        foreach (scan($path) as $dir) {
            if(!is_dir($path."/".$dir)) {
                $pos = strpos($path,"matetheme");
                $filesFolder = "files/mate".str_replace("matetheme","",substr($path,$pos))."/".$dir;

                if($dir != "_mate_variables.scss" && $dir != "backend.css" && $dir != "mate.scss" && $dir != "materialize.scss") {
                    if(!file_exists(TL_ROOT."/".$filesFolder)) {
                        $objFile = new \File("web/bundles/".substr($path,$pos)."/".$dir, true);
                        $objFile->copyTo($filesFolder);
                    }
                }
            } else {
                $folder = $path."/".$dir;
                $pos = strpos($path,"matetheme");
                $filesFolder = "files/mate".str_replace("matetheme","",substr($path,$pos))."/".$dir;
                if($dir != "fonts" && $dir != "js" && $dir != "components") {
                    if(!file_exists($filesFolder)) {
                        new \Folder($filesFolder);
                    }
                    $this->getFiles($folder);
                }
            }
        }
    }
}
