<?php
/**
 * 메인 템플릿 파일
 *
 * @package AdSense_Pro
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="site-content container">
        <div class="content-area">
            <?php
            if (have_posts()) :
                
                while (have_posts()) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <h2 class="entry-title">
                                <a href="<?php the_permalink(); ?>" rel="bookmark">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            <div class="entry-meta">
                                <span class="posted-on">
                                    <time datetime="<?php echo get_the_date('c'); ?>">
                                        <?php echo get_the_date(); ?>
                                    </time>
                                </span>
                                <span class="byline">
                                    작성자: <?php the_author(); ?>
                                </span>
                            </div>
                        </header>

                        <div class="entry-content">
                            <?php
                            if (is_single()) {
                                the_content();
                            } else {
                                the_excerpt();
                            }
                            ?>
                        </div>
                    </article>
                    <?php
                endwhile;

                // 페이지네이션
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => '← 이전',
                    'next_text' => '다음 →',
                ));

            else :
                ?>
                <article class="post no-results">
                    <header class="entry-header">
                        <h1 class="entry-title">게시글이 없습니다</h1>
                    </header>
                    <div class="entry-content">
                        <p>아직 게시된 글이 없습니다. 곧 유익한 콘텐츠로 찾아뵙겠습니다.</p>
                    </div>
                </article>
                <?php
            endif;
            ?>
        </div>

        <?php get_sidebar(); ?>
    </div>
</main>

<?php
get_footer();
