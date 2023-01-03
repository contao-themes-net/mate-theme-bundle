<?php

declare(strict_types=1);

/*
 * mate theme for Contao Open Source CMS
 *
 * Copyright (C) 2023 pdir / digital agentur <develop@pdir.de>
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

namespace ContaoThemesNet\MateThemeBundle\Module;

use Contao\ModuleNewsList;

class ModuleNewsListMate extends ModuleNewsList
{
    /**
     * Generate the module.
     */
    protected function compile()
    {
        if (false !== strpos($this->customTpl, 'mod_newslist_mate_slider')) {
            if ('' === $this->mateSliderHeight) {
                $mateSliderHeight = '460';
            } else {
                $mateSliderHeight = $this->mateSliderHeight;
            }

            if ('' === $this->mateSliderInterval) {
                $mateSliderInterval = '12000';
            } else {
                $mateSliderInterval = $this->mateSliderInterval;
            }

            if ('' === $this->mateSliderDuration) {
                $mateSliderDuration = '150';
            } else {
                $mateSliderDuration = $this->mateSliderDuration;
            }

            $indicators = '';

            if ('1' === $this->mateSliderIndicators) {
                $mateSliderIndicators = 'true';

                $indicators = '
                $( ".slider.mod_newslist .sliderImage" ).each(function( index ) {
                  var headline = $(this).find("h2").text();
                  var subheadline = $(this).find(".subheadline").text();
                  var i = index;

                  $( ".slider.mod_newslist .indicator-item" ).each(function( index ) {
                    if(i == index) {
                        $(this).append("<span class=\'inner\'></span>");
                        $(this).find(".inner").append("<span class=\'subheadline\'>" + subheadline + "</span>");
                        $(this).find(".inner").append("<span class=\'headline\'>" + headline + "</span>");
                    }
                  });
                });
            ';
            } else {
                $mateSliderIndicators = 'false';
            }

            $GLOBALS['TL_BODY'][] = '
            <script>
            jQuery(document).ready(function($) {
                $(".slider.mod_newslist").slider({
                    height: '.$mateSliderHeight.',
                    indicators: '.$mateSliderIndicators.',
                    interval: '.$mateSliderInterval.',
                    duration: '.$mateSliderDuration.'
                });

                $( ".slider.mod_newslist .next" ).click(function() {
                  $(this).closest(".slider").slider("next");
                });

                $( ".slider.mod_newslist .prev" ).click(function() {
                  $(this).closest(".slider").slider("prev");
                });

                '.$indicators.'
            });
            </script>
            ';
        }

        return parent::compile();
    }
}
