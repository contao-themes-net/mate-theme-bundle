<?php

namespace ContaoThemesNet\MateThemeBundle\Module;

class ModuleNewsListMate extends \Contao\ModuleNewsList {

    /**
     * Generate the module
     */
    protected function compile()
    {
        if( strpos($this->customTpl,"mod_newslist_mate_slider") !== false ) {
            if($this->mateSliderHeight == "") $mateSliderHeight = "460";
            else $mateSliderHeight = $this->mateSliderHeight;

            if($this->mateSliderInterval == "") $mateSliderInterval = "12000";
            else $mateSliderInterval = $this->mateSliderInterval;

            if($this->mateSliderDuration == "") $mateSliderDuration = "150";
            else $mateSliderDuration = $this->mateSliderDuration;

            $indicators = "";
            if($this->mateSliderIndicators == 1) {
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
                  $(".slider").slider("next");
                });
            
                $( ".slider.mod_newslist .prev" ).click(function() {
                  $(".slider").slider("prev");
                });
            
                '.$indicators.'
            });
            </script>
            ';
        }

        return parent::compile();
    }

}
