<?php

namespace ContaoThemesNet\MateThemeBundle\Module;

class MateThemeSetup extends \BackendModule
{
    const VERSION = '1.3.4';

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
                break;
            case 'truncateTlFiles':
                $this->import('Database');
                $this->Database->prepare("TRUNCATE tl_files")->execute();
                $this->Template->messageTruncate = true;
                break;
            default:
                $this->Template->version = MateThemeSetup::VERSION;
        }
    }

    protected function getFiles($path) {
        foreach (scan($path) as $dir) {
            if(!is_dir($path."/".$dir)) {
                $pos = strpos($path,"matetheme");
                $filesFolder = "files/mate".str_replace("matetheme","",substr($path,$pos))."/".$dir;

                if($dir != "_mate_variables.scss" && $dir != "_mate_colors.scss" && $dir != "backend.css" && $dir != "mate.scss" && $dir != "materialize.scss") {
                    if(!file_exists(TL_ROOT."/".$filesFolder)) {
                        $objFile = new \File("web/bundles/".substr($path,$pos)."/".$dir, true);
                        $objFile->copyTo($filesFolder);
                    }
                }
            } else {
                $folder = $path."/".$dir;
                $pos = strpos($path,"matetheme");
                $filesFolder = "files/mate".str_replace("matetheme","",substr($path,$pos))."/".$dir;
                if($dir != "fonts" && $dir != "js" && $dir != "components" && $dir != "mate_color_schemes") {
                    if(!file_exists($filesFolder)) {
                        new \Folder($filesFolder);
                    }
                    $this->getFiles($folder);
                }
            }
        }
    }
}
