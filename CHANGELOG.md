# Changelog

[//]: <> (
Types of changes
    Added for new Addeds.
    Changed for changes in existing functionality.
    Deprecated for soon-to-be removed Addeds.
    Removed for now removed Addeds.
    Fixed for any bug fixes.
    Security in case of vulnerabilities.
)

## [3.5.4](https://github.com/contao-themes-net/mate-theme-bundle/tree/3.5.4) – 2025-07-24

- [Fixed] Fix top margin on first headlines to align multi-column layouts

## [3.5.3](https://github.com/contao-themes-net/mate-theme-bundle/tree/3.5.3) – 2025-06-05

- [Fixed] Update maklermodul template and styling for contao 5
- [Fixed] Remove legacy hasMetaFields check from news templates to fix meta info display ([#199](https://github.com/contao-themes-net/convert-theme-bundle/issues/199))

## [3.5.2](https://github.com/contao-themes-net/mate-theme-bundle/tree/3.5.2) – 2025-05-16

- [Fixed] Fix mobile navigation and footer link hover color
- [Fixed] Fix multi domain setup
- [Added] Add reset button to preview toolbar
- [Added] Add option to define root page in navbar
- [Added] Add variable to change navbar breakpoint (e.g. `$desktop-navbar-breakpoint: 1200px;` in your `_custom_variables.scss`)
- [Added] Add link to reset password in customized login template

## [3.5.1](https://github.com/contao-themes-net/mate-theme-bundle/tree/3.5.1) – 2025-03-17

- [Fixed] Updated scssphp dependency to 1.0 for Contao 5.5 compatibility

## [3.5.0](https://github.com/contao-themes-net/mate-theme-bundle/tree/3.5.0) – 2025-02-06

- [Added] Add contrast color schemes (only in v2)
- [Added] Add dark mode (only in v2)
- [Added] Add styles for price table element (use price table element and template `ce_cthemes_pricebox_mate`)
- [Fixed] Fix file folders migration with minimal installation ([#23](https://github.com/contao-themes-net/convert-theme-bundle/issues/23))

## [3.4.3](https://github.com/contao-themes-net/mate-theme-bundle/tree/3.4.3) – 2024-12-13

- [Fixed] Use css pseudo class instead of html to prevent google from inserting material icons in site links 

## [3.4.2](https://github.com/contao-themes-net/mate-theme-bundle/tree/3.4.2) – 2024-09-13

- [Fixed] Fix news enclosures ([#190](https://github.com/contao-themes-net/mate-theme-bundle/issues/190))

## [3.4.1](https://github.com/contao-themes-net/mate-theme-bundle/tree/3.4.1) – 2024-06-17

- [Changed] Update sql files (remove TMG from imprint)

## [3.4.0](https://github.com/contao-themes-net/mate-theme-bundle/tree/3.4.0) – 2024-04-30

- [Added] Add teaserbox plus feature (use text with background instead of image)

## [3.3.2](https://github.com/contao-themes-net/mate-theme-bundle/tree/3.3.2) – 2024-03-15

- [Fixed] Click on header search icon starts reload of start page ([#183](https://github.com/contao-themes-net/mate-theme-bundle/issues/183))
- [Changed] Change search box styling

## [3.3.1](https://github.com/contao-themes-net/mate-theme-bundle/tree/3.3.1) – 2024-02-26

- [Fixed] Fix select field validation

## [3.3.0](https://github.com/contao-themes-net/mate-theme-bundle/tree/3.3.0) – 2023-12-04

- [Added] Add teaserbox card element
- [Fixed] Fix styling for 404 page
- [Fixed] Fix slider height

## [3.2.5](https://github.com/contao-themes-net/mate-theme-bundle/tree/3.2.5) – 2023-09-13

- [Fixed] Fix countTo element for Contao 5.2

## [3.2.4](https://github.com/contao-themes-net/mate-theme-bundle/tree/3.2.4) – 2023-08-14

- [Added] Add simplebox twig template
- [Fixed] Fix button width
- [Fixed] Update migrations
- [Removed] Remove unused templates

## [3.2.3](https://github.com/contao-themes-net/mate-theme-bundle/tree/3.2.3) – 2023-08-02

- [Fixed] Fix sql files

## [3.2.2](https://github.com/contao-themes-net/mate-theme-bundle/tree/3.2.2) – 2023-07-06

- [Fixed] Fix fourth navigation level for touch devices
- [Fixed] css fix for iphone 6

## [3.2.1](https://github.com/contao-themes-net/mate-theme-bundle/tree/3.2.1) – 2023-06-12

- [Fixed] Fix sql import for Contao 5.1  

## [3.2.0](https://github.com/contao-themes-net/mate-theme-bundle/tree/3.2.0) – 2023-05-15

- [Added] Add high contrast mode and font size switcher
- [Fixed] Fix smooth scroll script
- [Fixed] Add missing title to navbar links
- [Fixed] Fix links without href
- [Fixed] Fix frontend preview toolbar
- [Fixed] list-style-type not correct in ce_text_simplebox_mate text boxes ([#150](https://github.com/contao-themes-net/mate-theme-bundle/issues/150))
- [Fixed] Fix breadcrumb navigation ([#153](https://github.com/contao-themes-net/mate-theme-bundle/issues/153))
- [Changed] Optimize headlines order
- [Changed] Optimize fonts loading
- [Changed] Optimize news slider images
- [Removed] Remove unused fonts
- [Removed] Remove favicon from fe_page_mate template (You can add a favicon in your root page.)

## [3.1.0](https://github.com/contao-themes-net/mate-theme-bundle/tree/3.1.0) – 2023-02-09

- [Added] Add sql files for Contao 5.1
- [Changed] Change sql files for Contao 5.0
- [Fixed] Replace InsertTag `{{request_token}}` with `<?= $this->requestToken ?>`
- [Fixed] Fix backend css for dark mode

## [3.0.5](https://github.com/contao-themes-net/mate-theme-bundle/tree/3.0.5) – 2023-01-03

- [Added] Add style for html sitemap module
- [Fixed] Fix two content slider on one page ([#144](https://github.com/contao-themes-net/mate-theme-bundle/issues/144))

## [3.0.4](https://github.com/contao-themes-net/mate-theme-bundle/tree/3.0.4) – 2023-01-02

- [Fixed] Fix advances classes settings for content elements

## [3.0.3](https://github.com/contao-themes-net/mate-theme-bundle/tree/3.0.3) – 2022-12-05

- [Fixed] Fix teaser box and parallax element (remove unneeded code lines)
- [Fixed] Fix fourth navigation level ([#138](https://github.com/contao-themes-net/mate-theme-bundle/issues/138))

## [3.0.2](https://github.com/contao-themes-net/mate-theme-bundle/tree/3.0.2) – 2022-11-29

- [Fixed] Fix dropdown navigation ([#135](https://github.com/contao-themes-net/mate-theme-bundle/issues/135))

## [3.0.1](https://github.com/contao-themes-net/mate-theme-bundle/tree/3.0.1) – 2022-11-21

- [Fixed] Fix dropdown navigation for touch devices
- [Changed] Change migration order
- [Fixed] Fix gallery pagination

## [3.0.0](https://github.com/contao-themes-net/mate-theme-bundle/tree/3.0.0) – 2022-10-15

- [Added] Add migrations for demo data import (Setup without further steps, install and run migrations -> Done!)
- [Changed] Increase Contao version to 5 and increase PHP version to 8.1
- [Changed] Remove bootstrap/grid and use migrations to be compatible with the new version (see https://pdir.de/docs/de/contao/themes/mate/update/)
- [Changed] Update [Materialize](https://github.com/materializecss/materialize) version to 1.1.0
- [Changed] Update [Headroom.js](https://wicky.nillia.ms/headroom.js/) version to 0.12.0
- [Removed] Cleanup older Contao SQL files

## [2.21.0](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.21.0) – 2023-09-11

- [Added] Add teaserbox card element
- [Changed] Change sql files

## [2.20.5](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.20.5) – 2023-08-23

- [Added] Add youtube template for klaro consent manager
- [Added] Add root page field in mate navbar module

## [2.20.4](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.20.4) – 2023-07-05

- [Fixed] Fix fourth navigation level for touch devices

## [2.20.3](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.20.3) – 2023-06-27

- [Fixed] Fix class ModuleNewsListMateSocialFeed

## [2.20.2](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.20.2) – 2023-05-12

- [Fixed] Remove warning in teaser box and parallax element
- [Fixed] Fix undefined array key access - thx [fritzmg](https://github.com/fritzmg) for PR ([#156](https://github.com/contao-themes-net/mate-theme-bundle/pull/156))
- [Fixed] Fix navigation permission check - thx [fritzmg](https://github.com/fritzmg) for PR ([#155](https://github.com/contao-themes-net/mate-theme-bundle/pull/155))
- [Fixed] Add missing title to navbar links
- [Fixed] Fix smooth scroll script
- [Fixed] Fix links without href
- [Fixed] Fix frontend preview toolbar
- [Fixed] Fix breadcrumb navigation ([#153](https://github.com/contao-themes-net/mate-theme-bundle/issues/153))
- [Changed] Optimize headlines order
- [Changed] Optimize fonts loading
- [Changed] Optimize news slider images
- [Changed] Change sql files for contao 4.13
- [Removed] Remove unused fonts

## [2.20.1](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.20.1) – 2023-02-09

- [Changed] Change sql files for Contao 4.13
- [Fixed] Remove empty image in news_mate_slider template
- [Fixed] Fix check permission in navbar module

## [2.20.0](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.20.0) – 2023-01-03

- [Added] Add style for html sitemap module
- [Fixed] Fix two content slider on one page ([#144](https://github.com/contao-themes-net/mate-theme-bundle/issues/144))
- [Fixed] Fix navbar incompatibility with Contao 4.9 ([#142](https://github.com/contao-themes-net/mate-theme-bundle/issues/142))

## [2.19.12](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.19.12) – 2023-01-02

- [Fixed] Fix scss path in ThemeUtils.php
- [Removed] Remove no longer used files (mate_win.scss and materialize_win.scss)

## [2.19.11](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.19.11) – 2022-12-01

- [Fixed] Fix fourth navigation level [#138](https://github.com/contao-themes-net/mate-theme-bundle/issues/138)

## [2.19.10](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.19.10) – 2022-11-29

- [Fixed] Fix dropdown navigation ([#135](https://github.com/contao-themes-net/mate-theme-bundle/issues/135))

## [2.19.9](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.19.9) – 2022-11-21

- [Fixed] Fix dropdown navigation for touch devices

## [2.19.8](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.19.8) – 2022-10-14

- [Changed] add advanced classes legend to grid start element

## [2.19.7](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.19.7) – 2022-10-10

- [Changed] now require terminal42/contao-folderpage version 3.* [#119](https://github.com/contao-themes-net/mate-theme-bundle/issues/119)
- [Fixed] fix unordered list [#120](https://github.com/contao-themes-net/mate-theme-bundle/issues/120)

## [2.19.6](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.19.6) – 2022-10-05

- [Fixed] fix paths for multi domain setup [#112](https://github.com/contao-themes-net/mate-theme-bundle/issues/112)

## [2.19.5](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.19.5) – 2022-09-28

- [Fixed] fix exception in NavBarModule [#116](https://github.com/contao-themes-net/mate-theme-bundle/issues/116)

## [2.19.4](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.19.4) – 2022-09-28

- [Fixed] fix navbar module [#114](https://github.com/contao-themes-net/mate-theme-bundle/issues/114)

## [2.19.3](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.19.3) – 2022-09-26

- [Fixed] critical error in NavBarModule

## [2.19.2](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.19.2) – 2022-09-21

- [Changed] update maklermodul templates
- [Fixed] css fix for [Klaro Consent Manager](https://extensions.contao.org/?q=klaro&pages=1&p=pdir%2Fklaro-consent-manager)
- [Changed] update vehicle manager templates and styling
- [Fixed] add width definition for the logo [#97](https://github.com/contao-themes-net/mate-theme-bundle/issues/97)
- [Fixed] update navbar module and fix start/stop-level

## [2.19.1](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.19.1) – 2022-09-15

- [Changed] update sql files for Contao 4.9 and 4.13
- [Fixed] css bugfix for content box and teaser box
- [Changed] content box and teaser box no longer require a link ([#109](https://github.com/contao-themes-net/mate-theme-bundle/issues/109))

## [2.19.0](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.19.0) – 2022-08-01

- [Added] add variables to style input and select fields
- [Added] change teaserbox and contentbox link fields
- [Added] add support for Symfony 5 public entry point
- [Fixed] fix og:image bug in fe_page
- [Fixed] fix button hover background
- [Fixed] fix navigation for many menu items
- [Fixed] update language files
- [Fixed] fix button styles ([#94](https://github.com//contao-themes-net/mate-theme-bundle/issues/94))
- [Fixed] add protected legend in dca
- [Fixed] fix 'Warning: Undefined array key "mate_navbar"'
- [Fixed] fix 'Warning: Attempt to read property "path" on null'

## [2.18.0](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.18.0) – 2022-05-12

- [info] remove support for Contao 4.4 and php <=7.1
- [feature] add support for PHP 8
- [fix] fix sql files for Contao 4.9 and Contao 4.13

## [2.17.6](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.17.6) – 2021-12-22

- [fix] add styling for lists in footer

## [2.17.5](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.17.5) – 2021-11-22

- [fix] replace template `form_mate_upload` with `form_upload_mate` in sql templates

## [2.17.4](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.17.4) – 2021-11-19

- [fix] remove php warning

## [2.17.3](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.17.3) – 2021-10-12

- [fix] show level 4 dropdown navigation

## [2.17.2](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.17.2) – 2021-10-04

- [fix] css fix for vehicle manager

## [2.17.1](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.17.1) – 2021-09-01

- [fix] update styles for vehicle manager

## [2.17.0](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.17.0) – 2021-08-27

- [feature] add styles and templates for vehicle manager
- [fix] css fix for accordion, select field

## [2.16.1](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.16.1) – 2021-08-26

- [fix] css fix for subnav

## [2.16.0](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.16.0) – 2021-08-25

- [feature] add sql files for contao 4.12

## [2.15.3](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.15.3) – 2021-06-08

- [fix] fixed layout bug while scrolling down if content is not height enough

## [2.15.2](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.15.2) – 2021-06-07

- [fix] navbar layout bug if logo is not visible

## [2.15.1](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.15.1) – 2021-05-17

- [fix] add missing fields in login template

## [2.15.0](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.15.0) – 2021-04-26

- [feature] add styles for hofff contao consent bundle
- [feature] add new teaser element
- [fix] css fixes and update templates
- [fix] fix subnav

## [2.14.0](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.14.0) – 2021-04-01

- [feature] add ce_table_mate template for responsive tables
- [feature] add styling for news archive
- [fix] fix jquery conflicts with other extensions (e.g. slick slider)
- [fix] fix news slider bug ([#69](https://github.com/contao-themes-net/mate-theme-bundle/issues/69))
- [fix] update breadcrumb template
- [fix] css fixes

## [2.13.1](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.13.1) – 2021-02-17

- [fix] update material icons version

## [2.13.0](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.13.0) – 2021-02-12

- [feature] add sql files for contao 4.11
- [feature] add spacing helpers

## [2.12.7](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.12.7) – 2020-12-14

- [fix] update theme tags config

## [2.12.6](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.12.6) – 2020-12-04

- [fix] update theme tags config

## [2.12.5](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.12.5) – 2020-11-25

- [fix] clear cache after sync theme files

## [2.12.4](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.12.4) – 2020-11-13

- [fix] fix bug with select dropdown on ios safari

## [2.12.3](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.12.3) – 2020-11-06

- [fix] css fix for text list with image

## [2.12.2](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.12.2) – 2020-10-22

- [feature] add new parallax template with container width

## [2.12.1](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.12.1) – 2020-10-20

- [fix] carousel

## [2.12.0](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.12.0) – 2020-10-16

- [feature] add carousel gallery

## [2.11.8](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.11.8) – 2020-10-14

- [fix] css fixes

## [2.11.7](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.11.7) – 2020-10-09

- [fix] navigation for touch devices

## [2.11.6](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.11.6) – 2020-08-19

- [feature] add sql files for contao 4.10.0
- [fix] version is hidden if you click to synchronize theme files

## [2.11.5](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.11.5) – 2020-08-18

- [fix] fix css bug with mobile navigation

## [2.11.4](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.11.4) – 2020-08-03

- [fix] css fix for grid

## [2.11.3](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.11.3) – 2020-07-22

- [fix] css fixes

## [2.11.2](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.11.2) – 2020-07-17

- [fix] css fixes

## [2.11.1](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.11.1) – 2020-07-16

- [fix] remove unnecessary css definition

## [2.11.0](https://github.com/contao-themes-net/mate-theme-bundle/tree/2.11.0) – 2020-07-15

- [feature] update and add some new scss variables for footer
- [fix] css fixes

## [1.0.2](https://github.com/contao-themes-net/mate-theme-bundle/tree/1.0.2) – 2017-12-05

- first stable release

## [0.0.1](https://github.com/contao-themes-net/mate-theme-bundle/tree/0.0.1) – 2017-11-24

- first release
