<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
		<?php while ( have_posts() ) : the_post(); ?>

		<?php setPostViews(get_the_ID());  ?>

		<nav id="nav-single">
		<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentyeleven' ); ?></h3>
                <?php
                $prev_post = get_previous_post();
                if (!empty( $prev_post )): ?>
                    <a href="<?php echo get_permalink( $prev_post->ID ); ?>"><span class="nav-previous"><?php printf("上一篇: %s", $prev_post->post_title ); ?></a></span>
                <?php endif; ?>
		 <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="nav-home">首页</span></a>
		<?php
                $next_post = get_next_post();
                if (!empty( $next_post )): ?>
                    <a href="<?php echo get_permalink( $next_post->ID ); ?>"><span class="nav-next"><?php printf("下一篇: %s", $next_post->post_title ); ?></span></a>
                <?php endif; ?>
		</nav>

					<?php get_template_part( 'content-single', get_post_format() ); ?>

<!-- Duoshuo Comment BEGIN -->
	<div class="ds-thread"></div>
<script type="text/javascript">
var duoshuoQuery = {short_name:"joest"};
	(function() {
		var ds = document.createElement('script');
		ds.type = 'text/javascript';ds.async = true;
		ds.src = 'http://static.duoshuo.com/embed.js';
		ds.charset = 'UTF-8';
		(document.getElementsByTagName('head')[0] 
		|| document.getElementsByTagName('body')[0]).appendChild(ds);
	})();
	</script>
<!-- Duoshuo Comment END -->

					<?php //comments_template( '', true ); ?>
	
			<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
