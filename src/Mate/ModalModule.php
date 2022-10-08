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
use Contao\Module;

/**
 * Class ModalModule.
 *
 * @author Philipp Seibt <develop@pdir.de>
 */
class ModalModule extends Module
{
    /**
     * Display a wildcard in the back end.
     *
     * @return string
     */
    public function generate()
    {
        if (System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest(System::getContainer()->get('request_stack')->getCurrentRequest() ?? Request::create(''))) {
            /** @var BackendTemplate|object $objTemplate */
            $objTemplate = new BackendTemplate('be_wildcard');

            $objTemplate->wildcard = '### MATE MODAL ###';
            $objTemplate->title = $this->name;
            $objTemplate->id = $this->id;
            $objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id='.$this->id;

            return $objTemplate->parse();
        }

        return parent::generate();
    }

    /**
     * Generate the module.
     */
    protected function compile(): void
    {
        if ('' !== $this->mateModal_customTpl) {
            $this->Template->setName($this->mateModal_customTpl);
        } else {
            $this->Template->setName('mod_mate_modal');
        }
        $this->Template->linkText = $this->mateModal_linkText;

        if ('' !== $this->mateModal_linkClass) {
            $this->Template->linkClass = ' '.$this->mateModal_linkClass;
        } else {
            $this->Template->linkClass = '';
        }

        if ('' !== $this->mateModal_class) {
            $this->Template->modalClass = ' '.$this->mateModal_class;
        } else {
            $this->Template->modalClass = '';
        }

        $this->Template->text = $this->mateModal_text;
    }
}
