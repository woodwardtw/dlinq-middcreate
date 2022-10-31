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

	<header class="entry-header col-md-4">
		<a href="">
			<img src="<?php echo get_template_directory_uri();?>/imgs/full-logo.svg" class="img-fluid" alt="Midd Create logo.">
		</a>		

	</header><!-- .entry-header -->


	<div class="entry-content col-md-8">
		<div class="do-block">
		  <div class="you-can"> A place on the Internet where you have <span
		     class="txt-rotate" id="verb"
		     data-period="2000"
		     data-rotate='["control","choice","power"]'></span>.</div>
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
