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
 * Class ParallaxElement
 *
 * @author Philipp Seibt <develop@pdir.de>
 */
class ParallaxElement extends \ContentElement
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_mate_parallax';

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

            $objTemplate->wildcard = '### PARALLAX ELEMENT ###';
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
        if($this->mateParallaxElement_customTpl != "") {
            $this->Template->setName($this->mateParallaxElement_customTpl);
        }

        $this->Template->page = $this->mateTeaserBox_page;
        $this->Template->picture = \FilesModel::findByUuid($this->singleSRC)->path;
        $this->Template->metaImg = unserialize(\FilesModel::findByUuid($this->singleSRC)->meta);
        $this->Template->pageText = $this->mateTeaserBox_pageText;
        $this->Template->text = $this->mateParallaxElement_text;

        if ($this->addImage && $this->singleSRC != '')
        {
            $objModel = \FilesModel::findByUuid($this->singleSRC);
            if ($objModel !== null && is_file(\System::getContainer()->getParameter('kernel.project_dir') . '/' . $objModel->path))
            {
                $this->singleSRC = $objModel->path;
                $this->addImageToTemplate($this->Template, $this->arrData, null, null, $objModel);
            }
        }

        if($this->mateParallaxElement_height != "") {
            $this->Template->height = "min-height:".$this->mateParallaxElement_height."px;";
        }
    }
}
