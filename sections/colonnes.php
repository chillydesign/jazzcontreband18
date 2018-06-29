<?php global $ccc; global $color_classes; ?>
<?php $column_count =  sizeof(  get_sub_field('columns')  ); ?>



<div class="container">
	<div class="column_container">
	<?php $o = 0; while ( have_rows('columns') ) : the_row(); ?>
        <div class="column">
            <div class="<?php echo  $color_classes[$ccc % 4 ]; $ccc++ ; ?> ">
                <?php if(get_sub_field('background') == 'stripes' OR get_sub_field('background') == 'checkers' AND get_sub_field('title')) { ?>
                    <div class="title">
                        <?php echo get_sub_field('title'); ?>
                    </div>
                <?php } ?>
                <div class="content">
                    <?php echo get_sub_field('content'); ?>
                </div>
            </div>
        </div>
	<?php endwhile; ?>
</div> <!-- END OF COLUMN CONTAINER -->


</div><!--  END OF CONTAINER -->
