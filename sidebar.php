<?php
/**
 * 사이드바 템플릿
 *
 * @package AdSense_Pro
 */

if (!is_active_sidebar('sidebar-1')) {
    return;
}
?>

<aside id="secondary" class="widget-area">
    <?php dynamic_sidebar('sidebar-1'); ?>
    
    <?php if (!dynamic_sidebar('sidebar-1')) : ?>
        <!-- 기본 위젯 (사이드바가 비어있을 때) -->
        <section class="widget widget_recent_entries">
            <h2 class="widget-title">최근 글</h2>
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
                        <span class="post-date"><?php echo get_the_date('Y-m-d', $post['ID']); ?></span>
                    </li>
                    <?php
                endforeach;
                wp_reset_query();
                ?>
            </ul>
        </section>

        <section class="widget widget_categories">
            <h2 class="widget-title">카테고리</h2>
            <ul>
                <?php
                wp_list_categories(array(
                    'title_li' => '',
                    'show_count' => true,
                ));
                ?>
            </ul>
        </section>

        <section class="widget widget_archive">
            <h2 class="widget-title">보관함</h2>
            <ul>
                <?php
                wp_get_archives(array(
                    'type' => 'monthly',
                    'show_post_count' => true,
                    'limit' => 12,
                ));
                ?>
            </ul>
        </section>
    <?php endif; ?>
</aside>
