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

/*
 * Add palette to tl_module
 */

$GLOBALS['TL_DCA']['tl_module']['palettes']['mateNavbar'] = '{title_legend},name,headline,type;levelOffset,showLevel,hardLimit,showProtected,showHidden;{mateNavbarSettings},mateNavbar_customTpl,mateNavbarType,mateShowLogo,mateShowSearch,mateShowMobileMenu,mateIncludeHeadroom,mateNavbarStuck;{expert_legend:hide},cssID,space';

$GLOBALS['TL_DCA']['tl_module']['palettes']['mateModal'] = '{title_legend},name,type;{modal_link_legend},mateModal_linkText,mateModal_linkClass;{modal_headline_legend},headline;{modal_text_legend},mateModal_text,mateModal_class;{template_legend:hide},mateModal_customTpl;{expert_legend:hide},cssID,space';

$GLOBALS['TL_DCA']['tl_module']['palettes']['newslist'] = str_replace(
    'imgSize;',
    'imgSize;{mate_slider_legend},mateSliderHeight,mateSliderInterval,mateSliderDuration,mateSliderIndicators;',
    $GLOBALS['TL_DCA']['tl_module']['palettes']['newslist']
);

/*
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['mateNavbarType'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['mateNavbarType'],
    'exclude' => true,
    'eval' => [
        'mandatory' => true,
        'multiple' => false,
        'maxlength' => 64,
        'tl_class' => 'wizard w50',
    ],
    'inputType' => 'select',
    'options' => ['type1', 'type2', 'type3', 'type5'],
    'reference' => &$GLOBALS['TL_LANG']['tl_module']['mate_navbar'],
    'sql' => "varchar(64) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['mateShowLogo'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['mateShowLogo'],
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50 clr'],
    'sql' => "int(1) NOT NULL default '1'",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['mateShowSearch'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['mateShowSearch'],
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50'],
    'sql' => "int(1) NOT NULL default '1'",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['mateShowMobileMenu'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['mateShowMobileMenu'],
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50'],
    'sql' => "int(1) NOT NULL default '1'",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['mateIncludeHeadroom'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['mateIncludeHeadroom'],
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50'],
    'sql' => "int(1) NOT NULL default '1'",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['mateNavbarStuck'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['mateNavbarStuck'],
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50'],
    'sql' => "int(1) NOT NULL default '1'",
];

/* ModalElement */

$GLOBALS['TL_DCA']['tl_module']['fields']['mateModal_linkText'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['mateModal_linkText'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50'],
    'sql' => 'text NULL',
];

$GLOBALS['TL_DCA']['tl_module']['fields']['mateModal_linkClass'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['mateModal_linkClass'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50'],
    'sql' => 'text NULL',
];

$GLOBALS['TL_DCA']['tl_module']['fields']['mateModal_text'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['mateModal_text'],
    'exclude' => true,
    'search' => true,
    'inputType' => 'textarea',
    'eval' => ['rte' => 'tinyMCE'],
    'sql' => 'TEXT NULL',
];

$GLOBALS['TL_DCA']['tl_module']['fields']['mateModal_customTpl'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['mateModal_customTpl'],
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => ['tl_module_mate', 'getModalTemplates'],
    'eval' => ['includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'],
    'sql' => "varchar(64) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['mateModal_class'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['mateModal_class'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50'],
    'sql' => 'text NULL',
];

$GLOBALS['TL_DCA']['tl_module']['fields']['mateNavbar_customTpl'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['mateNavbar_customTpl'],
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => ['tl_module_mate', 'getNavbarTemplates'],
    'eval' => ['includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'],
    'sql' => "varchar(64) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['mateSliderHeight'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['mateSliderHeight'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['maxlength' => 5, 'tl_class' => 'w50'],
    'sql' => "varchar(5) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['mateSliderInterval'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['mateSliderInterval'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['maxlength' => 8, 'tl_class' => 'w50'],
    'sql' => "varchar(8) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['mateSliderDuration'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['mateSliderDuration'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['maxlength' => 8, 'tl_class' => 'w50'],
    'sql' => "varchar(8) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['mateSliderIndicators'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['mateSliderIndicators'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50 clr'],
    'sql' => "char(1) NOT NULL default '1'",
];

class tl_module_mate extends Backend
{
    /**
     * Return all content element templates as array.
     *
     * @return array
     */
    public function getModalTemplates(DataContainer $dc)
    {
        return $this->getTemplateGroup('mod_mate_modal');
    }

    public function getNavbarTemplates(DataContainer $dc)
    {
        return $this->getTemplateGroup('mod_mate_navbar');
    }
}
