<?php

declare(strict_types=1);

/*
 * mate theme for Contao Open Source CMS
 *
 * Copyright (C) 2024 pdir / digital agentur <develop@pdir.de>
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
use Contao\Config;
use Contao\CoreBundle\Security\ContaoCorePermissions;
use Contao\Environment;
use Contao\FrontendTemplate;
use Contao\Image\Exception\ExceptionInterface;
use Contao\Module;
use Contao\ModuleSitemap;
use Contao\PageModel;
use Contao\StringUtil;
use Contao\System;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class NavbarModule.
 *
 * @author Mathias Arzberger <develop@pdir.de>
 */
class NavBarModule extends Module
{
    /**
     * Display a wildcard in the back end.
     */
    public function generate(): string
    {
        if (System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest(System::getContainer()->get('request_stack')->getCurrentRequest() ?? Request::create(''))) {
            /** @var BackendTemplate|object $objTemplate */
            $objTemplate = new BackendTemplate('be_wildcard');

            $objTemplate->wildcard = '### '.$GLOBALS['TL_LANG']['CTE']['mateTheme']['navbar'][0] ??= null.' ###';
            $objTemplate->title = $this->headline;
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->name;
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
        if ('type2' === $this->mateNavbarType) {
            $this->Template->setName('mod_mate_navbar_left');
        } else {
            $this->Template->setName('mod_mate_navbar');
        }

        if ('' !== $this->mateNavbar_customTpl) {
            $this->Template->setName($this->mateNavbar_customTpl);
        }

        $this->Template->navbarType = $this->mateNavbarType;
        $this->Template->showLogo = $this->mateShowLogo;
        $this->Template->showSearch = $this->mateShowSearch;
        $this->Template->showMobileMenu = $this->mateShowMobileMenu;
        $this->Template->headline = $this->headline;

        /** @var PageModel $objPage */
        global $objPage;
        // Set the trail and level
        if ($this->defineRoot && $this->rootPage > 0) {
            $trail = [$this->rootPage];
            $level = 0;
        } else {
            $trail = $objPage->trail;
            $level = $this->levelOffset > 0 ? $this->levelOffset : 0;
        }
        $lang = null;
        $host = null;

        // Overwrite the domain and language if the reference page belongs to a differnt root page (see #3765)
        if ($this->defineRoot && $this->rootPage > 0) {
            $objRootPage = PageModel::findWithDetails($this->rootPage);
            // Set the language
            if (Config::get('addLanguageToUrl') && $objRootPage->rootLanguage !== $objPage->rootLanguage) {
                $lang = $objRootPage->rootLanguage;
            }
            // Set the domain
            if ($objRootPage->rootId !== $objPage->rootId && '' !== $objRootPage->domain && $objRootPage->domain !== $objPage->domain) {
                $host = $objRootPage->domain;
            }
        }
        $this->Template->request = StringUtil::ampersand(Environment::get('indexFreeRequest'));
        $this->Template->skipId = 'skipNavigation'.$this->id;
        $this->Template->skipNavigation = StringUtil::specialchars($GLOBALS['TL_LANG']['MSC']['skipNavigation']);
        $arrItems = $this->getNavigationMenu($trail[$level], 1, $host, $lang);

        // root layout template fallback
        if ('type1' === $this->mateNavbarType) {
            $this->mateRootTpl = 'nav_mate_left';
            $this->mateMobileTpl = 'nav_mate_mobile';
            $this->mateDropdownTpl = '';
            $this->mateDropdownTplLvl3 = '';
            $this->mateDropdownTplLvl4 = '';
        }

        if ('type2' === $this->mateNavbarType) {
            $this->mateRootTpl = 'nav_mate_left';
            $this->mateMobileTpl = 'nav_mate_mobile';
            $this->mateDropdownTpl = '';
            $this->mateDropdownTplLvl3 = '';
            $this->mateDropdownTplLvl4 = '';
        }

        if ('type5' === $this->mateNavbarType || 'type3' === $this->mateNavbarType) {
            $this->mateRootTpl = 'nav_mate_root';
            $this->mateMobileTpl = 'nav_mate_mobile';
            $this->mateDropdownTpl = 'nav_mate_dropdown';
            $this->mateDropdownTplLvl3 = 'nav_mate_dropdown_lvl3';
            $this->mateDropdownTplLvl4 = 'nav_mate_dropdown_lvl4';
        }

        if (\is_array($arrItems) && \count($arrItems) > 0) {
            /** @var FrontendTemplate|object $objTemplate */
            $objTemplate = new FrontendTemplate($this->mateRootTpl);
            $objTemplate->items = $arrItems;
            $objTemplate->id = $this->id;
            $this->Template->rootNav = $objTemplate->parse();

            $objTemplate = new FrontendTemplate($this->mateMobileTpl);
            $objTemplate->items = $arrItems;
            $objTemplate->id = $this->id;
            $this->Template->mobileNav = $objTemplate->parse();

            $strDropdownNav = '';
            $strDropdownNavLvl3 = '';
            $strDropdownNavLvl4 = '';

            foreach ($arrItems as $item) {
                if (isset($item['subitems']) && \is_array($item['subitems']) && \count($item['subitems']) > 0) {
                    /** @var FrontendTemplate|object $objTemplate */
                    $objTemplate = new FrontendTemplate($this->mateDropdownTpl);
                    $objTemplate->id = $this->id;
                    $objTemplate->itemId = $item['id'];
                    $objTemplate->items = $item['subitems'];
                    $strDropdownNav .= $objTemplate->parse();

                    foreach ($item['subitems'] as $subitem) {
                        if (isset($subitem['subitems']) && \is_array($subitem['subitems']) && \count($subitem['subitems']) > 0) {
                            /** @var FrontendTemplate|object $objTemplate */
                            $objTemplate = new FrontendTemplate($this->mateDropdownTplLvl3);
                            $objTemplate->id = $this->id;
                            $objTemplate->itemId = $subitem['id'];
                            $objTemplate->items = $subitem['subitems'];
                            $strDropdownNavLvl3 .= $objTemplate->parse();

                            foreach ($subitem['subitems'] as $subitemLvl4) {
                                if (isset($subitemLvl4['subitems']) && \is_array($subitemLvl4['subitems']) && \count($subitemLvl4['subitems']) > 0) {
                                    /** @var FrontendTemplate|object $objTemplate */
                                    $objTemplate = new FrontendTemplate($this->mateDropdownTplLvl4);
                                    $objTemplate->id = $this->id;
                                    $objTemplate->itemId = $subitemLvl4['id'];
                                    $objTemplate->items = $subitemLvl4['subitems'];
                                    $strDropdownNavLvl4 .= $objTemplate->parse();
                                }
                            }
                        }
                    }
                }
            }

            $this->Template->dropdownNav = $strDropdownNav;
            $this->Template->dropdownNavLvl3 = $strDropdownNavLvl3;
            $this->Template->dropdownNavLvl4 = $strDropdownNavLvl4;
        }

        if (1 === $this->mateIncludeHeadroom) {
            $this->Template->includeHeadroom = ' includeHeadroom';
        } else {
            $this->Template->includeHeadroom = '';
        }

        if (1 === $this->mateNavbarStuck) {
            $this->Template->stuckNavbar = ' stuckNavbar';
        } else {
            $this->Template->stuckNavbar = '';
        }

        $this->Template->pid = $trail[$level];
        $this->Template->type = static::class;
        $this->Template->cssID = $this->cssID;
    }

    /**
     * Recursively compile the navigation menu and return it as array.
     *
     * @param int    $pid
     * @param int    $level
     * @param string $host
     * @param string $language
     *
     * @return string|array
     *
     * @phpstan-ignore-next-line
     */
    protected function getNavigationMenu($pid, $level = 1, $host = null, $language = null): string|array
    {
        // Get all active subpages
        // @phpstan-ignore-next-line
        $arrSubpages = static::getPublishedSubpagesByPid($pid, $this->showHidden, $this instanceof ModuleSitemap);

        if (null === $arrSubpages) {
            return '';
        }

        $items = [];
        $security = System::getContainer()->get('security.helper');
        $blnShowUnpublished = System::getContainer()->get('contao.security.token_checker')->isPreviewMode();

        ++$level;

        /** @var PageModel $objPage */
        global $objPage;

        // Browse subpages
        foreach ($arrSubpages as ['page' => $objSubpage, 'hasSubpages' => $blnHasSubpages]) {
            // Skip hidden sitemap pages
            // @phpstan-ignore-next-line
            if ($this instanceof ModuleSitemap && 'map_never' === $objSubpage->sitemap) {
                continue;
            }

            $objSubpage->loadDetails();

            // Override the domain (see #3765)
            if (null !== $host) {
                $objSubpage->domain = $host;
            }

            $subitems = '';

            // PageModel->groups is an array after calling loadDetails()
            // @phpstan-ignore-next-line
            if (!$objSubpage->protected || $this->showProtected || ($this instanceof ModuleSitemap && 'map_always' === $objSubpage->sitemap) || $security->isGranted(ContaoCorePermissions::MEMBER_IN_GROUPS, $objSubpage->groups)) {
                // Check whether there will be subpages
                if ($blnHasSubpages && (!$this->showLevel || $this->showLevel >= $level || (!$this->hardLimit && ($objPage->id === $objSubpage->id || \in_array($objPage->id, $this->Database->getChildRecords($objSubpage->id, 'tl_page'), true))))) {
                    $subitems = $this->getNavigationMenu($objSubpage->id, $level, $host, $language);
                }

                // Get href
                switch ($objSubpage->type) {
                    case 'redirect':
                        $href = $objSubpage->url;

                        if (0 === strncasecmp($href, 'mailto:', 7)) {
                            $href = StringUtil::encodeEmail($href);
                        }
                        break;

                    case 'forward':
                        if ($objSubpage->jumpTo) {
                            $objNext = PageModel::findPublishedById($objSubpage->jumpTo);
                        } else {
                            $objNext = PageModel::findFirstPublishedRegularByPid($objSubpage->id);
                        }

                        // Hide the link if the target page is invisible
                        if (!$objNext instanceof PageModel || (!$objNext->loadDetails()->isPublic && !$blnShowUnpublished)) {
                            continue 2;
                        }

                        try {
                            $href = $objNext->getFrontendUrl();
                        } catch (ExceptionInterface $exception) {
                            continue 2;
                        }
                        break;

                    default:
                        try {
                            $href = $objSubpage->getFrontendUrl();
                        } catch (ExceptionInterface $exception) {
                            continue 2;
                        }
                        break;
                }

                $items[] = $this->compileNavigationRow($objPage, $objSubpage, $subitems, $href);
            }
        }

        // Add classes first and last
        if (!empty($items)) {
            $last = \count($items) - 1;

            $items[0]['class'] = trim($items[0]['class'].' first');
            $items[$last]['class'] = trim($items[$last]['class'].' last');
        }

        return $items;
    }

    /**
     * Compile the navigation row and return it as array.
     *
     * @param string $subitems
     * @param string $href
     *
     * @phpstan-ignore-next-line
     */
    protected function compileNavigationRow(PageModel $objPage, PageModel $objSubpage, $subitems, $href): array
    {
        $row = $objSubpage->row();
        $trail = \in_array($objSubpage->id, $objPage->trail, true);

        // Use the path without query string to check for active pages (see #480)
        [$path] = explode('?', Environment::get('requestUri'), 2);

        // Active page
        // @phpstan-ignore-next-line
        if (($objPage->id === $objSubpage->id || ('forward' === $objSubpage->type && $objPage->id === $objSubpage->jumpTo)) && !($this instanceof ModuleSitemap) && $href === $path) {
            // Mark active forward pages (see #4822)
            $strClass = ('forward' === $objSubpage->type && $objPage->id === $objSubpage->jumpTo ? 'forward'.($trail ? ' trail' : '') : 'active').($subitems ? ' submenu' : '').($objSubpage->protected ? ' protected' : '').($objSubpage->cssClass ? ' '.$objSubpage->cssClass : '');

            $row['isActive'] = true;
            $row['isTrail'] = false;
        }

        // Regular page
        else {
            $strClass = ($subitems ? 'submenu' : '').($objSubpage->protected ? ' protected' : '').($trail ? ' trail' : '').($objSubpage->cssClass ? ' '.$objSubpage->cssClass : '');

            // Mark pages on the same level (see #2419)
            if ($objSubpage->pid === $objPage->pid) {
                $strClass .= ' sibling';
            }

            $row['isActive'] = false;
            $row['isTrail'] = $trail;
        }

        $row['subitems'] = $subitems;
        $row['class'] = trim($strClass);
        $row['title'] = StringUtil::specialchars($objSubpage->title, true);
        $row['pageTitle'] = StringUtil::specialchars($objSubpage->pageTitle, true);
        $row['link'] = $objSubpage->title;
        $row['href'] = $href;
        $row['rel'] = '';
        $row['target'] = '';
        $row['description'] = str_replace(["\n", "\r"], [' ', ''], (string) $objSubpage->description);

        $arrRel = [];

        // Override the link target
        if ('redirect' === $objSubpage->type && $objSubpage->target) {
            $arrRel[] = 'noreferrer';
            $arrRel[] = 'noopener';

            $row['target'] = ' target="_blank"';
        }

        // Set the rel attribute
        if (!empty($arrRel)) {
            $row['rel'] = ' rel="'.implode(' ', $arrRel).'"';
        }

        // Tag the page
        if (System::getContainer()->has('fos_http_cache.http.symfony_response_tagger')) {
            $responseTagger = System::getContainer()->get('fos_http_cache.http.symfony_response_tagger');
            $responseTagger->addTags(['contao.db.tl_page.'.$objSubpage->id]);
        }

        return $row;
    }
}
