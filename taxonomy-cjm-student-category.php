<?php
/**
 * The template for displaying work category of Photo
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cjm
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>
		<section class="student-type">
			<header class="page-header">
				<h1><?php single_term_title(); ?></h1>
			</header><!-- .page-header -->
		
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
			?>
				<article class="student-taxonomy-type">
					<a href="<?php the_permalink(); ?> ">
						<h2><?php the_title(); ?></h2>
                    </a>
						<?php the_post_thumbnail( 'tax-students' ); ?>
                        <?php the_content(); ?>
					
				</article>

			<?php

				

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		<section>
	</main><!-- #primary -->

<?php

get_footer();