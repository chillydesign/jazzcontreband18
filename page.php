<?php get_header(); ?>


	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

        <?php if ( is_front_page()  == false) : ?>
            <?php $image = (has_post_thumbnail())  ?  get_the_post_thumbnail_url() :  get_template_directory_uri() . '/img/placeholder.jpg'; ?>
            <header>
                <div class="container">
                    <div class="column_container">
                        <div class="column small_column">
                            <?php get_template_part( 'partials/logo' ); ?>
                        </div>
                        <div class="column big_column">
                        </div>
                    </div>
                </div>
                <div id="header_background" class="event_bg" style="background-image:url('<?php echo $image; ?>"></div>
            </header>
        <?php endif; ?>


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




<?php get_footer(); ?>
