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
 * Add palette to tl_content
 */

$GLOBALS['TL_DCA']['tl_content']['palettes']['mateTeaserBox'] = '{type_legend},type,headline;{text_legend},text,mateTeaserbox_subHeadline;{image_legend},addImage;{mateTeaserBoxSettings},mateTeaserBox_page,mateTeaserBox_pageText;{template_legend:hide},mateTeaserBox_customTpl;{expert_legend:hide},guests,cssID;{advanced_classes_legend},advancedCss;space;{invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['palettes']['mateContentBox'] = '{type_legend},type,headline;{text_legend},text;{image_legend},addImage;{mateContentBoxSettings},mateContentBox_page,mateContentBox_pageText;{template_legend:hide},mateContentBox_customTpl;{expert_legend:hide},guests,cssID;{advanced_classes_legend},advancedCss;space;{invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['palettes']['mateParallaxElement'] = '{type_legend},type,headline;{mateParallaxElementSettings},mateParallaxElement_text,mateParallaxElement_height,mateTeaserBox_page,mateTeaserBox_pageText;{image_legend},addImage;{template_legend:hide},mateParallaxElement_customTpl;{expert_legend:hide},guests,cssID;{advanced_classes_legend},advancedCss;space;{invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['palettes']['mateTextBackgroundElement'] = '{type_legend},type,headline;{text_legend},text;{image_legend},addImage;{mateTextBackground_settings},mate_background_image;{template_legend:hide},mateTextBackgroundElement_customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{advanced_classes_legend},advancedCss;{invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['palettes']['mateModal'] = '{type_legend},type;{modal_link_legend},mateModal_linkText,mateModal_linkClass;{modal_headline_legend},headline;{modal_text_legend},mateModal_text,mateModal_class;{template_legend:hide},mateModal_customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{advanced_classes_legend},advancedCss;{invisible_legend:hide},invisible,start,stop';

/*
 * Add fields to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['mateTeaserBox_page'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mateTeaserBox_page'],
    'exclude' => true,
    'inputType' => 'pageTree',
    'eval' => [
        'fieldType' => 'radio',
        'tl_class' => 'w50 autoheight',
    ],
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['mateTeaserBox_page'],
    'sql' => 'text NULL',
];

$GLOBALS['TL_DCA']['tl_content']['fields']['mateTeaserBox_pageText'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mateTeaserBox_pageText'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50'],
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['mateTeaserBox_pageText'],
    'sql' => 'text NULL',
];

$GLOBALS['TL_DCA']['tl_content']['fields']['mateContentBox_page'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mateContentBox_page'],
    'exclude' => true,
    'inputType' => 'pageTree',
    'eval' => [
        'fieldType' => 'radio',
        'tl_class' => 'w50',
    ],
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['mateContentBox_page'],
    'sql' => 'text NULL',
];

$GLOBALS['TL_DCA']['tl_content']['fields']['mateContentBox_pageText'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mateContentBox_pageText'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50'],
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['mateContentBox_pageText'],
    'sql' => 'text NULL',
];

$GLOBALS['TL_DCA']['tl_content']['fields']['mateContentBox_customTpl'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mateContentBox_customTpl'],
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => ['tl_content_mate', 'getContentBoxTemplates'],
    'eval' => ['includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'],
    'sql' => "varchar(64) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['mateTeaserBox_customTpl'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mateTeaserBox_customTpl'],
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => ['tl_content_mate', 'getTeaserBoxTemplates'],
    'eval' => ['includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'],
    'sql' => "varchar(64) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['mateTeaserbox_subHeadline'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mateTeaserbox_subHeadline'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50 clr'],
    'sql' => 'text NULL',
];

$GLOBALS['TL_DCA']['tl_content']['fields']['mateParallaxElement_customTpl'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mateParallaxElement_customTpl'],
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => ['tl_content_mate', 'getParallaxElementTemplates'],
    'eval' => ['includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'],
    'sql' => "varchar(64) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['mateParallaxElement_text'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mateParallaxElement_text'],
    'exclude' => true,
    'search' => true,
    'inputType' => 'textarea',
    'eval' => ['tl_class' => 'clr', 'rte' => 'tinyMCE'],
    'sql' => 'TEXT NULL',
];

$GLOBALS['TL_DCA']['tl_content']['fields']['mateParallaxElement_height'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mateParallaxElement_height'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50 clr'],
    'sql' => "varchar(5) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['mate_background_image'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mate_background_image'],
    'exclude' => true,
    'inputType' => 'fileTree',
    'eval' => ['filesOnly' => true, 'fieldType' => 'radio', 'feEditable' => true, 'feViewable' => true, 'feGroup' => 'personal', 'tl_class' => 'w50 autoheight'],
    'load_callback' => [
        ['tl_content_mate', 'setSingleSrcFlags'],
    ],
    'sql' => 'binary(16) NULL',
];

$GLOBALS['TL_DCA']['tl_content']['fields']['mateTextBackgroundElement_customTpl'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['customTpl'],
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => ['tl_content_mate', 'getTextBackgroundElementTemplates'],
    'eval' => ['includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'],
    'sql' => "varchar(64) NOT NULL default ''",
];

/* ModalElement */

$GLOBALS['TL_DCA']['tl_content']['fields']['mateModal_linkText'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mateModal_linkText'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50'],
    'sql' => 'text NULL',
];

$GLOBALS['TL_DCA']['tl_content']['fields']['mateModal_linkClass'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mateModal_linkClass'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50'],
    'sql' => 'text NULL',
];

$GLOBALS['TL_DCA']['tl_content']['fields']['mateModal_text'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mateModal_text'],
    'exclude' => true,
    'search' => true,
    'inputType' => 'textarea',
    'eval' => ['rte' => 'tinyMCE'],
    'sql' => 'TEXT NULL',
];

$GLOBALS['TL_DCA']['tl_content']['fields']['mateModal_customTpl'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mateModal_customTpl'],
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => ['tl_content_mate', 'getModalTemplates'],
    'eval' => ['includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'],
    'sql' => "varchar(64) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['mateModal_class'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mateModal_class'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50'],
    'sql' => 'text NULL',
];

class tl_content_mate extends Backend
{
    /**
     * Return all content element templates as array.
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
     * Dynamically add flags to the "singleSRC" field.
     *
     * @param mixed $varValue
     *
     * @return mixed
     */
    public function setSingleSrcFlags($varValue, DataContainer $dc)
    {
        if ($dc->activeRecord) {
            switch ($dc->activeRecord->type) {
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
