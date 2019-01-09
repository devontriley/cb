<?php $mainNav = wp_get_nav_menu_items('main-nav'); ?>

<header class="main-header">
    <div class="main-header__logo">
        <svg viewBox="0 0 198 38">
            <use xlink:href="#cb-logo"></use>
        </svg>
    </div>

    <a href="#0" class="main-header__hamburger" role="button">
        <svg viewBox="0 0 23 14" width="23">
            <use xlink:href="#hamburger-icon"></use>
        </svg>
    </a>
</header>

<nav class="main-nav modal-content modal-content--disabled">
    <ul class="main-nav__items">
        <?php foreach($mainNav as $nav) : ?>
            <li class="main-nav__item">
                <a class="main-nav__link" href="<?php echo $nav->url ?>"><?php echo $nav->title ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>