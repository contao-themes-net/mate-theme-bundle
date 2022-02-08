<?php

/**
 * mate theme for Contao Open Source CMS
 *
 * Copyright (C) 2017 pdir / digital agentur <develop@pdir.de>
 *
 * @package    contao-themes-net/mate-theme-bundle
 * @link       https://github.com/contao-themes-net/mate-theme-bundle
 * @license    pdir contao theme licence
 * @author     Philipp Seibt <develop@pdir.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ContaoThemesNet\MateThemeBundle\EventListener;

class HookListener
{
    /**
     * Replace the insert tag.
     *
     * @param string $tag the insert tag
     *
     * @return bool|string
     */
    public function onReplaceInsertTags($tag)
    {
        if (preg_match('/^countTo([bsrl]?)\:\:/', $tag)) {
            return $this->replaceCountToInsertTag($tag);
        }

        return false;
    }

    /**
     * Replace the countTo insert tag.
     *
     * @param string $tag the given tag
     *
     * @return string
     */
    private function replaceCountToInsertTag($tag)
    {
        $parts = explode('::', $tag);

        $class = ""; $spanClass = "";
        if($parts[2] != "") $spanClass = " ".$parts[2];

        $tag = '<span class="countTo'.$spanClass.'">'.$parts[1].'</span>';

        if(strpos($class,"noscript") === false) {
            if($parts[2] != "") $class = ".".$parts[2];
            $class = str_replace("noscript","", $class);
            $GLOBALS['TL_BODY'][] = '<script src="bundles/matetheme/js/jquery.countTo.js"></script>';
            $GLOBALS['TL_BODY'][] = '<script>
            jQuery( document ).ready(function($) {
                var countTo = 0;
                $(window).scroll(function () {
                    var countToElem = $(".countTo'.$class.'");
                    var top_of_element = countToElem.offset().top + 30;
                    var bottom_of_element = countToElem.offset().top + countToElem.outerHeight();
                    var bottom_of_screen = $(window).scrollTop() + $(window).height();
                    var top_of_screen = $(window).scrollTop();
                    var countToText = countToElem.text().replace(".","").replace(",","");
                    if ((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)) {
                        if (countTo == 0) {
                            countToElem.countTo({
                                from: 0,
                                to: parseInt(countToText),
                                speed: 1000,
                                refreshInterval: 50,
                                decimals: 0,
                                formatter: function (value, options) {
                                  value = value.toFixed(options.decimals);
                                  value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                  return value;
                                },
                            });
                        }
                        countTo = 1;
                    } else {
                        countTo = 0;
                    }
                });
            });
            </script>';
        }

        return $tag;
    }
}
