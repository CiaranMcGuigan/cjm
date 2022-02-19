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

        <div class="entry-content">
			
            <header class="page-header">
				<?php
				post_type_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

<!------------------ Output code to check if fields exist and if so, output the fields onto a table ------------------------->
        
            <?php if( get_field('title') && get_field('description') ): ?>
                <section class="schedule">
                    <h2><?php the_field('title'); ?></h2>
                    <p><?php the_field('description'); ?></p>
                
                    <?php if( have_rows('schedule') ): ?>
                        <table class="styled-table">
                            <thead>
                                <tr>
                                    <td>Date</td>
                                    <td>Course</td>
                                    <td>Instructor</td>
                                </tr>
                            </thead>
                            <?php while ( have_rows('schedule') ) : the_row(); ?>
                                <tr class="active-row">
                                    <td><?php the_sub_field('date'); ?></td>
                                    <td><?php the_sub_field('course'); ?></td>
                                    <td><?php the_sub_field('instructor'); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </table>
                    <?php endif; ?>
                </section>
            <?php endif; ?>
        </div>
    </main>

<?php get_footer(); ?>
