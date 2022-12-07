<?php
/**
 * The template for displaying all single examples
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-wrapper">

	<div class="container-fluid" id="content" tabindex="-1">

		<div class="row">

			<header class="entry-header col-md-4 home-left">
				<a href="<?php echo get_site_url();?>">
					<img src="<?php echo get_template_directory_uri();?>/imgs/full-logo.svg" class="img-fluid home-logo" alt="Midd Create logo.">
				</a>
				 <!--  <div class="you-can"> A place on the Internet where you have <span
				     class="txt-rotate" id="verb"
				     data-period="2000"
				     data-rotate='["control","choice","power"]'></span>.
				 </div> -->

			</header><!-- .entry-header -->

			<main class="site-main col-md-12" id="main">

				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'single-example' );
					understrap_post_nav();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				}
				?>

			</main><!-- #main -->
			

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_footer();
