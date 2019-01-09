import './../../node_modules/slick-carousel/slick/slick.js';
const teamSlider = $('.team-profiles__slider');
const teamSliderNav = $('.team-profiles__slider-nav');
let teamSliderHandle = $('.team-profiles__slider-handle');
let teamSliderHandleW = 0;

teamSlider.on('init', function(event, slick){
    let ul = slick.target;

    // setTimeout helps wait for correct teamSliderNav width
    setTimeout(function(){

        teamSliderHandleW = (teamSliderNav.innerWidth() / slick.slideCount);
        teamSliderHandle.width(teamSliderHandleW + 'px');
    }, 0);
});

teamSlider.on('beforeChange', function(event, slick, currentSlide, nextSlide){
    teamSliderHandle.css('left', (teamSliderHandleW * nextSlide + 1) + 'px');
});

teamSlider.slick({
    'slidesToShow': 3,
    'slidesToScroll': 1,
    'infinite': false,
    'variableWidth': true,
    'arrows': false
});