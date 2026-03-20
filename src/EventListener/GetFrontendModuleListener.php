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
use Contao\ModuleModel;

#[AsHook('getFrontendModule')]
class GetFrontendModuleListener
{
    public function __invoke(ModuleModel $model, string $buffer, object $module): string
    {
        if (false === strpos((string) $model->customTpl, 'mod_newslist_mate_slider')) {
            return $buffer;
        }

        $mateSliderHeight = '' === (string) $model->mateSliderHeight ? '460' : (string) $model->mateSliderHeight;
        $mateSliderInterval = '' === (string) $model->mateSliderInterval ? '12000' : (string) $model->mateSliderInterval;
        $mateSliderDuration = '' === (string) $model->mateSliderDuration ? '150' : (string) $model->mateSliderDuration;

        $indicators = '';
        $mateSliderIndicators = 'false';

        if ('1' === (string) $model->mateSliderIndicators) {
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

        $GLOBALS['TL_BODY'][] = '
        <script>
        jQuery(document).ready(function($) {
            $(".mod_newslist.slider").slider({
                height: '.$mateSliderHeight.',
                indicators: '.$mateSliderIndicators.',
                interval: '.$mateSliderInterval.',
                duration: '.$mateSliderDuration.'
            });

            $(".mod_newslist.slider .next").click(function() {
              $(this).closest(".slider").slider("next");
            });

            $(".mod_newslist.slider .prev").click(function() {
              $(this).closest(".slider").slider("prev");
            });

            '.$indicators.'
        });
        </script>
        ';

        return $buffer;
    }
}
