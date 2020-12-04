<?php

// Insert the mate theme category
array_insert($GLOBALS['TL_CTE'], 1, array('mateTheme' => array()));
array_insert($GLOBALS['FE_MOD'], 1, array('mateTheme' => array()));
array_insert($GLOBALS['BE_MOD'], 1, array('mateTheme' => array()));

/**
 * Add frontend element
 */
$GLOBALS['FE_MOD']['mateTheme']['mateNavbar'] = 'ContaoThemesNet\\MateThemeBundle\\Mate\\NavBarModule';
$GLOBALS['FE_MOD']['mateTheme']['mateModal'] = 'ContaoThemesNet\\MateThemeBundle\\Mate\\ModalModule';

if($GLOBALS['FE_MOD']['news']['newslist']) {
    if ( $GLOBALS['BE_MOD']['pdir']['socialFeed'] ) {
        $GLOBALS['FE_MOD']['news']['newslist'] = 'ContaoThemesNet\\MateThemeBundle\\Module\\ModuleNewsListMateSocialFeed';
    } else {
        $GLOBALS['FE_MOD']['news']['newslist'] = 'ContaoThemesNet\\MateThemeBundle\\Module\\ModuleNewsListMate';
    }
}

/**
 * Add content element
 */
$GLOBALS['TL_CTE']['mateTheme']['mateTeaserBox'] = 'ContaoThemesNet\\MateThemeBundle\\Mate\\TeaserBox';
$GLOBALS['TL_CTE']['mateTheme']['mateContentBox'] = 'ContaoThemesNet\\MateThemeBundle\\Mate\\ContentBox';
$GLOBALS['TL_CTE']['mateTheme']['mateParallaxElement'] = 'ContaoThemesNet\\MateThemeBundle\\Mate\\ParallaxElement';
$GLOBALS['TL_CTE']['mateTheme']['mateTextBackgroundElement'] = 'ContaoThemesNet\\MateThemeBundle\\Mate\\TextBackgroundElement';
$GLOBALS['TL_CTE']['mateTheme']['mateModal'] = 'ContaoThemesNet\\MateThemeBundle\\Element\\ModalElement';

/**
 * Available tags for MATE theme
 */
array_push($GLOBALS['tl_config']['theme_tags'], '-');
$GLOBALS['tl_config']['theme_tags'][] = 'MATE01/01';
$GLOBALS['tl_config']['theme_tags'][] = 'MATE01/02';
$GLOBALS['tl_config']['theme_tags'][] = 'MATE01/03';
$GLOBALS['tl_config']['theme_tags'][] = 'MATE01/04';
$GLOBALS['tl_config']['theme_tags'][] = 'MATE01/05';
$GLOBALS['tl_config']['theme_tags'][] = 'MATE01/06';
$GLOBALS['tl_config']['theme_tags'][] = 'MATE01/07';
$GLOBALS['tl_config']['theme_tags'][] = 'MATE01/08';
$GLOBALS['tl_config']['theme_tags'][] = 'MATE01/09';
$GLOBALS['tl_config']['theme_tags'][] = 'MATE01/10';
$GLOBALS['tl_config']['theme_tags'][] = 'MATE02/01';
$GLOBALS['tl_config']['theme_tags'][] = 'MATE02/02';
$GLOBALS['tl_config']['theme_tags'][] = 'MATE02/03';
$GLOBALS['tl_config']['theme_tags'][] = 'MATE02/04';
$GLOBALS['tl_config']['theme_tags'][] = 'MATE02/05';
$GLOBALS['tl_config']['theme_tags'][] = 'MATE02/06';
$GLOBALS['tl_config']['theme_tags'][] = 'MATE02/07';
$GLOBALS['tl_config']['theme_tags'][] = 'MATE02/08';
$GLOBALS['tl_config']['theme_tags'][] = 'MATE02/09';
$GLOBALS['tl_config']['theme_tags'][] = 'MATE02/10';
$GLOBALS['tl_config']['theme_tags'][] = 'MATE05/01';
$GLOBALS['tl_config']['theme_tags'][] = 'MATE05/02';
$GLOBALS['tl_config']['theme_tags'][] = 'MATE05/03';
$GLOBALS['tl_config']['theme_tags'][] = 'MATE05/04';
$GLOBALS['tl_config']['theme_tags'][] = 'MATE05/05';
$GLOBALS['tl_config']['theme_tags'][] = 'MATE05/06';
$GLOBALS['tl_config']['theme_tags'][] = 'MATE05/07';
$GLOBALS['tl_config']['theme_tags'][] = 'MATE05/08';
$GLOBALS['tl_config']['theme_tags'][] = 'MATE05/09';
$GLOBALS['tl_config']['theme_tags'][] = 'MATE05/10';

/**
 * Backend Modules
 */
array_insert($GLOBALS['BE_MOD']['contaoThemesNet'], 1, array
(
    'mateThemeSetup' => array
    (
        'callback'          => 'ContaoThemesNet\\MateThemeBundle\\Module\\MateThemeSetup',
        'tables'            => array(),
        'stylesheet'		=> 'bundles/matetheme/sass/backend.css'
    ),
));

/**
 * Add Hooks
 */
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = ['ContaoThemesNet\MateThemeBundle\EventListener\HookListener', 'onReplaceInsertTags'];
