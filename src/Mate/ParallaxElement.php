<?php

declare(strict_types=1);

/*
 * mate theme for Contao Open Source CMS
 *
 * Copyright (C) 2022 pdir / digital agentur <develop@pdir.de>
 *
 * @package    contao-themes-net/mate-theme-bundle
 * @link       https://github.com/contao-themes-net/mate-theme-bundle
 * @license    pdir contao theme licence
 * @author     Mathias Arzberger <develop@pdir.de>
 * @author     Philipp Seibt <develop@pdir.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ContaoThemesNet\MateThemeBundle\Mate;

use Contao\BackendTemplate;
use Contao\ContentElement;
use Contao\FilesModel;
use Contao\System;

/**
 * Class ParallaxElement.
 *
 * @author Philipp Seibt <develop@pdir.de>
 */
class ParallaxElement extends ContentElement
{
    /**
     * Template.
     *
     * @var string
     */
    protected $strTemplate = 'ce_mate_parallax';

    /**
     * Display a wildcard in the back end.
     *
     * @return string
     */
    public function generate()
    {
        if (System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest(System::getContainer()->get('request_stack')->getCurrentRequest() ?? Request::create(''))) {
            $objTemplate = new BackendTemplate('be_wildcard_text');

            $objTemplate->wildcard = '### PARALLAX ELEMENT ###';
            $objTemplate->title = $this->headline;
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->name;
            $objTemplate->text = $this->text ?? '';

            return $objTemplate->parse();
        }

        return parent::generate();
    }

    /**
     * Generate the module.
     */
    protected function compile(): void
    {
        if ('' !== $this->mateParallaxElement_customTpl) {
            $this->Template->setName($this->mateParallaxElement_customTpl);
        }

        $this->Template->page = $this->mateTeaserBox_page;
        $this->Template->picture = FilesModel::findByUuid($this->singleSRC) ? FilesModel::findByUuid($this->singleSRC)->path : null;
        $this->Template->metaImg = unserialize(FilesModel::findByUuid($this->singleSRC)->meta);
        $this->Template->pageText = $this->mateTeaserBox_pageText;
        $this->Template->text = $this->mateParallaxElement_text;

        if ($this->addImage && '' !== $this->singleSRC) {
            $objModel = FilesModel::findByUuid($this->singleSRC);

            if (null !== $objModel && is_file(System::getContainer()->getParameter('kernel.project_dir').'/'.$objModel->path)) {
                $this->singleSRC = $objModel->path;

                $figure = System::getContainer()
                    ->get('contao.image.studio')
                    ->createFigureBuilder()
                    ->from($this->singleSRC)
                    ->setSize($this->size)
                    ->setMetadata($this->objModel->getOverwriteMetadata())
                    ->enableLightbox($this->fullsize)
                    ->buildIfResourceExists()
                ;
                $figure?->applyLegacyTemplateData($this->Template, null, $this->floating);

                if (null === $figure) {
                    $this->Template->addImage = false;
                }
            }
        }

        if ('' !== $this->mateParallaxElement_height) {
            $this->Template->height = 'min-height:'.$this->mateParallaxElement_height.'px;';
        }
    }
}
