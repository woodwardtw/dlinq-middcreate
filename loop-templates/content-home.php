<?php
/**
 * Partial template for content in home.php
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		 <div class="title-block">
		    <div class="midd">MI</br>DD</div>
		    <div class="create">Create</div>
		  </div>

	</header><!-- .entry-header -->


	<div class="entry-content">
		<div class="summary">A place on the Internet where you have 
				<div class="trifecta"><a href="#" class="emph">power</a>, <a href="#" class="emph">choice</a>, and <a href="#" class="emph">control</a>!
				</div>
			</div>
		<div class="row">
			<?php middcreate_homepage_blocks();?>
		</div>
		<div class="row goals" id="goal-row">
			<div class="col-md-4 goal">
				<h2>Portfolios</h2>
				<div class="description">
					Show people who you are.
				</div>
				<?php middcreate_creations('portfolio');?>
			</div>
			<div class="col-md-4 goal">
				<h2>Projects</h2>
				<div class="description">
					Make something special.
				</div>
				<?php middcreate_creations('project');?>	
			</div>
			<div class="col-md-4 goal">
				<h2>Courses</h2>
				<div class="description">
					Create a different kind of course.
				</div>
				<?php middcreate_creations('course');?>
			</div>
		</div>
		<?php the_content(); ?>

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
