<?php

//These values help set the proper background color in the loop
$record_count = "0";
$month_count = "1";

//WP_Query Information -> Sorts by custom 'events' post type and then by the Start Date Meta Tag information descending
$args = array(
            'post_status' => 'publish',
            'post_type' => 'events',
            'meta_key' => '_ekl_meta_start_date',
            'orderby' => 'meta_value',
            'order' => 'ASC'
        );
$my_query = new WP_Query( $args );

if ($my_query->have_posts()) { ?>

<table class="ekl-no-border"><tr><td class="ekl-no-border">

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
	
	//   Format all date fields needed   ////////////////////////////////////////////////
	$short_month = date('M', strtotime($ekl_meta_start_date));
	$the_event_date = date('d', strtotime($ekl_meta_start_date));
	if ($ekl_meta_end_time !== '') {
		$ekl_detail_time = date('g:i a', strtotime($ekl_meta_start_time)) . ' to ' . date('g:i a', strtotime($ekl_meta_end_time));
	} else {
		$ekl_detail_time = date('g:i a', strtotime($ekl_meta_start_time));
	}
	//$ekl_detail_time1 = date('h:i a', strtotime($ekl_meta_start_time));
	//$ekl_detail_time2 = date('h:i a', strtotime($ekl_meta_end_time));
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
	
	/*Determines the background color for the date box and arrow*/
	$record_count = $record_count + 1;
	if ($short_month !== date('M')) {
		$month_count = $month_count + 1;
		if ($month_count > 2) {
			$month_color = $arrow_color = get_option( 'ekl_color_3' );
		} else {
			$month_color = $arrow_color = get_option( 'ekl_color_2' );
		}
		//$month_color = "ekl-month" . $month_count;
		//$arrow_color = "ekl-arrow" . $month_count;
		//$month_color = get_option( 'ekl_color_2', 'ekl-month2' );
		//$arrow_color = get_option( 'ekl_color_2', 'ekl-arrow' . $month_count );
	} else {
	$month_color = $arrow_color = get_option( 'ekl_color_1' );
	//$month_color = "ekl-month1";
	//$arrow_color = "ekl-arrow1";
	}
		
	?> 
	<div class="ekl-event-container ekl-event-selected">
		<div class="ekl-event-date" style="background-color:#<?php echo $month_color; ?>;">	
			<div class="btn-text2">
				<div><?php echo $short_month; ?></div>
				<div><?php echo $the_event_date; ?></div>
			</div>
		</div>
		<div class="ekl-vertical-middle">
			<div class="ekl-arrow-right" style="border-left:15px solid #<?php echo $arrow_color; ?>"></div>
		</div>
		<div class="ekl-event-content ekl-vertical-middle">
			<span class="ekl-event-title"><?php the_title(); ?></span>
			<div class="ekl-event-content-hidden">
				<div><hr class="ekl-hr-style" /></div>
				<div class="ekl-event-details">
					<span class="icon-calendar"></span>&nbsp;&nbsp;<?php echo $ekl_detail_date; ?><br />
					<span class="icon-clock"></span>&nbsp;&nbsp;<?php echo $ekl_detail_time; ?><br />
					<span class="icon-pin-alt"></span>&nbsp;&nbsp;<?php echo $ekl_detail_location; ?>
				</div>
				<div class="ekl-event-content-text">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
	<div style="clear:both;"></div>
	<br /><br />
	<div class="btn" style="background-color:#<?php echo $month_color; ?>;">
		<div class="btn-text">
			<div><?php echo $short_month; ?></div>
			<div><?php echo $the_event_date; ?></div>
		</div>
	</div>
	
    <?php endwhile;
} 
?>
	
</td></tr></table>
<script>
$(document).ready(function(){
	
	$('.btn-text').bigtext();
	$('.btn-text2').bigtext();
	
	$(".ekl-event-container").click(function(){
        
		
		$(".ekl-event-container").removeClass("ekl-event-selected");
		$(".ekl-event-date").css("vertical-align","");
		$(".ekl-event-expand").css("background-image","");
		$(".ekl-event-title").css("color","");
		$(".ekl-event-content-hidden").css("opacity","0");
		$(".ekl-event-content-hidden").css("height","0");
		
		$(this).addClass("ekl-event-selected");
		$(this).find(".ekl-event-date").css("vertical-align","top");
		$(this).find(".ekl-event-expand").css("background-image","none");
		$(this).find(".ekl-event-title").css("color","black");
        $(this).find(".ekl-event-content-hidden").css("opacity","1");
		$(this).find(".ekl-event-content-hidden").css("height","100%");
		
		$('html, body').animate({
			scrollTop: $(".ekl-event-selected").first().offset().top - 125
        }, 1);
    });	
});

</script>
