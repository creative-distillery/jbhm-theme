<div class="row">

  <?php

    $projects = get_field( 'project_gallery' );

  ?>

  <?php if ( $projects ) : ?>

    <div class="cd-gallery" id="frontPageGallery">

      <div class="cd-gallery-sizer"></div>

      <?php foreach ( $projects as $post ) : setup_postdata( $post ); ?>

        <?php

          $img = '';

          if ( get_field( 'header_img' ) ) {
            $img = get_field( 'header_img' );
          } elseif ( get_field( 'gallery' ) ) {
            $gallery = get_field( 'gallery' );
            $img = $gallery[0];
          }


          $location = ( get_field( 'location' ) ? get_field( 'location' ) : false );

          if ( ! empty($img) ) :
            $width = $img['width'];
            $height = $img['height'];
            $ratio = $width / $height;


          /*
            Add this snippet to the end of the class list of the <a> tag to have some images span two columns.
            If the image retrieved is wider than the specified ratio, it will trigger the wide image.
            Change ratio as desired.

            <?php if ( $ratio > 1.8 ) : ?> cd-gallery-wide<?php endif;?>
          */

        ?>

          <a class="cd-gallery-item frontpage-gallery-item" href="<?php the_permalink(); ?>">


            <img class="img-fluid" src="<?php echo $img['sizes']['thumbnail']; ?>" alt="<?php echo $img['alt']; ?>"/>

            <div class="frontpage-project-info<?php if ( ! $location ) : ?> no-location<?php endif; ?>">

              <div class="text-left w-75 h-size-adjust">
                <h3><?php the_title(); ?></h3>
                <?php if ( $location ) : ?>
                  <hr class="accent">
                  <h4 class="location"><?php the_field( 'location' ); ?></h4>
                <?php endif; ?>
              </div>

              <div class="text-right d-none d-md-block">
                <p class="cd-more">More  <i class="fa fa-caret-right fa-lg accent"></i></p>
              </div>

            </div>


          </a>

        <?php  endif; endforeach;  ?>

  </div>

<?php endif; wp_reset_postdata(); ?>

</div>
