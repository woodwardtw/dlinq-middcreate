<?php
/**
 * facet loop
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
while ( have_posts() ): the_post(); ?>
    <div class="col-md-4 card-holder">
            <div class="card position-relative">
                    <?php echo middcreate_resource_image();?>
              <div class="card-body">
                <a href="<?php the_permalink(); ?>" class="stretched-link"><?php the_title(); ?></a>        
              </div>
            </div>
    </div>
<?php endwhile;?> 