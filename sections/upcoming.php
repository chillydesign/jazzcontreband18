<div class="black">
	<div class="container"  style="text-align: center;">
	<h2><a href ="<?php echo get_sub_field('link'); ?>">Prochainement</a></h2>
	<p class="seeall"><a href ="<?php echo get_sub_field('link'); ?>"><?php echo get_sub_field('link_text'); ?></a></p>

		<div class="row">
			<?php
				$event_type = get_sub_field('event_type');
				$today = date("Ymd");
				$args = array(
					'post_type' => $event_type,
					'posts_per_page' => 3,
					'meta_key'   => 'dates_0_date',
					'orderby'    => 'meta_value_num',
					'order'      => 'ASC',
					'meta_query' => array(
						array(
							'key'     => 'dates_0_date',
							'value'   => $today,
							'compare' => '>=',
						)
					)
			);
				$loop = new WP_Query( $args );
				$loop_nb = $loop->post_count;
				if ($loop_nb == 1) {echo '<div class="col-sm-4"></div>';} elseif($loop_nb == 2) {echo '<div class="col-sm-2"></div>';} 
				while ( $loop->have_posts() ) : $loop->the_post();
			?>

			<div class="col-sm-4">
			<a href="<?php the_permalink(); ?>">
				<div class="reperage_box stripes upcoming">
					<div class="white">
					<div class="event_thumb" style="padding: 30%; background-image:url(<?php if(has_post_thumbnail()){echo get_the_post_thumbnail_url(); } else {echo get_template_directory_uri() . '/img/placeholder.jpg';} ?>); background-size:cover;"></div>
						<div class="upcoming_description">
							 <h3><?php the_title(); ?></h3>
							 <br>
							 <div class="event_date">
								<?php $id = get_the_ID(); ?>
								<?php $numrows = count(get_field( 'dates' ) );?>
								<?php $i=1; ?>
								<?php while ( have_rows('dates', $id) ) : the_row() ; ?>
									<?php if($i == $numrows ){
												echo get_sub_field('date');
											} else {
												$pieces = explode(" ",  get_sub_field('date'));
												echo $pieces['0'] . ' - ';
												} ?>
									<?php $i++; ?>
								<?php endwhile; ?>
							</div>
						</div>
					</div>
				</div>
			</a>
			</div>

			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</div>


	</div>
</div>
