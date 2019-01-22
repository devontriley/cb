<!-- Not home -->
<?php if(!is_page(8)) { ?>
<footer class="main-footer">
    <div class="main-footer__inner">
        <div class="main-footer__image-copy">
            <div class="main-footer__copy">
                <p class="main-footer__copy-header">WORK</p>
                <p class="main-footer__copy-text">
                    Indelible.<br>
                    Market-moving.<br>
                    Unique.
                </p>
                <a href="#" class="btn">
                    Our Work.
                    <svg class="arrow arrow-left" viewBox="0 0 33 21" width="33px" height="21px">
                        <use xlink:href="#left-arrow"></use>
                    </svg>
                </a>
            </div>
            <div class="main-footer__image">
                <picture>
                    <source srcset="http://localhost/cb/wp-content/uploads/2019/01/About_Footer.jpg 768w"
                            src="http://localhost/cb/wp-content/uploads/2019/01/About_Footer_m.jpg" />
                    <img src="http://localhost/cb/wp-content/uploads/2019/01/About_Footer_m.jpg" alt="" />
                </picture>
            </div>
        </div>
        <div class="main-footer__locations">
            <div class="main-footer__addresses">
                <div class="main-footer__address">
                    <p class="main-footer__address-state">BOS</p>
                    <p class="main-footer__address-loc">
                        555 Address Ave<br />
                        Boston, MA 05555<br />
                        (555) 555-5555
                    </p>
                </div>
                <div class="main-footer__address">
                    <p class="main-footer__address-state">SFO</p>
                    <p class="main-footer__address-loc">
                        555 Address Ave<br />
                        San Fransisco, CA 05555<br />
                        (555) 555-5555
                    </p>
                </div>
                <a href="work-with-us" class="btn">
                    Work With Us
                    <svg class="arrow arrow-left" viewBox="0 0 33 21" width="33px" height="21px">
                        <use xlink:href="#left-arrow"></use>
                    </svg>
                </a>
            </div>
            <div class="main-footer__logo">
                <svg viewBox="0 0 198 38">
                    <use xlink:href="#cb-logo"></use>
                </svg>
            </div>
        </div>
        <div class="main-footer__base">
            <div class="main-footer__links">
                <ul class="main-footer__footer-links">
                    <li><a href="privacy-policy">Privacy Policy</a></li>
                    <li><a href="legal">Legal</a></li>
                    <li><a href="careers">Careers</a></li>
                </ul>
                <ul class="main-footer__sm">
                    <li>
                        <a href="#">
                            <svg viewBox="0 0 24 24" width="24">
                                <use xlink:href="#facebook-icon"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <svg viewBox="0 0 24 24" width="24">
                                <use xlink:href="#twitter-icon"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <svg viewBox="0 0 24 24" width="24">
                                <use xlink:href="#instagram-icon"></use>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="main-footer__copyright">
                <p>© 2018 CAMBRIDGE BIOMARKETING GROUP, LLC.</p>
            </div>
        </div>
    </div>
</footer>
<?php } else { ?>

    <footer class="home-footer">
        <img src="<?php echo bloginfo('template_directory') ?>/compiled/assets/images/home/SVG/Home_Careers.svg" class="home-footer__hiring-svg" />

        <div class="home-footer__scroll">
            <p>Scroll to Explore</p>
            <img src="<?php echo bloginfo('template_directory') ?>/compiled/assets/images/home/SVG/Scroll_icon.svg" class="home-footer__scroll-svg" />
        </div>

        <div class="home-footer__live-chat">
            LIVE CHAT
        </div>
    </footer>

<?php } ?>
