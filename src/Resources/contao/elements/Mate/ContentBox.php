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
 * Class ContentBox
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
            $objTemplate = new \BackendTemplate('be_wildcard_text');

            $objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['CTE']['mateContentBox'][0]) . ' ###';
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
        if($this->mateContentBox_customTpl != "") {
            $this->Template->setName($this->mateContentBox_customTpl);
        }

        $this->Template->page = $this->mateContentBox_page;
        $this->Template->href = \FilesModel::findByUuid($this->singleSRC)->path;
        $this->Template->pageText = $this->mateContentBox_pageText;

        // add an image
        if ($this->addImage && $this->singleSRC != '')
        {
            $objModel = \FilesModel::findByUuid($this->singleSRC);
            if ($objModel !== null && is_file(\System::getContainer()->getParameter('kernel.project_dir') . '/' . $objModel->path))
            {
                $this->singleSRC = $objModel->path;
                $this->addImageToTemplate($this->Template, $this->arrData, null, null, $objModel);
            }
        }
    }
}
