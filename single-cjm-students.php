<?php
/**
 * The template for displaying all single work posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cjm
 */

get_header();
?>

    <main id="primary" class="site-main">
		<section>
			<?php
				get_template_part( 'template-parts/content', 'post' );
				$args = array(
					'post_type'      => 'cjm-student-category',
					'orderby'        => 'title',
					'order'          => 'ASC',
					'posts_per_page' => -1,
				);
          
              
                $terms = get_the_terms( get_the_ID(), 'cjm-student-category');
                foreach($terms as $term) {
                    echo the_post();
                    echo '<a class="icon-hv-link" href="' . get_term_link($term) . '"><i class="icon-left-open-big"></i><span>' . $term->name . '</span></a>';
                }
              ?>
            
	</main><!-- #primary -->

<?php

get_footer();
