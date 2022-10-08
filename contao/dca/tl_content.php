<?php

use Contao\Backend;
use Contao\Config;
use Contao\DataContainer;

/**
 * Add palette to tl_content
 */

$GLOBALS['TL_DCA']['tl_content']['palettes']['mateTeaserBox'] = '{type_legend},type,headline;{text_legend},text,mateTeaserbox_subHeadline;{image_legend},addImage;{mateTeaserBoxSettings},mateTeaserBox_page,mateTeaserBox_pageText;{template_legend:hide},mateTeaserBox_customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{advanced_classes_legend},advancedCss;space;{invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['palettes']['mateContentBox'] = '{type_legend},type,headline;{text_legend},text;{image_legend},addImage;{mateContentBoxSettings},mateContentBox_page,mateContentBox_pageText;{template_legend:hide},mateContentBox_customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{advanced_classes_legend},advancedCss;space;{invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['palettes']['mateParallaxElement'] = '{type_legend},type,headline;{mateParallaxElementSettings},mateParallaxElement_text,mateParallaxElement_height,mateTeaserBox_page,mateTeaserBox_pageText;{image_legend},addImage;{template_legend:hide},mateParallaxElement_customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{advanced_classes_legend},advancedCss;space;{invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['palettes']['mateTextBackgroundElement'] = '{type_legend},type,headline;{text_legend},text;{image_legend},addImage;{mateTextBackground_settings},mate_background_image;{template_legend:hide},mateTextBackgroundElement_customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{advanced_classes_legend},advancedCss;{invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['palettes']['mateModal'] = '{type_legend},type;{modal_link_legend},mateModal_linkText,mateModal_linkClass;{modal_headline_legend},headline;{modal_text_legend},mateModal_text,mateModal_class;{template_legend:hide},mateModal_customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{advanced_classes_legend},advancedCss;{invisible_legend:hide},invisible,start,stop';

/**
 * Add fields to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['mateTeaserBox_page'] = array
(
    'exclude' => true,
    'inputType' => 'text',
    'wizard' => [['tl_content', 'pagePicker']],
    'eval' => array (
        'rgxp' => 'url',
        'decodeEntities' => true,
        'tl_class'=>'w50 wizard'
    ),
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['mateTeaserBox_page'],
    'sql' => "text NULL"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['mateTeaserBox_pageText'] = array
(
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array('tl_class'=>'w50'),
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['mateTeaserBox_pageText'],
    'sql' => "text NULL"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['mateContentBox_page'] = array
(
    'exclude' => true,
    'inputType' => 'text',
    'wizard' => [['tl_content', 'pagePicker']],
    'eval' => array (
        'rgxp' => 'url',
        'decodeEntities' => true,
        'tl_class'=>'w50 wizard'
    ),
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['mateContentBox_page'],
    'sql' => "text NULL"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['mateContentBox_pageText'] = array
(
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array('tl_class'=>'w50'),
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['mateContentBox_pageText'],
    'sql' => "text NULL"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['mateContentBox_customTpl'] = array
(
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => array('tl_content_mate', 'getContentBoxTemplates'),
    'eval' => array('includeBlankOption'=>true, 'chosen'=>true, 'tl_class'=>'w50'),
    'sql' => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['mateTeaserBox_customTpl'] = array
(
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => array('tl_content_mate', 'getTeaserBoxTemplates'),
    'eval' => array('includeBlankOption'=>true, 'chosen'=>true, 'tl_class'=>'w50'),
    'sql' => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['mateTeaserbox_subHeadline'] = array
(
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array('tl_class'=>'w50 clr'),
    'sql' => "text NULL"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['mateParallaxElement_customTpl'] = array
(
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => array('tl_content_mate', 'getParallaxElementTemplates'),
    'eval' => array('includeBlankOption'=>true, 'chosen'=>true, 'tl_class'=>'w50'),
    'sql' => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['mateParallaxElement_text'] = array
(
    'exclude' => true,
    'search' => true,
    'inputType' => 'textarea',
    'eval' => array('tl_class'=>'clr', 'rte'=>'tinyMCE'),
    'sql' => "TEXT NULL"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['mateParallaxElement_height'] = array
(
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array('tl_class'=>'w50 clr'),
    'sql' => "varchar(5) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['mate_background_image'] = array
(
    'exclude' => true,
    'inputType' => 'fileTree',
    'eval' => array( 'filesOnly'=>true, 'fieldType'=>'radio', 'feEditable'=>true, 'feViewable'=>true, 'feGroup'=>'personal', 'tl_class'=>'w50 autoheight' ),
    'load_callback' => array
    (
        array('tl_content_mate', 'setSingleSrcFlags')
    ),
    'sql' => "binary(16) NULL"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['mateTextBackgroundElement_customTpl'] = array
(
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => array('tl_content_mate', 'getTextBackgroundElementTemplates'),
    'eval' => array('includeBlankOption'=>true, 'chosen'=>true, 'tl_class'=>'w50'),
    'sql' => "varchar(64) NOT NULL default ''"
);

/* ModalElement */

$GLOBALS['TL_DCA']['tl_content']['fields']['mateModal_linkText'] = array
(
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array('tl_class'=>'w50'),
    'sql' => "text NULL"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['mateModal_linkClass'] = array
(
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array('tl_class'=>'w50'),
    'sql' => "text NULL"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['mateModal_text'] = array
(
    'exclude' => true,
    'search' => true,
    'inputType' => 'textarea',
    'eval' => array('rte'=>'tinyMCE'),
    'sql' => "TEXT NULL"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['mateModal_customTpl'] = array
(
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => array('tl_content_mate', 'getModalTemplates'),
    'eval' => array('includeBlankOption'=>true, 'chosen'=>true, 'tl_class'=>'w50'),
    'sql' => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['mateModal_class'] = array
(
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array('tl_class'=>'w50'),
    'sql' => "text NULL"
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

    public function getTextBackgroundElementTemplates(DataContainer $dc)
    {
        return $this->getTemplateGroup('ce_mate_text_with_background');
    }

    public function getModalTemplates(DataContainer $dc)
    {
        return $this->getTemplateGroup('ce_mate_modal');
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
