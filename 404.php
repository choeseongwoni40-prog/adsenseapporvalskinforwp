<?php
/**
 * 404 에러 페이지
 *
 * @package AdSense_Pro
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="site-content container">
        <div class="content-area">
            <article class="post error-404">
                <header class="entry-header">
                    <h1 class="entry-title">페이지를 찾을 수 없습니다</h1>
                </header>

                <div class="entry-content">
                    <p>죄송합니다. 요청하신 페이지를 찾을 수 없습니다. 페이지가 이동되었거나 삭제되었을 수 있습니다.</p>
                    
                    <h2>다음을 시도해보세요:</h2>
                    <ul>
                        <li><a href="<?php echo esc_url(home_url('/')); ?>">홈페이지로 돌아가기</a></li>
                        <li>검색을 통해 원하시는 내용을 찾아보세요</li>
                    </ul>

                    <div style="margin-top: 30px;">
                        <?php get_search_form(); ?>
                    </div>

                    <h3 style="margin-top: 40px;">최근 글</h3>
                    <ul>
                        <?php
                        $recent_posts = wp_get_recent_posts(array(
                            'numberposts' => 5,
                            'post_status' => 'publish',
                        ));
                        
                        foreach ($recent_posts as $post) :
                            ?>
                            <li>
                                <a href="<?php echo get_permalink($post['ID']); ?>">
                                    <?php echo esc_html($post['post_title']); ?>
                                </a>
                            </li>
                            <?php
                        endforeach;
                        wp_reset_query();
                        ?>
                    </ul>
                </div>
            </article>
        </div>

        <?php get_sidebar(); ?>
    </div>
</main>

<?php
get_footer();
