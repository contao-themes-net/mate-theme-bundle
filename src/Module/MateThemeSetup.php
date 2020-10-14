<?php

namespace ContaoThemesNet\MateThemeBundle\Module;

class MateThemeSetup extends \BackendModule
{
    const VERSION = '2.11.8';

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
                $this->getSqlFiles($path = TL_ROOT . "/vendor/contao-themes-net/mate-theme-bundle/src/templates/mate");
                $this->Template->message = true;
                $this->Template->version = MateThemeSetup::VERSION;
                break;
            case 'truncateTlFiles':
                $this->import('Database');
                $this->Database->prepare("TRUNCATE tl_files")->execute();
                $this->Template->messageTruncate = true;
                $this->Template->version = MateThemeSetup::VERSION;
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

                if($dir != "_mate_variables.scss" && $dir != "_mate_colors.scss" && $dir != "backend.css" && $dir != "mate.scss" && $dir != "materialize.scss" && $dir != "maklermodul.scss" && $dir != "style.scss" && $dir != "mate_win.scss" && $dir != "materialize_win.scss") {
                    if(!file_exists(TL_ROOT."/".$filesFolder)) {
                        $objFile = new \File("web/bundles/".substr($path,$pos)."/".$dir, true);
                        $objFile->copyTo($filesFolder);
                    }
                }
            } else {
                $folder = $path."/".$dir;
                $pos = strpos($path,"matetheme");
                $filesFolder = "files/mate".str_replace("matetheme","",substr($path,$pos))."/".$dir;
                if($dir != "fonts" && $dir != "js" && $dir != "components" && $dir != "mate_color_schemes" && $dir != "css") {
                    if(!file_exists($filesFolder)) {
                        new \Folder($filesFolder);
                    }
                    $this->getFiles($folder);
                }
            }
        }
    }

    protected function getSqlFiles($path) {
        foreach (scan($path) as $dir) {
            if(!is_dir($path."/".$dir)) {
                $pos = strpos($path,"/vendor");
                $filesFolder = "templates/" . $dir;
                $objFile = new \File(substr($path,$pos)."/".$dir, true);
                $objFile->copyTo($filesFolder);
            }
        }
    }
}
