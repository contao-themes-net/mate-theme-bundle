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

$GLOBALS['TL_DCA']['tl_content']['palettes']['mateTeaserBox'] = '{type_legend},type,headline;{text_legend},text;{image_legend},addImage;{mateTeaserBoxSettings},mateTeaserBox_page,mateTeaserBox_pageText;{template_legend:hide},mateTeaserBox_customTpl;{expert_legend:hide},cssID,space';
$GLOBALS['TL_DCA']['tl_content']['palettes']['mateContentBox'] = '{type_legend},type,headline;{text_legend},text;{image_legend},addImage;{mateContentBoxSettings},mateContentBox_page,mateContentBox_pageText;{template_legend:hide},mateContentBox_customTpl;{expert_legend:hide},cssID,space';

//echo "<pre>"; print_r($GLOBALS['TL_DCA']['tl_content']['palettes']); echo "</pre>";

/**
 * Add fields to tl_content
 */
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

$GLOBALS['TL_DCA']['tl_content']['fields']['mateContentBox_customTpl'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mateContentBox_customTpl'],
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => array('tl_content_mate', 'getContentBoxTemplates'),
    'eval' => array('includeBlankOption'=>true, 'chosen'=>true, 'tl_class'=>'w50'),
    'sql' => "varchar(64) NOT NULL default ''"
);


$GLOBALS['TL_DCA']['tl_content']['fields']['mateTeaserBox_customTpl'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mateTeaserBox_customTpl'],
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => array('tl_content_mate', 'getTeaserBoxTemplates'),
    'eval' => array('includeBlankOption'=>true, 'chosen'=>true, 'tl_class'=>'w50'),
    'sql' => "varchar(64) NOT NULL default ''"
);

class tl_content_mate extends Backend {
    /**
     * Return all content element templates as array
     *
     * @param DataContainer $dc
     *
     * @return array
     */
    public function getContentBoxTemplates(DataContainer $dc)
    {
        return $this->getTemplateGroup('ce_mate_contentbox');
    }

    public function getTeaserBoxTemplates(DataContainer $dc)
    {
        return $this->getTemplateGroup('ce_mate_teaserbox');
    }
}