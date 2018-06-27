
<!-- SHARED TEMPLATE BEWEEN FESTIVAL AND SAISON EVENEMENTS -->
<?php $ticketing_link = get_field('ticketing_link'); ?>
<?php $practical_info = get_field('information'); ?>
<?php $date = get_field('date'); ?>
<?php $members = get_field('members'); ?>
<?php $tarif_plein = get_field('tarif_plein'); ?>
<?php $tarifs_reduits = get_field('tarifs_reduits'); ?>
<?php $tarif_passe_partout_jcb = get_field('tarif_passe-partout_jcb'); ?>
<?php $ticketing_link = get_field('ticketing_link'); ?>
<?php $styles = get_field('styles'); ?>
<?php $time = get_field('time'); ?>
<?php $artist_name = get_field('artist_name'); ?>
<?php $description = get_field('description'); ?>
<?php $lineup = get_field('line-up'); ?>
<?php $website = get_field('website'); ?>
<?php $countries = get_field('countries'); ?>
<?php $id = get_the_ID(); ?>
<?php  $image = (has_post_thumbnail() ) ?  get_the_post_thumbnail_url() :  get_template_directory_uri() . '/img/placeholder.jpg'; ?>

<header>
    <div class="container">
        <div class="column_container">
            <div class="column small_column">
                <?php get_template_part( 'partials/logo' ); ?>
            </div>
            <div class="column large_column">
            </div>
        </div>
    </div>
    <div id="header_background" style="background-image:url('<?php echo $image; ?>"></div>
</header>

