<?php
$header = get_field('next_page_header');
$copy = get_field('next_page_copy');
$btnText = get_field('next_page_button_text');
$url = get_field('next_page_url');
$imageID = get_field('next_page_image');
if($imageID){
    $image = wp_get_attachment_image_src($imageID, 'full');
    $imageAlt = get_post_meta($imageID, '_wp_attachment_image_alt', true);
}
?>

<!-- Not home -->
<?php if(!is_page(8)) { ?>
<footer class="main-footer">
    <div class="main-footer__inner">
        <div class="main-footer__image-copy">
            <div class="main-footer__copy">
                <p class="main-footer__copy-header"><?php echo $header ?></p>
                <p class="main-footer__copy-text">
                    <?php echo $copy ?>
                </p>
                <a href="<?php echo $url ?>" class="btn">
                    <span><?php echo $btnText ?></span>
                    <svg class="arrow arrow-right" viewBox="0 0 32 14">
                        <use xlink:href="#arrow-right"></use>
                    </svg>
                </a>
            </div>
            <div class="main-footer__image">
                <picture>
                    <source srcset="<?php echo $image[0] ?> 768w"
                            src="" />
                    <img src="" alt="" />
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
                    <span>Work With Us</span>
                    <svg class="arrow arrow-right" viewBox="0 0 32 14">
                        <use xlink:href="#arrow-right"></use>
                    </svg>
                </a>
            </div>
            <div class="main-footer__logo">
                <a href="<?php echo bloginfo('url'); ?>">
                    <svg viewBox="0 0 198 38">
                        <use xlink:href="#cb-logo"></use>
                    </svg>
                </a>
            </div>
        </div>
        <div class="main-footer__base">
            <div class="main-footer__links">
                <ul class="main-footer__footer-links">
                    <li><a href="<?php echo bloginfo('url'); ?>/privacy-policy">Privacy Policy</a></li>
                    <li><a href="<?php echo bloginfo('url'); ?>/legal">Legal</a></li>
                    <li><a href="<?php echo bloginfo('url'); ?>/careers">Careers</a></li>
                </ul>
                <ul class="main-footer__sm">
                    <li>
                        <a href="https://www.facebook.com/cambridgebiomarketing/" target="_blank">
                            <svg viewBox="0 0 24 24" width="24">
                                <use xlink:href="#facebook-icon"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/cambridgebmg" target="_blank">
                            <svg viewBox="0 0 24 24" width="24">
                                <use xlink:href="#twitter-icon"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/cambridgebiomarketing/" target="_blank">
                            <svg viewBox="0 0 24 24" width="24">
                                <use xlink:href="#instagram-icon"></use>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="main-footer__copyright">
                <p>© <?php echo date('Y'); ?> CAMBRIDGE BIOMARKETING GROUP, LLC.</p>
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
