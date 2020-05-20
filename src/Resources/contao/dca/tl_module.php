<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */

/**
 * Add palette to tl_module
 */

$GLOBALS['TL_DCA']['tl_module']['palettes']['mateNavbar'] = '{title_legend},name,headline,type;levelOffset,showLevel,hardLimit,showProtected,showHidden;{mateNavbarSettings},mateNavbar_customTpl,mateNavbarType,mateShowLogo,mateShowSearch,mateShowMobileMenu,mateIncludeHeadroom,mateNavbarStuck;{expert_legend:hide},cssID,space';

$GLOBALS['TL_DCA']['tl_module']['palettes']['mateModal'] = '{title_legend},name,type;{modal_link_legend},mateModal_linkText,mateModal_linkClass;{modal_headline_legend},headline;{modal_text_legend},mateModal_text,mateModal_class;{template_legend:hide},mateModal_customTpl;{expert_legend:hide},cssID,space';

$GLOBALS['TL_DCA']['tl_module']['palettes']['newslist'] = str_replace(
    'imgSize;',
    'imgSize;{mate_slider_legend},mateSliderHeight,mateSliderInterval,mateSliderDuration,mateSliderIndicators;',
    $GLOBALS['TL_DCA']['tl_module']['palettes']['newslist']
);

/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['mateNavbarType'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_module']['mateNavbarType'],
    'exclude' => true,
    'eval' => array(
        'mandatory' => true,
        'multiple' => false,
        'maxlength' => 64,
        'tl_class' => 'wizard w50'
    ),
    'inputType' => 'select',
    'options' => array('type1','type2','type5'),
    'reference' => &$GLOBALS['TL_LANG']['tl_module']['mate_navbar'],
    'sql' => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['mateShowLogo'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_module']['mateShowLogo'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50 clr'),
    'sql'       =>  "int(1) NOT NULL default '1'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['mateShowSearch'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_module']['mateShowSearch'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50'),
    'sql'       =>  "int(1) NOT NULL default '1'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['mateShowMobileMenu'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_module']['mateShowMobileMenu'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50'),
    'sql'       =>  "int(1) NOT NULL default '1'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['mateIncludeHeadroom'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_module']['mateIncludeHeadroom'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50'),
    'sql'       =>  "int(1) NOT NULL default '1'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['mateNavbarStuck'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_module']['mateNavbarStuck'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50'),
    'sql'       =>  "int(1) NOT NULL default '1'"
);

/* ModalElement */

$GLOBALS['TL_DCA']['tl_module']['fields']['mateModal_linkText'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_module']['mateModal_linkText'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array('tl_class'=>'w50'),
    'sql' => "text NULL"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['mateModal_linkClass'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_module']['mateModal_linkClass'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array('tl_class'=>'w50'),
    'sql' => "text NULL"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['mateModal_text'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_module']['mateModal_text'],
    'exclude' => true,
    'search' => true,
    'inputType' => 'textarea',
    'eval' => array('rte'=>'tinyMCE'),
    'sql' => "TEXT NULL"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['mateModal_customTpl'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_module']['mateModal_customTpl'],
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => array('tl_module_mate', 'getModalTemplates'),
    'eval' => array('includeBlankOption'=>true, 'chosen'=>true, 'tl_class'=>'w50'),
    'sql' => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['mateModal_class'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_module']['mateModal_class'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array('tl_class'=>'w50'),
    'sql' => "text NULL"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['mateNavbar_customTpl'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['mateNavbar_customTpl'],
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => ['tl_module_mate', 'getNavbarTemplates'],
    'eval' => ['includeBlankOption'=>true, 'chosen'=>true, 'tl_class'=>'w50'],
    'sql' => "varchar(64) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_module']['fields']['mateSliderHeight'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['mateSliderHeight'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['maxlength' => 5, 'tl_class'=>'w50'],
    'sql' => "varchar(5) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_module']['fields']['mateSliderInterval'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['mateSliderInterval'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['maxlength' => 8, 'tl_class'=>'w50'],
    'sql' => "varchar(8) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_module']['fields']['mateSliderDuration'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['mateSliderDuration'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['maxlength' => 8, 'tl_class'=>'w50'],
    'sql' => "varchar(8) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_module']['fields']['mateSliderIndicators'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['mateSliderIndicators'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class'=>'w50 clr'],
    'sql' => "char(1) NOT NULL default '1'"
];

class tl_module_mate extends Backend {
    /**
     * Return all content element templates as array
     *
     * @param DataContainer $dc
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
