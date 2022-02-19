<?php
/**
 * The template for displaying the home page
 *
 * 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php while ( have_posts() ) :
				the_post(); ?>

				<!-- display home title and get content from the about page (page id 11) -->
				<h1><?php the_title(); ?></h1>
			<?php 	$query = new WP_Query( 'page_id=11' ); 
					if($query -> have_posts()) :
						while ($query -> have_posts()) :
						$query -> the_post();
							the_content();
						endwhile;
					wp_reset_postdata(); 
					endif; ?>
		
			<!-- Recent News section -->
			<?php	$args = array(
					'post_type'      => 'post',
					'posts_per_page' => 3
				);
				$blog_query = new WP_Query($args);
					if($blog_query -> have_posts()) : ?>
					<section class="home-blog">
						<h2>Recent News</h2>
				<?php	while($blog_query -> have_posts()) :
							$blog_query -> the_post(); ?>
							<article class="news-container">
								<a href="<?php the_permalink();?>">
								<?php the_post_thumbnail('medium'); ?>
								<h3 class="news-card"><?php the_title(); ?></h3>
								</a>
							</article>
						<?php endwhile;
						wp_reset_postdata(); ?>
					</section>
				<?php  endif; ?>
		<?php endwhile; ?> <!--endwhile for page post loop (see top) -->
	</main><!-- #primary -->
<?php
get_footer();