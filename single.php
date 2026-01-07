<?php
/**
 * 단일 글 템플릿
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
                        <div class="entry-meta">
                            <span class="posted-on">
                                <time datetime="<?php echo get_the_date('c'); ?>">
                                    <?php echo get_the_date('Y년 m월 d일'); ?>
                                </time>
                            </span>
                            <span class="byline">
                                작성자: <?php the_author(); ?>
                            </span>
                            <?php if (get_the_category()) : ?>
                                <span class="cat-links">
                                    카테고리: <?php the_category(', '); ?>
                                </span>
                            <?php endif; ?>
                        </div>
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

                    <footer class="entry-footer">
                        <?php
                        $tags_list = get_the_tag_list('', ', ');
                        if ($tags_list) {
                            printf('<div class="tags-links"><strong>태그:</strong> %s</div>', $tags_list);
                        }
                        ?>
                    </footer>
                </article>

                <?php
                // 이전/다음 글 네비게이션
                the_post_navigation(array(
                    'prev_text' => '<span class="nav-subtitle">이전 글:</span> <span class="nav-title">%title</span>',
                    'next_text' => '<span class="nav-subtitle">다음 글:</span> <span class="nav-title">%title</span>',
                ));

                // 댓글 (필요시)
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;

            endwhile;
            ?>
        </div>

        <?php get_sidebar(); ?>
    </div>
</main>

<?php
get_footer();
