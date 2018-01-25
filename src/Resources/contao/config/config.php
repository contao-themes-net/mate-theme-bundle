<?php

// Insert the mate theme category
array_insert($GLOBALS['TL_CTE'], 1, array('mateTheme' => array()));
array_insert($GLOBALS['FE_MOD'], 1, array('mateTheme' => array()));
array_insert($GLOBALS['BE_MOD'], 1, array('mateTheme' => array()));

/**
 * Add frontend element
 */
$GLOBALS['FE_MOD']['mateTheme']['mateNavbar'] = 'ContaoThemesNet\\MateThemeBundle\\Mate\\NavBarModule';

/**
 * Add content element
 */
$GLOBALS['TL_CTE']['mateTheme']['mateTeaserBox'] = 'ContaoThemesNet\\MateThemeBundle\\Mate\\TeaserBox';
$GLOBALS['TL_CTE']['mateTheme']['mateContentBox'] = 'ContaoThemesNet\\MateThemeBundle\\Mate\\ContentBox';

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
    'MATE02/01',
    'MATE05/01',
    'MATE05/02',
    'MATE05/03',
    'MATE05/04',
    'MATE05/05'
);

/**
 * Backend Modules
 */
array_insert($GLOBALS['BE_MOD']['mateTheme'], 1, array
(
    'mateThemeSetup' => array
    (
        'callback'          => 'ContaoThemesNet\\MateThemeBundle\\Module\\MateThemeSetup',
        'tables'            => array(),
        'javascript'		=> 'bundles/matetheme/js/backend.js',
        'stylesheet'		=> 'bundles/matetheme/sass/backend.css'
    ),
));
