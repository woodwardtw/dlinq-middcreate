<?php
/**
 * Partial template for content in home.php
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class('row'); ?> id="post-<?php the_ID(); ?>">	     

	<header class="entry-header col-md-4 home-left">
		<a href="<?php echo get_site_url();?>">
			<img src="<?php echo get_template_directory_uri();?>/imgs/full-logo.svg" class="img-fluid home-logo" alt="Midd Create logo.">
		</a>
		  <div class="you-can"> A place on the Internet where you have <span
		     class="txt-rotate" id="verb"
		     data-period="2000"
		     data-rotate='["control","choice","power"]'></span>.
		 </div>

	</header><!-- .entry-header -->


		<div class="entry-content col-md-8">
			<div class="row facet-row">
				<div class="col-md-4">
					<div class="home-facet">
						<h2>Creators</h2>
						<?php echo facetwp_display( 'facet', 'people' );?>
					</div>
				</div>
				<div class="col-md-4">
					<div class="home-facet">
						<h2>Tools</h2>
						<?php echo facetwp_display( 'facet', 'tools' );?>
					</div>
				</div>
				<div class="col-md-4">
					<div class="home-facet">
						<h2>Goals</h2>
						<?php echo facetwp_display( 'facet', 'goals' );?>
					</div>
				</div>
			</div>		

		<div id="examples">			
					<?php echo facetwp_display( 'template', 'examples' );?>
		</div>	
	</div>
			
		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
