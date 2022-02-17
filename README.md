# contao-themes-net/mate-theme-bundle
mate - exhilarating contao theme for contao cms

license

pdir contao theme licence -> see LICENSE file for more informations

## demo

for demo please visit https://mate.pdir.de

## documentation

for documentation please visit https://docs.contao-themes.net/

## compatible
compatible with Contao >=4.4

## structure

    ./src/Resources
        config = Symfony config (services etc.)
        contao = contao stuff (config, dca etc.)
        public = symlink to web (Images, JS, CSS etc.)
        views  = Templates for Twig

    # Weitere Beispiele für Verzeichnisse in ./src/
    Typ     	                    Verzeichnis
    Commands	                    Command/
    Controllers	                    Controller/
    Service Container Extensions	DependencyInjection/
    Event Listeners	                EventListener/
    Model Klassen	                Model/
    Übersetzungen (Symfony)	        Resources/translations/
    Übersetzungen (Contao)	        Resources/contao/languages/
    Templates (.html5)              Resources/contao/templates/
    Unit-Tests	                    Tests/


## dependencies & licenses

- [Materialize CSS Framework](http://materializecss.com/) | [Github](https://github.com/Dogfalo/materialize) | Code copyright 2017 Materialize. Code released under the MIT license.
- [Contao Theme Helper Bundle](https://github.com/pdir/contao-theme-helper-bundle) by [pdir](https://pdir.de/ "Webdesign für Dresden") | Code copyright by pdir / digital agentur. Code released under LGPL v3.
- [Headroom.js](http://wicky.nillia.ms/headroom.js/) | [Github](https://github.com/WickyNilliams/headroom.js) | Code copyright 2013 by Nick Williams. Code released under the MIT license.
- [Material Icons Inserttag](https://github.com/contao-themes-net/material-icons-inserttag) by [pdir](https://pdir.de/ "Webdesign für Dresden") | Code copyright by pdir / digital agentur. Code released under GNU Lesser General Public License v3.0.


## Install & Documentation

see https://docs.contao-themes.net/

## Configuration

Edit your app/config/parameters.yml file:

    parameters:
      mate_theme.assets.custom_scss: 'my/path/to/_custom.scss'
      mate_theme.assets.custom_variables : 'my/path/to/_custom_variables.scss'

## Other Contao Themes

| [![0.1 Theme](https://contao-themes.net/assets/images/3/0.1_Energy_saving_Contao_Theme_00-1e927a73.jpg)](https://contao-themes.net/theme-detail/zeroone.html) | [![ODD Theme](https://contao-themes.net/assets/images/c/ODD_Exploring_Contao_Theme_05-9e3a18d8.png)](https://contao-themes.net/theme-detail/odd.html) | [![NATURE Theme](https://contao-themes.net/assets/images/6/00_00_naturetheme-605a9391.jpg)](https://contao-themes.net/theme-detail/nature.html) |
|:---:|:---:|:---:|
| [**0.1 Theme**](https://contao-themes.net/theme-detail/zeroone.html)  | [**ODD Theme**](https://contao-themes.net/theme-detail/odd.html)  | [**NATURE Theme**](https://contao-themes.net/theme-detail/nature.html)  |

| [![CONVERT Theme](https://contao-themes.net/assets/images/7/Convert_Selling_Contao_Theme_01-9c1306b6.png)](https://contao-themes.net/theme-detail/convert.html) | [![MATE Isotope](https://contao-themes.net/assets/images/a/01_mate-isotope-shop-theme_quadrat-afa8f36f.jpg)](https://contao-themes.net/theme-detail/mate-isotope.html) | [![0.1 Isotope](https://contao-themes.net/assets/images/5/0.1_Isotope_00-57e3b5b2.jpg)](https://contao-themes.net/theme-detail/zeroone-isotope.html) |
|:---:|:---:|:---:|
| [**CONVERT Theme**](https://contao-themes.net/theme-detail/convert.html)  | [**MATE Isotope**](https://contao-themes.net/theme-detail/mate-isotope.html) | [**0.1 Isotope**](https://contao-themes.net/theme-detail/zeroone-isotope.html) |

## Bildnachweise

* Elbstraße Meißen / elbstrasse.jpg: [Mario Gast](http://dream-picture-moments.de/)
* Frauenkirche Meißen / frauenkirche-meissen.jpg: [Mario Gast](http://dream-picture-moments.de/)
* Götterfelsen Meißen / goetterfelsen.jpg: [Mario Gast](http://dream-picture-moments.de/)
* Kleinmarkt Meißen / kleinmarkt.jpg: [Mario Gast](http://dream-picture-moments.de/)
* Albrechtsburg Meißen / meissen-albrechtsburg.jpg: [Mario Gast](http://dream-picture-moments.de/)
* An der Elbe bei Sonnenaufgang / meissen-elbe-sonnenaufgang.jpg: [Mario Gast](http://dream-picture-moments.de/)
* Juchhöh-Aussicht Meißen / meissen-juchhoeh.jpg: [Mario Gast](http://dream-picture-moments.de/)
* Meißner Weihnachtsmarkt / meissner-weihnachtsmarkt.jpg: [Mario Gast](http://dream-picture-moments.de/)
* Sammelpostkarte zum Meißner Weinfest 2017 / sammelpostkarte-weinfest-meissen-2017.jpg: [Mario Gast](http://dream-picture-moments.de/)
* Schloßbrücke Meißen / schlossbruecke-meissen.jpg: [Mario Gast](http://dream-picture-moments.de/)
* Trabant auf Landstraße / trabant.jpg: [Mario Gast](http://dream-picture-moments.de/)
* Meißner Weihnachtsmarkt / weihnachtsmarkt-meissen.jpg: [Mario Gast](http://dream-picture-moments.de/)
* Weinfest-Umzug in Meißen / weinfest-meissen-umzug.jpg: [Mario Gast](http://dream-picture-moments.de/)
* Schloßbrücke Meißen im Winter / schlossbruecke_winter.jpg: [Mario Gast](http://dream-picture-moments.de/)
* MATE Theme Logo / mate_logo.png: Eigenaufnahmen@[pdirGmbH](https://pdir.de/)
* MATE Theme Logo in weiß / mate_logo_white.png: Eigenaufnahmen@[pdirGmbH](https://pdir.de/)
* Straßenkarte / street-map-2679271_1920.jpg: [pixel2013](https://pixabay.com/de/users/pixel2013-2364555/)@[Pixabay](https://pixabay.com/de/photos/stra%C3%9Fenkarte-map-suchen-finden-2679271/)

Alle Demo-Inhalte dieses Themes, insbesondere Texte, Fotografien und Grafiken, sind urheberrechtlich geschützt. Das Urheberrecht liegt bei der pdir Gmbh bzw. den jeweiligen Urhebern der Werke. Bitte fragen Sie uns, falls Sie die Demo-Inhalte dieses Themes verwenden möchten. Ohne schriftliche Genehmigung seitens der Urheber dürfen diese in keiner Form verwendet, vervielfältigt oder verbreitet werden.
