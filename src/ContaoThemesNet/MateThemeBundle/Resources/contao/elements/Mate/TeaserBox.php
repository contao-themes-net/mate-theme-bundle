<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */

namespace Pdir\Contao\Mate;

/**
 * Class ContentProducts
 *
 * @author Mathias Arzberger <develop@pdir.de>
 */
class TeaserBox extends \ContentElement
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_mate_teaserbox';

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

            $objTemplate->wildcard = '### MATE_TEASERBOX ###';
            // $objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['CTE']['mateTheme']['teaserbox'][0]) . ' ###';
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
        $this->Template->page = $this->mateTeaserBox_page;
        $this->Template->href = \FilesModel::findByUuid($this->singleSRC)->path;
        $this->Template->picture = $this->singleSRC;
        $this->Template->pageText = $this->mateTeaserBox_pageText;
    }
}