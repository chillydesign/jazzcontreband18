<?php get_header(); ?>





<!-- section -->
<section >

	<!-- <h1 class="container"><?php //the_title(); ?></h1> -->

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>



		<!-- article -->
		<article id="post-<?php the_ID(); ?>" >
			<?php if( !post_password_required( $post )): ?>
				<?php include('section-loop.php'); ?>
				<?php if( have_rows('galleries') ) get_template_part('gallery_content'); ?>
				<?php if( have_rows('press') ) get_template_part('press_content'); ?>
			<?php endif; ?>


				<?php the_content(); ?>




		</article>
		<!-- /article -->

	<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article class="container">

		<h2><?php _e( 'Sorry, nothing to display.', 'webfactor' ); ?></h2>

	</article>
	<!-- /article -->

<?php endif; ?>

</section>
<!-- /section -->




<?php get_footer(); ?>
