<?php $column_count =  sizeof(  get_sub_field('columns')  ); ?>

<?php $i = 1; ?>


<div class="container section<?php echo $column_count; ?>col">
	<div class="column_container">
	<?php while ( have_rows('columns') ) : the_row(); ?>
		<div class="column  <?php echo  get_sub_field('background') . ' colnmb' . $i; ?>">
			<?php if(get_sub_field('background') == 'stripes' OR get_sub_field('background') == 'checkers' AND get_sub_field('title')) { ?>
			<div class="title">
				<?php echo get_sub_field('title'); ?>
			</div>
			<?php } ?>
			<div class="content">
				<?php echo get_sub_field('content'); ?>
			</div>
		</div>
	<?php $i++; ?>
	<?php endwhile; ?>
</div> <!-- END OF COLUMN CONTAINER -->


</div><!--  END OF CONTAINER -->
