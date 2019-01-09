<?php
$header = get_sub_field('header');
$copy = get_sub_field('copy');
$includeWorkFilter = get_sub_field('include_work_filter');
$subheader = get_sub_field('subheader');
$subheader_copy = get_sub_field('subheader_copy');
$large_page_title = get_sub_field('large_page_title');
?>

<div class="module-hero <?php if($includeWorkFilter) echo 'include-work-filter'; ?>">
    <div class="module-hero__inner">
        <div class="module-hero__header">
            <h1><?php echo $header ?></h1>
            <h2><?php echo $copy ?></h2>
        </div>

        <?php if($subheader || $subheader_copy) { ?>
        <div class="module-hero__subheader">
            <h3><?php echo $subheader ?></h3>
            <p class="module-hero__subheader-copy"><?php echo $subheader_copy ?></p>
            <span class="module-hero__large-page-title"><?php echo $large_page_title ?></span>
        </div>
        <?php } ?>

        <?php if($includeWorkFilter) { ?>
            <div class="module-hero__work-filter">
                <label>Filter Work By:</label>
                <select>
                    <option selected>All</option>
                </select>
            </div>
        <?php } ?>

        <svg viewBox="0 0 317 469" class="module-hero__thumbprint">
            <use xlink:href="#thumbprint-icon"></use>
        </svg>
    </div>
</div>
