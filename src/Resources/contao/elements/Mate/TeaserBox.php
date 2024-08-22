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
 * Class TeaserBox
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
        $this->Template->pageText = $this->mateTeaserBox_pageText;
        $this->Template->subheadline = $this->mateTeaserbox_subHeadline;

        // add an image
        if ($this->addImage && $this->singleSRC != '')
        {
            $this->Template->picture = \FilesModel::findByUuid($this->singleSRC)->path;
            $objModel = \FilesModel::findByUuid($this->singleSRC);
            if ($objModel !== null && is_file(\System::getContainer()->getParameter('kernel.project_dir') . '/' . $objModel->path))
            {
                $this->singleSRC = $objModel->path;
                $this->addImageToTemplate($this->Template, $this->arrData, null, null, $objModel);
            }
        }

        // overwrite link target
        $this->Template->target = '';
        $this->Template->rel = '';
        if ($this->target)
        {
            $this->Template->target = ' target="_blank"';
            $this->Template->rel = ' rel="noreferrer noopener"';
        }

        // teaserbox plus
        if ($this->mateTeaserBoxPlus) {
            $this->Template->mateTeaserBoxPlus = $this->mateTeaserBoxPlus;
            $this->Template->backgroundText = $this->mateTeaserBoxPlus_text;
            $this->Template->fontSize = $this->mateTeaserBoxPlus_size;

            $cssClasses = [];
            $cssClasses[] = $this->mateTeaserBoxPlus_size;

            $this->Template->backgroundTextClasses = implode(' ', $cssClasses);

            $styles = [];

            if ($this->mateTeaserBoxPlus_bg) {
                $styles[] = 'background:'.$this->mateTeaserBoxPlus_bg.' !important';
            }

            if ($this->mateTeaserBoxPlus_color) {
                $styles[] = 'color:'.$this->mateTeaserBoxPlus_color.' !important';
            }

            if (0 < \count($styles)) {
                $GLOBALS['TL_BODY'][] = '<style>.mateTeaserBox'.$this->id.' .background-text span { '.html_entity_decode(implode(';', $styles)).' }</style>';
            }

            if ($this->mateTeaserBoxPlus_bgHover) {
                $GLOBALS['TL_BODY'][] = '<style>.mateTeaserBox'.$this->id.' .background-text a:hover span { background:'.html_entity_decode($this->mateTeaserBoxPlus_bgHover).' !important; }</style>';
            }

            if ($this->mateTeaserBoxPlus_colorHover) {
                $GLOBALS['TL_BODY'][] = '<style>.mateTeaserBox'.$this->id.' .background-text a:hover span { color:'.html_entity_decode($this->mateTeaserBoxPlus_colorHover).' !important; }</style>';
            }
        }
    }
}
