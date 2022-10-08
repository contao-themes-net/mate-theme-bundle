<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */

namespace ContaoThemesNet\MateThemeBundle\Mate;

use Contao\BackendTemplate;
use Contao\ContentElement;
use Contao\FilesModel;
use Contao\StringUtil;
use Contao\System;

/**
 * Class ContentBox
 *
 * @author Mathias Arzberger <develop@pdir.de>
 */
class ContentBox extends ContentElement
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
    public function generate(): string
    {
        if (System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest(System::getContainer()->get('request_stack')->getCurrentRequest() ?? Request::create('')))
        {
            $objTemplate = new BackendTemplate('be_wildcard_text');

            $objTemplate->wildcard = '### ' . $GLOBALS['TL_LANG']['CTE']['mateContentBox'][0] ?? null . ' ###';
            $objTemplate->title = $this->headline;
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->name;
            $objTemplate->text = $this->text ?? '';

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
        if(!is_null($this->singleSRC)) $this->Template->href = FilesModel::findByUuid($this->singleSRC)->path;
        $this->Template->pageText = $this->mateContentBox_pageText;

        // add an image
        if ($this->addImage && $this->singleSRC != '')
        {
            $objModel = FilesModel::findByUuid($this->singleSRC);
            if ($objModel !== null && is_file(System::getContainer()->getParameter('kernel.project_dir') . '/' . $objModel->path))
            {
                $this->singleSRC = $objModel->path;

                $figure = System::getContainer()
                    ->get('contao.image.studio')
                    ->createFigureBuilder()
                    ->from($this->singleSRC)
                    ->setSize($this->size)
                    ->setMetadata($this->objModel->getOverwriteMetadata())
                    ->enableLightbox($this->fullsize)
                    ->buildIfResourceExists();
                $figure?->applyLegacyTemplateData($this->Template, null, $this->floating);
                if (null === $figure) {
                    $this->Template->addImage = false;
                }

            }
        }
    }
}
