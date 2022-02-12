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


<!--------------- Administrative Section ---------------->
	<?php
	$args = array(
		'post_type' => 'cjm-staff',
		'posts_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'cjm-staff-category',
				'field'    => 'slug',                   
				'terms'	   => 'administrative'
			)
		)
	);
	$query = new WP_Query($args);
	if($query -> have_posts()) : ?>
        <section class="staff-wrapper">
            <h2>Administrative</h2>
        <?php	while($query -> have_posts()):
                $query -> the_post();
                echo '<article class="staff-member">';
                echo '<h3>'. get_the_title() .'</h3>';
                    //statement for ACF fields
                    if(function_exists('get_field')) :
                        if(get_field('description')) : ?>
                            <p><?php the_field('description');?><p>       
                    <?php if(get_field('courses') && get_field('link')) : ?>  <!-- Only display these if the ACF fields exists -->
                            <p><?php the_field('courses'); ?></p>
                            <a href="<?php the_field('link');?>">Instructor Website</a>
                            <?php endif;
                    echo '</article>';		
                        endif; //ACF Description if statement
                    endif; //acf main if statement    
                endwhile; //while loop for content
            wp_reset_postdata(); ?>
        </section>
<?php endif; ?>
 
<!--------------- Faculty Section------------- -->
<?php

	$args = array(
		'post_type' => 'cjm-staff',
		'posts_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'cjm-staff-category',
				'field'    => 'slug',                   
				'terms'	   => 'faculty'
			)
		)
	);
	$query = new WP_Query($args);
	if($query -> have_posts()) : ?>
        <section class="staff-wrapper">
            <h2>Faculty</h2>
        <?php	while($query -> have_posts()):
                $query -> the_post();
                echo '<article class="staff-member">';
                echo '<h3>'. get_the_title() .'</h3>';
                    //statement for ACF fields
                    if(function_exists('get_field')) :
                        if(get_field('description')) : ?>
                            <p><?php the_field('description');?><p>
                    <?php if(get_field('courses') && get_field('link')) : ?>  <!-- Only display these if the ACF fields exists -->
                            <p><?php the_field('courses'); ?></p>
                            <a href="<?php the_field('link');?>">Instructor Website</a>
                    <?php endif;
                    echo '</article>';		
                        endif; //ACF Description if statement
                    endif; //acf main if statement    
                endwhile; //while loop for content
            wp_reset_postdata(); ?>
        </section>
<?php endif; ?>
	</main><!-- #primary -->
<?php
get_footer();
