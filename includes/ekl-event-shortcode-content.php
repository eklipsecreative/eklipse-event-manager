<?php

//WP_Query Information -> Sorts by custom 'events' post type and then by the Start Date Meta Tag information descending
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array(
            'post_status' => 'publish',
            'post_type' => 'events',
			'posts_per_page' => '10',
			'paged' => $paged,
            'meta_key' => '_ekl_meta_start_date',
            'orderby' => 'meta_value',
            'order' => 'ASC',
			'meta_query'     => array(
			'relation'  => 'OR',
			 array (
			   'key'     => '_ekl_meta_start_date',
			   'value'   => date('Y-m-d'),
			   'compare' => '>',
			 )
		  )
        );
$my_query = new WP_Query( $args );

if ($my_query->have_posts()) { ?>

<?php while ($my_query->have_posts()) : $my_query->the_post();
    //In order that the post meta data can be retrieved
	global $post;
	
	//Grab post meta data
	$ekl_meta_start_date = get_post_meta( $post->ID, '_ekl_meta_start_date', true );
	$ekl_meta_end_date = get_post_meta( $post->ID, '_ekl_meta_end_date', true );
	$ekl_meta_start_time = get_post_meta( $post->ID, '_ekl_meta_start_time', true );
	$ekl_meta_end_time = get_post_meta( $post->ID, '_ekl_meta_end_time', true );
	$ekl_meta_location = get_post_meta( $post->ID, '_ekl_meta_location', true );
	$ekl_meta_url = get_post_meta( $post->ID, '_ekl_meta_url', true );
	$ekl_meta_form_url = get_post_meta( $post->ID, '_ekl_meta_form_url', true );
	
	//   Format all date fields needed   ////////////////////////////////////////////////
	$short_month = date('M', strtotime($ekl_meta_start_date));
	$the_event_date = date('d', strtotime($ekl_meta_start_date));
	if ($ekl_meta_end_time !== '') {
		$ekl_detail_time = date('g:i a', strtotime($ekl_meta_start_time)) . ' to ' . date('g:i a', strtotime($ekl_meta_end_time));
	} else {
		$ekl_detail_time = date('g:i a', strtotime($ekl_meta_start_time));
	}

	//Is this a multiday event?
	if ($ekl_meta_end_date !== '') {
		if ($ekl_meta_end_date !== $ekl_meta_start_date) {
			// Make the date show up as March 2 to March 3, 2016
			$ekl_detail_start_date = date('F d', strtotime($ekl_meta_start_date));
			$ekl_detail_end_date = date('F d, Y', strtotime($ekl_meta_end_date));
			$ekl_detail_date = $ekl_detail_start_date . ' to ' . $ekl_detail_end_date;
		} else {
			// Make the date show up as March 2, 2016
			$ekl_detail_date = date('F d, Y', strtotime($ekl_meta_start_date));
		}
	} else {}
	//   End of date formatting   ///////////////////////////////////////////////////////////
	
	//Is there a Location URL?
	if ($ekl_meta_url == '') {
		$ekl_detail_location = $ekl_meta_location;	
	} else {
		$ekl_detail_location = '<a href="' . $ekl_meta_url . '">' . $ekl_meta_location . '</a>';
	}
			
	?> 
	<div class="ekl-event-container">
		<div class="ekl-event-date">	
			<div class="btn-text">
				<div><?php echo $short_month; ?></div>
				<div><?php echo $the_event_date; ?></div>
			</div>
		</div>
		<div class="ekl-vertical-middle">
			<div class="ekl-arrow-right"></div>
		</div>
		<div class="ekl-event-content ekl-vertical-middle">
			<span class="ekl-event-title"><?php the_title(); ?></span>
			<div><hr class="ekl-hr-style" /></div>
			<div class="ekl-event-details">
				<span class="ekl-icon-calendar">&nbsp;&nbsp;</span>&nbsp;&nbsp;<?php echo $ekl_detail_date; ?><br />
				<span class="ekl-icon-clock">&nbsp;&nbsp;</span>&nbsp;&nbsp;<?php echo $ekl_detail_time; ?><br />
				<span class="ekl-icon-pin-alt">&nbsp;&nbsp;</span>&nbsp;&nbsp;<?php echo $ekl_detail_location; ?>
			</div>
			<div class="ekl-event-content-text">
				<?php 
					the_content();
					if (!empty($ekl_meta_form_url)) {
					?>
					<a href="<?php echo $ekl_meta_form_url; ?>" class="ekl-event-btn">Sign Up</a>
					<?php
					}
				?>
			</div>
		</div>
	</div>
	<div style="clear:both;"></div>
	
    <?php endwhile;
} 
//Add Pagination Links
if ($my_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
  <nav class="ekl-event-prev-next-posts">
    <div class="ekl-event-next-posts-link">
      <?php echo get_previous_posts_link( '<< View Previous Events' ); // display newer posts link ?>
    </div>
	<div class="ekl-event-prev-posts-link">
      <?php echo get_next_posts_link( 'View More Events >>', $my_query->max_num_pages ); // display older posts link ?>
    </div>
  </nav>
<?php } ?>

<script>
$(document).ready(function(){
	
	$('.btn-text').bigtext();
	
});
</script>