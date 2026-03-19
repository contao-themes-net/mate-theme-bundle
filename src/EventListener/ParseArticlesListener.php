<?php

declare(strict_types=1);

/*
 * mate theme for Contao Open Source CMS
 *
 * Copyright (C) 2026 pdir / digital agentur <develop@pdir.de>
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

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\FrontendTemplate;
use Contao\ModuleNews;

#[AsHook('parseArticles')]
class ParseArticlesListener
{
    public function __invoke(FrontendTemplate $template, array $newsEntry, ModuleNews $module): void
    {
        if (false === strpos((string) $module->customTpl, 'mod_newslist_mate_slider')) {
            return;
        }

        $mateSliderHeight = '' === (string) $module->mateSliderHeight ? '460' : (string) $module->mateSliderHeight;
        $mateSliderInterval = '' === (string) $module->mateSliderInterval ? '12000' : (string) $module->mateSliderInterval;
        $mateSliderDuration = '' === (string) $module->mateSliderDuration ? '150' : (string) $module->mateSliderDuration;

        $indicators = '';
        $mateSliderIndicators = 'false';

        if ('1' === (string) $module->mateSliderIndicators) {
            $mateSliderIndicators = 'true';

            $indicators = '
                $( ".slider.mod_newslist .sliderImage" ).each(function( index ) {
                  var headline = $(this).find("h2, .h2").text();
                  var subheadline = $(this).find(".subheadline").text();
                  var i = index;

                  $( ".slider.mod_newslist .indicator-item" ).each(function( index ) {
                    if(i == index) {
                        $(this).attr("tabindex", "0");
                        $(this).attr("role", "listitem");
                        $(this).attr("aria-label", "Navigation Slide " + (index + 1));
                        $(this).addClass("hc-bg-grey-darker hc-hover-bg-grey");
                        $(this).append("<span class=\'inner\'></span>");
                        $(this).find(".inner").append("<span class=\'subheadline\'>" + subheadline + "</span>");
                        $(this).find(".inner").append("<span class=\'headline\'>" + headline + "</span>");

                        $(this).on("keydown click", function(e) {
                          if (e.type === "click" || e.key === "Enter" || e.key === " ") {
                            e.preventDefault();
                            $(this).trigger("click.indicator");
                          }
                        });
                    }
                  });
                });
            ';
        }

        $GLOBALS['TL_BODY']['mateNewsSlider'] = '
        <script>
        jQuery(document).ready(function($) {
            $(".slider.mod_newslist").slider({
                height: '.$mateSliderHeight.',
                indicators: '.$mateSliderIndicators.',
                interval: '.$mateSliderInterval.',
                duration: '.$mateSliderDuration.'
            });

            $(".slider.mod_newslist .next").click(function() {
              $(this).closest(".slider").slider("next");
            });

            $(".slider.mod_newslist .prev").click(function() {
              $(this).closest(".slider").slider("prev");
            });

            '.$indicators.'
        });
        </script>
        ';
    }
}
