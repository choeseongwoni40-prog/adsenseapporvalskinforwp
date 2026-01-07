<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <?php if (is_singular()) : ?>
        <meta name="description" content="<?php echo esc_attr(get_post_meta(get_the_ID(), '_seo_description', true) ?: wp_trim_words(get_the_excerpt(), 20)); ?>">
        <meta name="keywords" content="<?php echo esc_attr(get_post_meta(get_the_ID(), '_seo_keywords', true)); ?>">
        
        <!-- Open Graph -->
        <meta property="og:title" content="<?php the_title(); ?>">
        <meta property="og:description" content="<?php echo esc_attr(wp_trim_words(get_the_excerpt(), 20)); ?>">
        <meta property="og:url" content="<?php the_permalink(); ?>">
        <meta property="og:type" content="article">
        <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
        
        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="<?php the_title(); ?>">
        <meta name="twitter:description" content="<?php echo esc_attr(wp_trim_words(get_the_excerpt(), 20)); ?>">
    <?php else : ?>
        <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php endif; ?>
    
    <!-- 구글 애드센스를 위한 최적화 -->
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <link rel="canonical" href="<?php echo esc_url(is_singular() ? get_permalink() : home_url('/') . $_SERVER['REQUEST_URI']); ?>">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary">본문으로 건너뛰기</a>

    <header id="masthead" class="site-header">
        <div class="container">
            <div class="site-branding">
                <h1 class="site-title">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                        <?php bloginfo('name'); ?>
                    </a>
                </h1>
                <?php
                $description = get_bloginfo('description', 'display');
                if ($description || is_customize_preview()) :
                    ?>
                    <p class="site-description"><?php echo $description; ?></p>
                <?php endif; ?>
            </div>

            <nav id="site-navigation" class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id' => 'primary-menu',
                    'fallback_cb' => 'adsense_pro_fallback_menu',
                ));
                ?>
            </nav>
        </div>
    </header>

<?php
// 기본 메뉴가 없을 때 폴백
function adsense_pro_fallback_menu() {
    echo '<ul id="primary-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">홈</a></li>';
    wp_list_pages(array(
        'title_li' => '',
        'depth' => 1,
    ));
    echo '</ul>';
}
