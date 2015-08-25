<?php
	$redirect = get_field('redirect');
	if ( $redirect ) :
		wp_redirect(clean_url($redirect), 301);
		exit;
	endif;
?>

<?php get_header(); ?>
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
		<div id="container">
			<?php the_content(); ?>
		</div>
	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>