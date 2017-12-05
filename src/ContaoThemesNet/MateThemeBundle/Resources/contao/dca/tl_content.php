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

// echo "<pre>"; print_r($GLOBALS['TL_DCA']['tl_content']['palettes']); echo "</pre>";

$GLOBALS['TL_DCA']['tl_content']['palettes']['mateNavbar'] = '{type_legend},type,headline,mateNavbarType;{expert_legend:hide},cssID,space';
$GLOBALS['TL_DCA']['tl_content']['palettes']['mateTeaserBox'] = '{type_legend},type,headline;{text_legend},text;{image_legend},addImage;mateTeaserBox_page,mateTeaserBox_pageText;{expert_legend:hide},cssID,space';
$GLOBALS['TL_DCA']['tl_content']['palettes']['mateContentBox'] = '{type_legend},type,headline;{text_legend},text;{image_legend},addImage;mateContentBox_page,mateContentBox_pageText;{expert_legend:hide},cssID,space';

//echo "<pre>"; print_r($GLOBALS['TL_DCA']['tl_content']['palettes']); echo "</pre>";

/**
 * Add fields to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['mateNavbarType'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mateNavbarType'],
    'exclude' => true,
    'eval' => array(
        'mandatory' => true,
        'multiple' => false,
        'maxlength' => 64,
        'tl_class' => 'w50 wizard'
    ),
    'inputType' => 'select',
    'options' => array('','type1','type2','type3','type4','type5','type6','type7'),
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['mate_navbar'],
    'sql' => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['mateTeaserBox_page'] = array
(
    'label' => & $GLOBALS['TL_LANG']['tl_content']['mateTeaserBox_page'],
    'exclude' => true,
    'inputType' => 'pageTree',
    'eval' => array (
        'fieldType' => 'radio',
        'tl_class'=>'w50'
    ),
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['mateTeaserBox_page'],
	'sql' => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['mateTeaserBox_pageText'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mateTeaserBox_pageText'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array('tl_class'=>'w50'),
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['mateTeaserBox_pageText'],
    'sql' => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['mateContentBox_page'] = array
(
    'label' => & $GLOBALS['TL_LANG']['tl_content']['mateContentBox_page'],
    'exclude' => true,
    'inputType' => 'pageTree',
    'eval' => array (
        'fieldType' => 'radio',
        'tl_class'=>'w50'
    ),
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['mateContentBox_page'],
    'sql' => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['mateContentBox_pageText'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mateContentBox_pageText'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array('tl_class'=>'w50'),
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['mateContentBox_pageText'],
    'sql' => "varchar(255) NOT NULL default ''"
);