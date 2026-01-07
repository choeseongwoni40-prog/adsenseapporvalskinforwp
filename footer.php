<footer id="colophon" class="site-footer">
        <div class="container">
            <div class="site-info">
                <p>
                    &copy; <?php echo date('Y'); ?> 
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php bloginfo('name'); ?>
                    </a>
                    - 모든 권리 보유
                </p>
                <p>
                    <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>">개인정보처리방침</a> | 
                    <a href="<?php echo esc_url(home_url('/terms')); ?>">이용약관</a>
                </p>
            </div>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
