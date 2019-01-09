import tingle from './../../node_modules/tingle.js/dist/tingle.js';

const mainNavBtn = document.querySelector('.main-header__hamburger');
const mainNav = document.querySelector('.main-nav');

if(mainNavBtn && mainNav) {
    const modal = new tingle.modal({
        footer: false,
        stickyFooter: false,
        closeMethods: ['overlay', 'escape'],
        cssClass: ['tingle-modal--cover'],
        onOpen: function() {
        },
        onClose: function() {
            console.log('modal close');
        },
        beforeClose: function() {
            return true; // close
            return false; // nothing happens
        }
    });

    modal.modalBoxContent.classList.add('tingle-modal-box__content--noPadding');

    // Set content to html on page and remove disabled style
    modal.setContent(mainNav);
    mainNav.classList.remove('modal-content--disabled');

    // Add click event listener
    mainNavBtn.addEventListener('click', function(e){
        e.preventDefault();
        modal.open();
        console.log('open');
    });
}