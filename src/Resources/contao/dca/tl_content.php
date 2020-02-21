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

$GLOBALS['TL_DCA']['tl_content']['palettes']['mateTeaserBox'] = '{type_legend},type,headline;{text_legend},text,mateTeaserbox_subHeadline;{image_legend},addImage;{mateTeaserBoxSettings},mateTeaserBox_page,mateTeaserBox_pageText;{template_legend:hide},mateTeaserBox_customTpl;{expert_legend:hide},cssID,space';

$GLOBALS['TL_DCA']['tl_content']['palettes']['mateContentBox'] = '{type_legend},type,headline;{text_legend},text;{image_legend},addImage;{mateContentBoxSettings},mateContentBox_page,mateContentBox_pageText;{template_legend:hide},mateContentBox_customTpl;{expert_legend:hide},cssID,space';

$GLOBALS['TL_DCA']['tl_content']['palettes']['mateParallaxElement'] = '{type_legend},type,headline;{mateParallaxElementSettings},mateParallaxElement_text,mateParallaxElement_height,mateTeaserBox_page,mateTeaserBox_pageText;{image_legend},addImage;{template_legend:hide},mateParallaxElement_customTpl;{expert_legend:hide},cssID,space';

$GLOBALS['TL_DCA']['tl_content']['palettes']['mateTextBackgroundElement'] = '{type_legend},type,headline;{text_legend},text;{image_legend},addImage;{mateTextBackground_settings},mate_background_image;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';

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
        'tl_class'=>'w50 autoheight'
    ),
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['mateTeaserBox_page'],
    'sql' => "text NULL"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['mateTeaserBox_pageText'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mateTeaserBox_pageText'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array('tl_class'=>'w50'),
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['mateTeaserBox_pageText'],
    'sql' => "text NULL"
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
    'sql' => "text NULL"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['mateContentBox_pageText'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mateContentBox_pageText'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array('tl_class'=>'w50'),
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['mateContentBox_pageText'],
    'sql' => "text NULL"
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

$GLOBALS['TL_DCA']['tl_content']['fields']['mateTeaserbox_subHeadline'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mateTeaserbox_subHeadline'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array('tl_class'=>'w50 clr'),
    'sql' => "text NULL"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['mateParallaxElement_customTpl'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mateParallaxElement_customTpl'],
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => array('tl_content_mate', 'getParallaxElementTemplates'),
    'eval' => array('includeBlankOption'=>true, 'chosen'=>true, 'tl_class'=>'w50'),
    'sql' => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['mateParallaxElement_text'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mateParallaxElement_text'],
    'exclude' => true,
    'search' => true,
    'inputType' => 'textarea',
    'eval' => array('tl_class'=>'clr', 'rte'=>'tinyMCE'),
    'sql' => "TEXT NULL"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['mateParallaxElement_height'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mateParallaxElement_height'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array('tl_class'=>'w50 clr'),
    'sql' => "varchar(5) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['mate_background_image'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mate_background_image'],
    'exclude' => true,
    'inputType' => 'fileTree',
    'eval' => array( 'filesOnly'=>true, 'fieldType'=>'radio', 'feEditable'=>true, 'feViewable'=>true, 'feGroup'=>'personal', 'tl_class'=>'w50 autoheight' ),
    'load_callback' => array
    (
        array('tl_content_mate', 'setSingleSrcFlags')
    ),
    'sql' => "binary(16) NULL"
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

    public function getParallaxElementTemplates(DataContainer $dc)
    {
        return $this->getTemplateGroup('ce_mate_parallax');
    }

    /**
     * Dynamically add flags to the "singleSRC" field
     *
     * @param mixed         $varValue
     * @param DataContainer $dc
     *
     * @return mixed
     */
    public function setSingleSrcFlags($varValue, DataContainer $dc)
    {
        if ($dc->activeRecord)
        {
            switch ($dc->activeRecord->type)
            {
                case 'text':
                case 'hyperlink':
                case 'image':
                case 'accordionSingle':
                    $GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['eval']['extensions'] = Config::get('validImageTypes');
                    break;
                case 'download':
                    $GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['eval']['extensions'] = Config::get('allowedDownload');
                    break;
            }
        }
        return $varValue;
    }
}
