<?php
/**
 * The template for displaying work archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cjm
 */

get_header();
?>

	<main id="primary" class="site-main">


			<header class="page-header">
				<?php
				post_type_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->



	<?php
	$args = array(
		'post_type' => 'cjm-work',
		'posts_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'cjm-staff-category',
				'field'    => 'slug',                     //different ways for wordpress to lookup the post 
				'terms'	   => 'Faculty'
			)
		)
	);
	$query = new WP_Query($args);
	if($query -> have_posts()){
		echo "<section class='work-section'><h2>Web</h2>";
		while($query -> have_posts()){
			$query -> the_post();

			echo '<article class="work-item">';
				echo '<a href="'. get_permalink() .'">';
					echo '<h2>'. get_the_title() .'</h2>';
					the_post_thumbnail('large');
				echo '</a>';
				the_excerpt();
			echo '</article>';
		}
		wp_reset_postdata();
		echo "</section>";
	}
	?>
	<?php

	$args = array(
		'post_type' => 'cjm-staff',
		'posts_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'cjm-staff-category',
				'field'    => 'slug',                     //different ways for wordpress to lookup the post 
				'terms'	   => 'Administrative'
			)
		)
	);
	$query = new WP_Query($args);
	if($query -> have_posts()){
		echo "<section class='work-section'><h2>Photo</h2>";
		while($query -> have_posts()){
			$query -> the_post();
			echo '<article class="work-item">';
				echo '<a href="'. get_permalink() .'">';
					echo '<h2>'. get_the_title() .'</h2>';
					the_post_thumbnail('large');
				echo '</a>';
				the_excerpt();
			echo '</article>';
		}
		wp_reset_postdata();
		echo "</section>";
	}
	?>

	
	</main><!-- #primary -->
<?php
get_footer();
