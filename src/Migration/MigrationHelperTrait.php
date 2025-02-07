<?php

declare(strict_types=1);

/*
 * mate theme for Contao Open Source CMS
 *
 * Copyright (C) 2025 pdir / digital agentur <develop@pdir.de>
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

namespace ContaoThemesNet\MateThemeBundle\Migration;

use Contao\CoreBundle\Framework\ContaoFramework;
use Doctrine\DBAL\Connection;

trait MigrationHelperTrait
{
    private ContaoFramework $contaoFramework;
    private Connection $connection;

    private string $uploadPath;
    private string $projectDir;

    private string $contaoFolder = 'vendor/contao-themes-net/mate-theme-bundle/contao';
    private string $themeFolder = 'mate';
    private string $sqlFile = 'sql/contao50/minimal.sql';

    private array $minTables = [ // @phpstan-ignore-line
        'tl_article', 'tl_content', 'tl_files', 'tl_form', 'tl_form_field', 'tl_image_size',
        'tl_image_size_item', 'tl_layout', 'tl_member', 'tl_module', 'tl_page', 'tl_theme',
    ];

    private array $fullTables = [ // @phpstan-ignore-line
        'tl_calendar', 'tl_calendar_events', 'tl_faq', 'tl_faq_category', 'tl_news', 'tl_newsletter_channel', 'tl_news_archive',
    ];
}
