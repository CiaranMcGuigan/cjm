<?php
/**
 * Template part for displaying posts
 * 
 * //the naming of this file can be anything you want - doesnt have to follow a hierchy
 * 
 * Template part for displaying work categoeries
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cjm
 */

?>


<?php
$terms = get_terms(
	array(
		'taxonomy' => 'cjm-student-category'
	)
);
if ($terms && ! is_wp_error($terms)):
?>

<section>
	<h2>See Our Work</h2>
	<ul>
		<?php foreach($terms as $term) : ?>
			<li>
				<a href="<?php echo get_term_link($term);  ?>"><?php echo $term->name; ?></a>
			</li>
		<?php endforeach; ?>
	</ul>
</section>
<?php endif;?>