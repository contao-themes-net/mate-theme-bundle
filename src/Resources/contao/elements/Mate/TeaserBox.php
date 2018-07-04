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
            $objTemplate = new \BackendTemplate('be_wildcard_text');

            $objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['CTE']['mateTeaserBox'][0]) . ' ###';
            $objTemplate->title = $this->headline;
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->name;
            $objTemplate->text = \StringUtil::toHtml5($this->text);

            return $objTemplate->parse();
        }

        return parent::generate();
    }


    /**
     * Generate the module
     */
    protected function compile()
    {
        if($this->mateTeaserBox_customTpl != "") {
            $this->Template->setName($this->mateTeaserBox_customTpl);
        }

        $this->Template->page = $this->mateTeaserBox_page;
        $this->Template->picture = \FilesModel::findByUuid($this->singleSRC)->path;
        $this->Template->metaImg = unserialize(\FilesModel::findByUuid($this->singleSRC)->meta);
        $this->Template->pageText = $this->mateTeaserBox_pageText;
    }
}
