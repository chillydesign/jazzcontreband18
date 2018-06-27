
<?php
$content =  get_sub_field('content');
$numbers =  get_sub_field('numbers');

$events = 	new WP_Query(array(
    'post_type' => 'evenement_festival',
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
));

?>
<div class="container">
    <div class="column_container column_container_reversed">


        <div class="column" id="about_jazzcontreband">

            <hr class="hr_yellow" />


            <div class="column_container" id="big_infos">
                <?php foreach ($numbers as $number) : ?>
                    <div class="column">
                        <div class="big_info">
                            <span><?php echo $number['number']; ?> </span>
                            <?php echo $number['text']; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <hr class="hr_yellow" />
            <?php echo $content; ?>
            <hr class="hr_yellow" />

        </div>

        <div class="column" id="agenda_front">
            <hr class="hr_black" />
            <h2>Prochainement</h2>
            <h4>Festival JCB - octobre 2018</h4>
            <p>Découvrez toute la programmation du festival JazzContreBand ici!</p>

            <?php while ( $events->have_posts() ) : $events->the_post(); ?>
                <?php $id =  get_the_ID(); ?>
                <?php $dates = get_field('dates', $id);  ?>
                <?php $nice_dates =  nice_event_dates($dates) ; ?>

                <hr class="hr_blue" />
                <div class="upcoming_event blue">
                    <h6><?php echo $nice_dates; ?></h6>
                    <p><strong>Something</strong></p>
                    <h5><?php the_title(); ?></h5>
                    <p>Location</p>
                </div>

            <?php endwhile; ?>



        </div>




    </div>
</div>