<!-- article -->
<article  <?php post_class(); ?>>

    <div class="container">
        <div class="column_container column_container_reversed">

            <div  id="event_information" class="column big_column green_column">

                <hr class="hr_yellow" />
                <h1><?php the_title(); ?>
                    <?php if($artist_name): ?>
                        - <?php echo $artist_name; ?><br>
                    <?php endif; ?>
                </h1>
                <hr class="hr_yellow" />
                <?php if( $styles) : ?>
                    <p class="event_styles">
                    <?php $i = 1;
                    foreach( $styles as $style ):
                        if ($i == 1) {
                             echo '<i class="fa fa-tags" aria-hidden="true"></i> ';
                         } else {
                             echo ' - ';
                         };
                        echo $style;
                        $i++;
                    endforeach; ?>
                </p><br>
            <?php endif; // end of if $styles ?>


            <?php if(have_rows('dates', $id)) : ?>
                <p class="event_info">
                    <?php $numrows = count(get_field( 'dates' ) );?>
                    <?php if($numrows != 0){?><span><i class="fa fa-calendar" aria-hidden="true"></i> <?php } ?>
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
                    </span> |
                    <?php if ( $time ) :?>
                        <span><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $time; ?></span> |
                    <?php endif; // end of if $time ?>
                    <?php if (!empty($members)) : ?>
                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $members->post_title; ?> - <?php echo get_field('ville', $members->ID); ?></span>
                    <?php endif; // end of if members ?>
                </p>
            <?php endif; // end of if dates ?>


        <?php if( $countries) : ?>
            <p class="event_countries">
                 <i class="fa fa-globe" aria-hidden="true"></i>
                 <?php echo $countries; ?>
             </p>
        <?php endif; // end of countries ?>


        <?php echo $description; ?>

        <?php if( $lineup): ?>
            <div class="line-up">
                <p>Line-up: </p>
                <?php echo $lineup;?>
            </div>
        <?php endif; // end of lineup ?>

        <?php if( $website): ?>
            <div class="website">
                <p>
                    <a class="event_website" href="<?php echo get_field('website'); ?>" target="_blank" >
                        <i class="fa fa-link" aria-hidden="true"></i>
                        <?php echo $website; ?>
                    </a>
                </p>
            </div>
        <?php endif; // end of website ?>



        </div> <!-- END OF EVENTINFORMATION -->


            <div id="ticketing" class="column small_column yellow_column">
                        <hr class="hr_black">
                <h3> Tarifs </h3>
                <?php if(! $tarif_plein ) : ?>
                    <p>Pas encore défini</p>
                <?php  elseif(!$tarifs_reduits && !$tarif_passe_partout_jcb) : ?>
                    <p><?php echo $tarif_plein; ?></p>
                <?php  else : ?>
                    <div class=" pricing">
                        <p><strong>Tarif plein</strong>: <?php echo $tarif_plein; ?></p>
                        <?php if(  $tarifs_reduits  ) : ?>
                            <div class="pp_jcb"><p><strong>Tarif(s) réduit(s)</strong>: <?php echo ' ' . $tarifs_reduits; ?></p></div>
                        <?php endif;  // end of if $tarifs_reduits ?>
                        <?php if($tarif_passe_partout_jcb) : ?>
                            <div class="pp_jcb"><p><strong>Tarif passe-partout JCB</strong>: <?php echo $tarif_passe_partout_jcb; ?></p></div>
                            <h6><a target="_blank" href="https://etickets.infomaniak.com/shop/YwGYSsVfjX/"><i class="fa fa-key" aria-hidden="true"></i>  Acheter le passe-partout</a></h6>
                        <?php endif;  // end of if $tarif_passe_partout_jcb  ?>
                    </div>
                <?php endif; ?>
                <?php if( $ticketing_link ) :  ?>
                    <h3>Billeterie</h3>
                    <p>
                        <a class="event_website" href ="<?php echo $ticketing_link;?>" target ="_blank"><i class="fa fa-ticket" aria-hidden="true"></i>  Acheter vos tickets en ligne</a>
                    </p>
                <?php endif;  // end of if ticketinglink ?>
            </div>
        </div>
    </div>




    <!-- <section class="section  image_section" style="background-image: url()">


        <div class="ticket_section">
            <?php if(get_field('ticketing_link')){ ?>
                <p class="yellow_p"><a target="_blank" href="<?php echo get_field('ticketing_link');?>"><i class="fa fa-ticket" aria-hidden="true"></i> Billetterie</a></p><br>
            <?php }  ?>
            <?php if(get_field('tarif_passe-partout_jcb')){ ?>
                <p><a target="_blank" href="https://etickets.infomaniak.com/shop/YwGYSsVfjX/"><i class="fa fa-key" aria-hidden="true"></i> Passe-Partout JCB</a></p>
            <?php } ?>
        </div>

    </section> -->



    <section class="section  section_colonnes ">
        <div class="container section2col">
            <div class="row">
                <div class="sectioncol col-sm-6 colnmb1 white ">
                    <div class="content event_membres_details">
                        <!-- <h2> <?php the_title(); ?></h2> -->


                        </div>
                    </div>
                    <div class="sectioncol col-sm-6 colnmb2 white event_featured_image">
                        <div class="event_featured_image_inner">
                            <?php the_post_thumbnail(); ?>
                            <?php $thumb_copyright= get_post(get_post_thumbnail_id())->post_content; ?>
                            <?php if ( $thumb_copyright != '') : ?>
                                <p class="copyright_info"><?php echo $thumb_copyright; ?></p>
                            <?php endif; ?>
                        </div>


                    </div>
                </div> <!-- END OF ROW -->
            </div><!--  END OF CONTAINER -->
        </section>

        <?php if(get_field('artist_name_minor')){ ?>

            <section class="section  section_colonnes " style="background-color: black;">
                <div class="container section2col">
                    <div class="row">
                        <div class="sectioncol col-sm-6 colnmb1 black ">
                            <div class="content event_membres_details">
                                <h2> <?php echo get_field('artist_name_minor'); ?></h2><br>
                                <?php if(get_field('countries_minor')){ ?><p class="event_countries"> <i class="fa fa-globe" aria-hidden="true"></i>  <?php echo get_field('countries_minor'); ?></p><?php } ?>
                                <?php echo get_field('description_minor') ;?>
                                <?php if(get_field('line-up_minor')){?><div class="line-up"><p>Line-up: </p><?php echo get_field('line-up_minor');?></div><?php } ?>
                                    <?php if(get_field('website_minor')){?><div class="website"><p><a class="event_website" href="<?php echo get_field('website_minor'); ?>" target="_blank" ><i class="fa fa-link" aria-hidden="true"></i>  <?php echo get_field('website_minor');?></a></p></div><?php } ?>

                                </div>
                            </div>
                            <div class="sectioncol col-sm-6 colnmb2 black event_featured_image">
                                <?php $minor_photo = get_field('photo_minor'); ?>
                                <div class="event_featured_image_inner">
                                    <img src="<?php echo $minor_photo['url']; ?>">
                                    <?php if ($minor_photo['description'] != '') : ?><p class="copyright_info"><?php echo $minor_photo['description']; ?></p><?php endif; ?>
                                </div>

                            </div>
                        </div> <!-- END OF ROW -->
                    </div><!--  END OF CONTAINER -->
                </section>
            <?php } ?>


            <section class="section  section_colonnes ">



                <div class="container-fluid section2col">
                    <div class="row">
                        <div class="sectioncol col-sm-6 stripes colnmb1 nexttomap">


                        </div>
                        <div class="sectioncol col-sm-6 colnmb2 map_half_section">
                            <?php if ($members) {
                                echo do_shortcode('[jazz_membres_map]');
                            }
                            ?>
                        </div>
                    </div> <!-- END OF ROW -->


                </div><!--  END OF CONTAINER -->

            </section>












        </article>
