<?php

  if ( get_field( 'header_img' ) ) {
    get_header( 'header_img' );
  } else {
    get_header();
  }

  $args = array(
    'taxonomy' => 'services',
    'hide_empty' => false,
    'orderby' => 'name',
    'order' => 'ASC'
  );

  $query = new WP_Term_Query( $args );

  $services = get_field( 'services' );
?>

<div <?php post_class(); ?>>

  <div class="row my-5">
    <div class="col">
      <h2 class="project-title accent"><?php the_title();  ?></h2>
    </div>
  </div>

  <div class="row mt-2">

        <?php foreach ( $services as $service ) : ?>

          <?php $acf_term_id = 'services_' . $service->term_id; ?>
          <?php $img = get_field( 'image', $acf_term_id ); ?>

          <a class="cd-grid-item tax-grid-item col-12 col-sm-6 col-md-4 col-xl-3" href="../services/<?php echo $service->slug; ?>">

            <p class="more-link">More  <i class="fa fa-caret-right fa-lg accent"></i></p>

            <div class="img">
              <img src="<?php echo $img['sizes']['thumbnail']; ?>" alt="<?php echo $img['alt']; ?>"/>
            </div>

            <div class="cd-grid-content">
              <h3 class="w-75"><?php echo $service->name; ?></h3>
            </div>

          </a>


        <?php endforeach; ?>

  </div>
</div>

<?php get_footer(); ?>
