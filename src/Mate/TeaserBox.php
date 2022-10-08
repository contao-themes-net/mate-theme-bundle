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
 * Class TeaserBox.
 *
 * @author Mathias Arzberger <develop@pdir.de>
 */
class TeaserBox extends ContentElement
{
    /**
     * Template.
     *
     * @var string
     */
    protected $strTemplate = 'ce_mate_teaserbox';

    /**
     * Display a wildcard in the back end.
     *
     * @return string
     */
    public function generate(): string
    {
        if (System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest(System::getContainer()->get('request_stack')->getCurrentRequest() ?? Request::create(''))) {
            $objTemplate = new BackendTemplate('be_wildcard_text');

            $objTemplate->wildcard = '### '.$GLOBALS['TL_LANG']['CTE']['mateTeaserBox'][0]?? null.' ###';
            $objTemplate->title = $this->headline;
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->name;
            $objTemplate->text = $this->text?? '';

            return $objTemplate->parse();
        }

        return parent::generate();
    }

    /**
     * Generate the module.
     */
    protected function compile(): void
    {
        if ('' !== $this->mateTeaserBox_customTpl) {
            $this->Template->setName($this->mateTeaserBox_customTpl);
        }

        $this->Template->page = $this->mateTeaserBox_page;
        $this->Template->picture = FilesModel::findByUuid($this->singleSRC)->path;
        $this->Template->metaImg = unserialize(FilesModel::findByUuid($this->singleSRC)->meta);
        $this->Template->pageText = $this->mateTeaserBox_pageText;
        $this->Template->subheadline = $this->mateTeaserbox_subHeadline;

        // add an image
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
                    ->buildIfResourceExists();
                $figure?->applyLegacyTemplateData($this->Template, null, $this->floating);
                if (null === $figure) {
                    $this->Template->addImage = false;
                }
            }
        }

        // overwrite link target
        $this->Template->target = '';
        $this->Template->rel = '';

        if ($this->target) {
            $this->Template->target = ' target="_blank"';
            $this->Template->rel = ' rel="noreferrer noopener"';
        }
    }
}
