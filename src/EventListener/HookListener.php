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

        $class = '';
        $spanClass = '';

        if ('' !== $parts[2]) {
            $spanClass = ' '.$parts[2];
        }

        $tag = '<span class="countTo'.$spanClass.'">'.$parts[1].'</span>';

        if (false === strpos($class, 'noscript')) {
            if ('' !== $parts[2]) {
                $class = '.'.$parts[2];
            }
            $class = str_replace('noscript', '', $class);
            $GLOBALS['TL_BODY'][] = '<script src="bundles/contaothemesnetmatetheme/js/jquery.countTo.js"></script>';
            $GLOBALS['TL_BODY'][] = '<script>
            jQuery( document ).ready(function($) {
                var countTo = 0;
                $(window).scroll(function () {
                    var countToElem = $(".countTo'.$class.'");
                    var top_of_element = countToElem.offset().top + 30;
                    var bottom_of_element = countToElem.offset().top + countToElem.outerHeight();
                    var bottom_of_screen = $(window).scrollTop() + $(window).height();
                    var top_of_screen = $(window).scrollTop();
                    var countToText = countToElem.text();
                    if ((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)) {
                        if (countTo == 0) {
                            countToElem.countTo({
                                from: 0,
                                to: countToText,
                                speed: 1000,
                                refreshInterval: 50
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
