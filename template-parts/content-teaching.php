<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package min
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php if(get_field('photo_position') == "centre") {
		the_post_thumbnail(array(1024,786));
	} else {
		echo '<div class="smaller-photo '.get_field('photo_position').'">' . get_the_post_thumbnail() . '</div>';
	}

	?>
	
	<?php  ?>

	<div class="entry-content">
		<?php
		the_content();

		// check if the repeater field has rows of data
		if( have_rows('teaching_events') ):

		 	// loop through the rows of data
		    while ( have_rows('teaching_events') ) : the_row();

		    	$link = get_sub_field('event_link');
		    	$title = get_sub_field('event_name');
		    	$date = get_sub_field('event_date');
		    	$location = get_sub_field('event_location');
		    	$photo = get_sub_field('photo')['sizes']['medium'];

		        // display a sub field value
		        echo '<div class="teaching-event clearfix">';
		        if ($photo ) {
		        	echo '<img src="'.$photo.'" alt class="event-photo">';
		        }
		        echo '<p>';
		        echo '<strong>' . $date . '</strong><br>';
		        if ($link) {
		        	echo '<a href="' . $link . '">';
		        }
		        echo $title;
		        if ($link) {
		        	echo '</a>';
		        }
		        echo '<br>' . $location;
		        echo '</p>';
		        echo '</div>';

		    endwhile;

		else :

		    // no rows found

		endif;


		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'min' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'min' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
