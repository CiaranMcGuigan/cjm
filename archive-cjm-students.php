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


<!--------------- Students Section ---------------->
	<?php
	$args = array(
		'post_type' => 'cjm-students',
		'posts_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'cjm-student-category',
				'field'    => 'slug',                   
				'terms'	   => array('designers', 'developers')
			)
		)
	);
	$query = new WP_Query($args);
	if($query -> have_posts()) : 
		$terms = get_terms('cjm-student-category');?>
		<section class="student-wrapper">
        <?php	while($query -> have_posts()):
                $query -> the_post();
                echo '<article class="staff-member">';
				echo '<a href="'. get_permalink() .'">';
				echo '<h2>'. get_the_title() .'</h2>';
				the_post_thumbnail('medium');
				echo '</a>';
				echo '<p>' . the_excerpt() . '</p>';
				//loop to get taxonomy category
				foreach (get_the_terms(get_the_ID(), 'cjm-student-category') as $category) {
					echo '<span>Specialty: </span>';
					echo '<a href="'. get_term_link($category) .'">';
					echo $category->name;
					echo '</a>';
				 }
                    echo '</article>'; 
                endwhile; //while loop for content
            wp_reset_postdata(); ?>
        </section>
<?php endif; ?>
 
	</main><!-- #primary -->
<?php
get_footer();
