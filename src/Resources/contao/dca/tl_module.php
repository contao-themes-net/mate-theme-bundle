<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */

/**
 * Add palette to tl_content
 */

$GLOBALS['TL_DCA']['tl_module']['palettes']['mateNavbar'] = '{title_legend},name,headline,type; ,levelOffset,showLevel,hardLimit,showProtected,showHidden;{mateNavbarSettings},mateNavbarType,mateShowLogo,mateShowSearch,mateShowMobileMenu;{expert_legend:hide},cssID,space';

/**
 * Add fields to tl_content
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['mateNavbarType'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_module']['mateNavbarType'],
    'exclude' => true,
    'eval' => array(
        'mandatory' => true,
        'multiple' => false,
        'maxlength' => 64,
        'tl_class' => 'wizard'
    ),
    'inputType' => 'select',
    'options' => array('type2','type5'),
    'reference' => &$GLOBALS['TL_LANG']['tl_module']['mate_navbar'],
    'sql' => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['mateShowLogo'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_module']['mateShowLogo'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50 clr'),
    'sql'       =>  "int(1) NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['mateShowSearch'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_module']['mateShowSearch'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50'),
    'sql'       =>  "int(1) NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['mateShowMobileMenu'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_module']['mateShowMobileMenu'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50'),
    'sql'       =>  "int(1) NOT NULL default '0'"
);
