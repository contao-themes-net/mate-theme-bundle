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

/**
 * Add content element
 */
$GLOBALS['TL_CTE']['mateTheme']['mateTeaserBox'] = 'ContaoThemesNet\\MateThemeBundle\\Mate\\TeaserBox';
$GLOBALS['TL_CTE']['mateTheme']['mateContentBox'] = 'ContaoThemesNet\\MateThemeBundle\\Mate\\ContentBox';
$GLOBALS['TL_CTE']['mateTheme']['mateParallaxElement'] = 'ContaoThemesNet\\MateThemeBundle\\Mate\\ParallaxElement';
$GLOBALS['TL_CTE']['mateTheme']['mateTextBackgroundElement'] = 'ContaoThemesNet\\MateThemeBundle\\Mate\\TextBackgroundElement';

/**
 * Available tags for MATE theme
 */
$GLOBALS['tl_config']['theme_tags'] = array(
	'-',
    'MATE01/01',
    'MATE01/02',
    'MATE01/03',
    'MATE01/04',
    'MATE01/05',
    'MATE01/06',
    'MATE01/07',
    'MATE01/08',
    'MATE01/09',
    'MATE01/10',
    'MATE02/01',
    'MATE02/02',
    'MATE02/03',
    'MATE02/04',
    'MATE02/05',
    'MATE02/06',
    'MATE02/07',
    'MATE02/08',
    'MATE02/09',
    'MATE02/10',
    'MATE05/01',
    'MATE05/02',
    'MATE05/03',
    'MATE05/04',
    'MATE05/05',
    'MATE05/06',
    'MATE05/07',
    'MATE05/08',
    'MATE05/09',
    'MATE05/10',
);

/**
 * Backend Modules
 */
array_insert($GLOBALS['BE_MOD']['contaoThemesNet'], 1, array
(
    'mateThemeSetup' => array
    (
        'callback'          => 'ContaoThemesNet\\MateThemeBundle\\Module\\MateThemeSetup',
        'tables'            => array(),
        'javascript'		=> 'bundles/matetheme/js/backend.js',
        'stylesheet'		=> 'bundles/matetheme/sass/backend.css'
    ),
));

/**
 * Add Hooks
 */
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = ['ContaoThemesNet\MateThemeBundle\EventListener\HookListener', 'onReplaceInsertTags'];