<?php
/**
 * 페이지 템플릿
 *
 * @package AdSense_Pro
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="site-content container">
        <div class="content-area">
            <?php
            while (have_posts()) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header>

                    <div class="entry-content">
                        <?php
                        the_content();

                        wp_link_pages(array(
                            'before' => '<div class="page-links">페이지: ',
                            'after' => '</div>',
                        ));
                        ?>
                    </div>
                </article>
                <?php
            endwhile;
            ?>
        </div>

        <?php get_sidebar(); ?>
    </div>
</main>

<?php
get_footer();
