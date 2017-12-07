<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */

namespace ContaoThemesNet\MateThemeBundle\Mate;

/**
 * Class ContentProducts
 *
 * @author Mathias Arzberger <develop@pdir.de>
 */
class ContentBox extends \ContentElement
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_mate_contentbox';

    /**
     * Display a wildcard in the back end
     *
     * @return string
     */
    public function generate()
    {
        if (TL_MODE == 'BE')
        {
            /** @var \BackendTemplate|object $objTemplate */
            $objTemplate = new \BackendTemplate('be_wildcard');
            $objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['CTE']['mateContentBox'][0]) . ' ###';
            $objTemplate->title = $this->headline;
			$objTemplate->text = $this->text;

            return $objTemplate->parse();
        }

        return parent::generate();
    }


    /**
     * Generate the module
     */
    protected function compile()
    {
        $this->Template->page = $this->mateContentBox_page;
        $this->Template->href = \FilesModel::findByUuid($this->singleSRC)->path;
        $this->Template->pageText = $this->mateContentBox_pageText;
    }
}
