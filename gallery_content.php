


<div class="container">
<div class="column_container">
    <?php  $count = 0; ?>
<?php while(have_rows('galleries')): the_row() ;  ?>
    <?php $page =  get_sub_field('link'); ?>
    <?php $image =  get_sub_field('image'); ?>
    <div class="column">
    <a href="<?php echo $page->guid; ?>">
    <div class=" reperage_box stripes upcoming">
      <div class="white">
        <div class="event_thumb" style="padding:30%; background-image:url(<?php echo $image['sizes']['small'] ; ?>);"></div>
        <div class="upcoming_description">
          <h3> <?php echo $page->post_title; ?></h3>
        </div>
      </div>
    </div>
  </a>
  </div>
  <?php  if($count % 3 == 2) echo '</div> <!-- END OF ROW --> <div class="column_container">' ; ?>
<?php $count++; ?>
<?php endwhile; ?>
</div><!-- END OF ROW -->
</div>
