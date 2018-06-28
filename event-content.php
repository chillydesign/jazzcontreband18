
<!-- SHARED TEMPLATE BEWEEN FESTIVAL AND SAISON EVENEMENTS -->
<?php $ticketing_link = get_field('ticketing_link'); ?>
<?php $practical_info = get_field('information'); ?>
<?php $dates = get_field('dates'); ?>
<?php $members = get_field('members'); ?>
<?php $tarif_plein = get_field('tarif_plein'); ?>
<?php $tarifs_reduits = get_field('tarifs_reduits'); ?>
<?php $tarif_passe_partout_jcb = get_field('tarif_passe-partout_jcb'); ?>
<?php $styles = get_field('styles'); ?>
<?php $time = get_field('time'); ?>
<?php $artist_name = get_field('artist_name'); ?>
<?php $description = get_field('description'); ?>
<?php $lineup = get_field('line-up'); ?>
<?php $website = get_field('website'); ?>
<?php $countries = get_field('countries'); ?>
<?php $artist_name_minor = get_field('artist_name_minor'); ?>

<?php $id = get_the_ID(); ?>
<?php $has_image =  has_post_thumbnail(); ?>
<?php $image = ($has_image)  ?  get_the_post_thumbnail_url() :  get_template_directory_uri() . '/img/placeholder.jpg'; ?>

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

<!-- article -->
<article  <?php post_class(); ?>>

    <div class="container">
        <div class="column_container column_container_reversed">

            <div  id="event_information" class="column big_column ">
                <div class="green_box">

                    <h1 class="bordered_title"><?php the_title(); ?>
                        <?php if($artist_name): ?>
                            - <?php echo $artist_name; ?><br>
                        <?php endif; ?>
                    </h1>

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
                            <?php $numrows = count( $dates );?>
                            <?php if($numrows != 0){?><span><i class="fa fa-calendar" aria-hidden="true"></i> <?php } ?>
                                <?php echo nice_event_dates( $dates   ); ?>
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


                </div> <!-- END OF GREEN BOX -->
                <?php if ($has_image): ?>
                    <div class="event_featured_image">
                        <img src="<?php echo $image; ?>" alt="">
                        <?php $thumb_copyright= get_post(get_post_thumbnail_id())->post_content; ?>
                        <?php if ( $thumb_copyright != '') : ?>
                            <p class="copyright_info"><?php echo $thumb_copyright; ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; // end of if hasimage; ?>


                <?php if ($members && $artist_name_minor ) :  ?>
                    <div id="map_section">
                        <?php echo do_shortcode('[jazz_membres_map]'); ?>
                    </div>
                <?php endif; // end of if members ?>




            </div> <!-- END OF EVENTINFORMATION -->




            <div id="ticketing" class="column small_column ">
                <div class="yellow_box">
                    <hr >
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
                        <hr>
                        <h3>Billeterie</h3>
                        <p>
                            <a class="event_website" href ="<?php echo $ticketing_link;?>" target ="_blank"><i class="fa fa-ticket" aria-hidden="true"></i>  Acheter vos tickets en ligne</a>
                        </p>
                    <?php endif;  // end of if ticketinglink ?>
                </div> <!-- END OF YELLOWBOX -->




                    <?php if($artist_name_minor): ?>
                        <?php $countries_minor = get_field('countries_minor'); ?>
                        <?php $line_up_minor = get_field('line-up_minor'); ?>
                        <?php $website_minor = get_field('website_minor'); ?>
                        <?php $description_minor = get_field('description_minor'); ?>
                        <?php $minor_photo = get_field('photo_minor'); ?>
                        <div class="yellow_box" id="minor_artist">
                            <div class="content event_membres_details">

                                <h2 class="bordered_title"> <?php echo $artist_name_minor; ?></h2>


                                <?php if($countries_minor): ?>
                                    <p class="event_countries">
                                        <i class="fa fa-globe" aria-hidden="true"></i>
                                        <?php echo $countries_minor; ?></p>
                                <?php endif; // end of if countries minor ?>
                                <?php echo $description_minor ;?>

                                <?php if($line_up_minor) : ?>
                                    <div class="line-up">
                                        <p>Line-up: </p>
                                        <?php echo $line_up_minor;?>
                                    </div>
                                <?php endif; // end if linupminor ?>
                                <?php if($website_minor): ?>
                                    <div class="website">
                                        <p>
                                            <a class="event_website" href="<?php echo $website_minor; ?>" target="_blank" >
                                                <i class="fa fa-link" aria-hidden="true"></i>
                                                <?php echo $website_minor;?>
                                            </a>
                                        </p>
                                    </div>
                                <?php endif; // end if websiteminor ?>
                            </div>
                        </div> <!-- END OF YELLOW BOX -->



                        <?php if ($minor_photo): ?>
                        <div class="event_featured_image">
                            <img src="<?php echo $minor_photo['url']; ?>">
                            <?php if ($minor_photo['description'] != '') : ?>
                                <p class="copyright_info">
                                    <?php echo $minor_photo['description']; ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <?php endif; // end of if $minor_photo; ?>

                        <?php endif; // end if $artist_name_minor ?>

                        <?php if ($members && $artist_name_minor == false ) :  ?>
                            <div id="map_section">
                                <?php echo do_shortcode('[jazz_membres_map]'); ?>
                            </div>
                        <?php endif; // end of if members ?>


            </div> <!-- END OF #TICKETING -->
        </div>




    </div>



<?php if (false): ?>
    <?php if(get_field('ticketing_link')){ ?>
        <p class="yellow_p"><a target="_blank" href="<?php echo get_field('ticketing_link');?>"><i class="fa fa-ticket" aria-hidden="true"></i> Billetterie</a></p><br>
    <?php }  ?>
    <?php if(get_field('tarif_passe-partout_jcb')){ ?>
        <p><a target="_blank" href="https://etickets.infomaniak.com/shop/YwGYSsVfjX/"><i class="fa fa-key" aria-hidden="true"></i> Passe-Partout JCB</a></p>
    <?php } ?>
<?php endif; ?>


</article>
