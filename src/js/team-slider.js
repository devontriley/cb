import './../../node_modules/slick-carousel/slick/slick.js';
import { getElementIndex } from './utils.js';
const teamSlider = document.querySelector('.team-profiles__slider');
const teamModal = document.querySelector('.team-profiles__modal');
const teamModalMembers = document.querySelectorAll('.team-profiles__modal-member');
let teamModalActiveMember = null;
const teamSliderNav = document.querySelector('.team-profiles__slider-nav');
let teamSliderHandle = document.querySelector('.team-profiles__slider-handle');
let teamSliderHandleW = 0;

$(teamSlider).on('init', function(event, slick){
    // TODO: Probably can do this better than using settimeout
    // setTimeout helps wait for correct teamSliderNav width
    setTimeout(function(){
        teamSliderHandleW = (teamSliderNav.offsetWidth / slick.slideCount);
        $(teamSliderHandle).width(teamSliderHandleW + 'px');
    }, 0);
});

$(teamSlider).on('beforeChange', function(event, slick, currentSlide, nextSlide){
    $(teamSliderHandle).css('left', (teamSliderHandleW * nextSlide + 1) + 'px');
});

$(teamSlider).slick({
    'infinite': false,
    'variableWidth': true,
    'arrows': false
});

if(teamSlider)
{
    teamSlider.addEventListener('click', function(e)
    {
        e.preventDefault();

        let slide = e.target.closest('.slick-slide');
        if(!slide) return;
        let index = getElementIndex(slide);
        const member = teamModalActiveMember = teamModalMembers[index];

        document.body.classList.add('modal-active');
        teamModal.style.display = 'block';
        member.classList.add('active');
    });

    teamModal.addEventListener('click', function(e)
    {
        e.preventDefault();

        // Close Modal
        if(e.target.classList.contains('team-profiles__modal-close') || e.target.closest('.team-profiles__modal-close')) {
            closeTeamModal();
        }

        // Next Modal
        if(e.target.classList.contains('team-profiles__modal-next')) {
            nextTeamModal();
        }
    });

    // Close Modal
    document.body.addEventListener('mousedown', function(e)
    {
        e.stopPropagation();

        // Close Modal
        if(!e.target.closest('.team-profiles__modal')) {
            closeTeamModal();
        }
    });
}

function nextTeamModal()
{
    teamModalActiveMember.classList.remove('active');
}

function closeTeamModal()
{
    document.body.classList.remove('modal-active');
    teamModal.style.display = 'none';
    teamModalActiveMember.classList.remove('active');
}