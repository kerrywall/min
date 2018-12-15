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

	<div class="entry-content music">
		<?php

				// video

				// check if the repeater field has rows of data
				if( have_rows('video') ):

					echo '<section class="videos clearfix">';
					echo '<h2>Video</h2>';

				 	// loop through the rows of data
				    while ( have_rows('video') ) : the_row();

				    	$embed = get_sub_field('youtube_code');
				    	$title = get_sub_field('video_title');
				    	$description = get_sub_field('video_description');

				        // display a sub field value
				       echo '<div class="video clearfix">';
				       echo '<div class="embed">';
				        
				       echo $embed;
				    
				       echo '</div>';

				       if ($title) {
				       	echo '<div class="information">';
				       	echo '<h3>' . $title . '</h3>';
				       	echo '<p>' . $description . '</p>';
				       	echo '</div>';
				       }

				       
				       echo '</div>';

				    endwhile;

				    echo '</section>';

				else :

				    // no rows found

				endif;

		// audio

		// check if the repeater field has rows of data
		if( have_rows('audio') ):

			echo '<section class="audios clearfix">';
			echo '<h2>Audio</h2>';

		 	// loop through the rows of data
		    while ( have_rows('audio') ) : the_row();

		    	$url = get_sub_field('file');
		    	$title = get_sub_field('audio_title');
		    	$description = get_sub_field('audio_description');

		        // display a sub field value
		        echo '<div class="audio clearfix">';
		        
		        echo '<h3>' . $title . '</h3>';
		       
		        echo '<p>' . $description . '</p>';
		        echo '<audio controls>
  						<source src="'.$url.'" type="audio/mpeg">
					</audio>';
		        echo '</div>';

		    endwhile;

		    echo '</section>';

		else :

		    // no rows found

		endif;

		// cds

		// check if the repeater field has rows of data
		if( have_rows('cds') ):

			echo '<section class="recordings clearfix">';
			echo '<h2>CDs</h2>';

		 	// loop through the rows of data
		    while ( have_rows('cds') ) : the_row();

		    	$link = get_sub_field('event_link');
		    	$title = get_sub_field('cd_name');
		    	$description = get_sub_field('cd_description');
		    	$photo = get_sub_field('photo')['sizes']['medium'];

		        // display a sub field value
		        echo '<div class="recording clearfix">';
		        if ($photo ) {
		        	echo '<img src="'.$photo.'" alt class="cd-photo">';
		        }
		        if ($link) {
		        	echo '<a href="' . $link . '">';
		        }
		        echo '<h3>' . $title . '</h3>';
		        if ($link) {
		        	echo '</a>';
		        }
		        echo '<p>' . $description . '</p>';
		        echo '</div>';

		    endwhile;

		    echo '</section>';

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
