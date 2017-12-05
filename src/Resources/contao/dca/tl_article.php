<?php

/**
 * Add fields to tl_content
 */
$GLOBALS['TL_DCA']['tl_article']['palettes']['default'] = str_replace
(
    'customTpl',
    'customTpl,pdir_th_tag',
    $GLOBALS['TL_DCA']['tl_article']['palettes']['default']
);

/**
 * Add fields to tl_article
 */
$GLOBALS['TL_DCA']['tl_article']['fields']['pdir_th_tag'] = array
(
    'label'         => &$GLOBALS['TL_LANG']['tl_article']['pdir_th_tag'],
    'inputType'     => 'select',
    'search'        => true,
    'options'       => $GLOBALS['tl_config']['theme_tags'],
    'reference'     => &$GLOBALS['TL_LANG']['tl_article']['th_tags'],
    'eval'          => array('mandatory'=>false, 'maxlength'=>64, 'tl_class'=>'w50 wizard'),
    'sql' => "varchar(64) NOT NULL default ''"
);